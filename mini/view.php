<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details Viewer</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .mt-4{
            background: url(ROHIT.jpeg) no-repeat center center/cover;
             overflow-x:hidden;
        }
       .carousel slide{

       }
        .card {
            box-shadow: 5px 10px rgb(219, 120, 120);
            width: 41rem;
            height: 260px;
            margin: 20px auto;
            padding-left:38px;
        }

        .card-img-top {
            height: 190px;
            position: relative;
            top:1.8rem
        }      

        /* Style for modal images */
        .modal-body img {
            width: 70vh;
            display: flex; 
            flex-direction: row;
            flex-wrap: wrap;
            margin:16px;
            margin-top:3rem;
        }
        .carousel-inner {
            display: flex; 
            flex-direction: row;
            flex-wrap: wrap;
        }
        .card-body {
            color:#fff;
            position: relative;
            left:23rem;
            bottom:13rem;
            font-size: 1.4rem;
            height:5rem:
        }    
        .btn-primary {
            background-color: #FF5722; 
            width:7rem;
            height:1.9rem;
            font-size:1rem;
            border-radius:5px;
        }
    </style>
</head>
<body class="mt-4">
    <div class="container">
        <!-- Products -->
        <div class="row">
            <?php
            include("db.php");
            $select_query = "SELECT * FROM `car`";
            $result_query = mysqli_query($con, $select_query);

            $count = 0;

            while ($row = mysqli_fetch_assoc($result_query)) {
                $modna = $row['modna'];
                $kmsDr = $row['kmsDr'];
                $Dts = $row['dts'];
                $Scrat = $row['Scrat'];

                $frV = $row['frV'];
                $lftV = $row['lftV'];
                $rgtV = $row['rgtV'];
                $bckV = $row['bckV'];
                $intrV = $row['intrV'];
                $opnBV = $row['opnBV'];

                if ($count % 3 == 0) {
                    echo '<div class="w-100"></div>';
                }

                echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='profile_pictures/$frV' class='card-img-top' alt='$modna'>
                            <div class='card-body'>
                                <h5 class='card-title'>$modna</h5>
                                <p class='card-text'>
                                    Kilometers Driven: $kmsDr<br>
                                    Number of Dents: $Dts<br>
                                    Number of Scratches: $Scrat
                                </p>
                                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#imageModal' 
                                        data-frV='$frV' data-lftV='$lftV' data-rgtV='$rgtV' 
                                        data-bckV='$bckV' data-intrV='$intrV' data-opnBV='$opnBV'>View photos</button>
                            </div>
                        </div>
                    </div>";

                $count++;
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  
                </div>
                <div class="modal-body">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                            <!-- Images will be dynamically added here using JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'), {
            keyboard: false
        });

        document.querySelectorAll('.btn-primary').forEach(function (button) {
            button.addEventListener('click', function () {
                var frV = this.getAttribute('data-frV');
                var lftV = this.getAttribute('data-lftV');
                var rgtV = this.getAttribute('data-rgtV');
                var bckV = this.getAttribute('data-bckV');
                var intrV = this.getAttribute('data-intrV');
                var opnBV = this.getAttribute('data-opnBV');

                var imagePaths = [frV, lftV, rgtV, bckV, intrV, opnBV];

                var carouselInner = document.querySelector('.carousel-inner');
                carouselInner.innerHTML = '';

                var imagesLoaded = 0;

                function checkImagesLoaded() {
                    imagesLoaded++;
                    if (imagesLoaded === imagePaths.length) {
                        myModal.show();

                        // Initialize the Bootstrap Carousel after showing the modal
                        var carousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
                            wrap: false // Disable wrap to prevent looping
                        });

                        // Add event listener for the carousel slide event
                        document.getElementById('carouselExample').addEventListener('slide.bs.carousel', function () {
                            // Scroll to the top of the modal body on each slide
                            document.querySelector('.modal-body').scrollTop = 0;
                        });
                    }
                }

                for (var i = 0; i < imagePaths.length; i++) {
                    if (imagePaths[i]) {
                        var item = document.createElement('div');
                        item.classList.add('carousel-item');
                        if (i === 0) {
                            item.classList.add('active');
                        }

                        var image = new Image();
                        image.src = 'profile_pictures/' + imagePaths[i];
                        image.classList.add('d-block', 'w-100');
                        image.alt = 'Image ' + (i + 1);

                        image.onload = function () {
                            checkImagesLoaded();
                        };

                        item.appendChild(image);
                        carouselInner.appendChild(item);
                    } else {
                        checkImagesLoaded();
                    }
                }
            });
        });

        // Reset imagesLoaded counter when the modal is hidden
        document.getElementById('imageModal').addEventListener('hidden.bs.modal', function () {
            imagesLoaded = 0;
        });
    </script>
</body>
</html>
