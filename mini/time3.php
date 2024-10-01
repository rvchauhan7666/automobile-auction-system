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
        /* Add your existing styles here */

        /* Additional styles for the "Place Bid" button */
        .mt-4 {
            background: url(ROHIT.jpeg) no-repeat center center/cover;
            overflow-x: hidden;
        }

        .carousel slide {

        }

        .card {
            box-shadow: 5px 10px rgb(219, 120, 120);
            width: 41rem;
            height: 260px;
            margin: 30px auto;
            padding-left: 38px;
        }

        .card-img-top {
            height: 190px;
            position: relative;
            top: 1.8rem
        }

        /* Style for modal images */
        .modal-body img {
            width: 70vh;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin: 16px;
            margin-top: 3rem;
        }

        .carousel-inner {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .card-body {
            color: #fff;
            position: relative;
            left: 23rem;
            bottom: 14rem;
            font-size: 1.4rem;
            height: 5rem;
        }

        .btn-primary {
            background-color: #FF5722;
            width: 7rem;
            height: 1.9rem;
            font-size: 1rem;
            border-radius: 5px;
            color:white;
            position: relative;
            bottom:1.6rem;
        }

        .timer-container {
            text-align: center;
            background-color: #FF5722;
           
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #333;
           position: relative;
           left:23rem;
           bottom:5rem;
           width:9rem;
           height:28px;
        }

        .timer {
            font-size: 1.5em;
            color: #fff;
            width:8.8rem;
            font-size:20px;
        }
        .btn-success {
            background-color: #FF5722;
            width: 7rem;
            height: 1.9rem;
            font-size: 1rem;
            border-radius: 5px;
            color: white;
            margin-top: 0.5rem;
            position: relative;
            bottom:1.6rem;
        }
    </style>
</head>
<body class="mt-4">
    <div class="container">
        <!-- Products -->
        <div class="row">
            <?php
            // Include necessary files and setup database connection
            include("db.php");
            $select_query = "SELECT * FROM `car`";
            $result_query = mysqli_query($con, $select_query);

            $count = 0;

            while ($row = mysqli_fetch_assoc($result_query)) {
                // Extracting data from the row
                $productid = $row['product_id'];
                $modna = $row['modna'];
                $kmsDr = $row['kmsDr'];
                $Dts = $row['dts'];
                $Scrat = $row['Scrat'];
                $pric = $row['pric'];
                $frV = $row['frV'];
                $lftV = $row['lftV'];
                $rgtV = $row['rgtV'];
                $bckV = $row['bckV'];
                $intrV = $row['intrV'];
                $opnBV = $row['opnBV'];

                // Displaying card for each product
                echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='profile_pictures/$frV' class='card-img-top' alt='$modna'>
                            <div class='card-body'>
                                <h5 class='card-title'>$modna</h5>
                                <p class='card-text'>
                                    Product Id:$productid<br>
                                    Kilometers Driven: $kmsDr<br>
                                    Number of Dents: $Dts<br>
                                    Number of Scratches: $Scrat<br>
                                    Price: $pric
                                </p>
                                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#imageModal' 
                                        id='imageModalTrigger-$count' data-frV='$frV' data-lftV='$lftV' data-rgtV='$rgtV' 
                                        data-bckV='$bckV' data-intrV='$intrV' data-opnBV='$opnBV'>View photos</button>
                                
                                <!-- Button to navigate to bid page -->
                                <button class='btn btn-success mt-2'>
                                <a href='http://localhost/mini/bidding.php?productName=$modna' style='color: white; text-decoration: none;'>Bid</a>
                            </button>                                
                            </div>
                            <div class='timer-container'>
                                <div class='timer' id='timer-$count'></div>
                            </div>
                        </div>
                    </div>";

                $count++;
            }
            ?>
        </div>
    </div>

    <!-- Rest of your code, including the Bootstrap Modal and JavaScript -->
    <!-- Bootstrap JS link -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        // Add your existing JavaScript code here
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'), {
            keyboard: false
        });

        <?php
        for ($i = 0; $i < $count; $i++) {
            echo "let timeRemaining$i = 24 * 60 * 60;

            function updateTimer$i() {
                const hours$i = Math.floor(timeRemaining$i / 3600);
                const minutes$i = Math.floor((timeRemaining$i % 3600) / 60);
                const seconds$i = timeRemaining$i % 60;

                document.getElementById('timer-$i').innerHTML = hours$i + 'h ' + minutes$i + 'm ' + seconds$i + 's';

                if (timeRemaining$i <= 0) {
                    document.getElementById('timer-$i').innerHTML = 'Time expired!';
                } else {
                    timeRemaining$i--;
                }
            }

            setInterval(updateTimer$i, 1000);

            updateTimer$i();

            // Add logic to load images in the modal
            document.getElementById('imageModalTrigger-$i').addEventListener('click', function() {
                // Clear existing images in the carousel
                document.querySelector('#carouselExample .carousel-inner').innerHTML = '';

                // Array of image URLs for the product
                const imageUrls$i = ['$frV', '$lftV', '$rgtV', '$bckV', '$intrV', '$opnBV'];

                // Loop through the image URLs and add them to the carousel
                imageUrls$i.forEach(function(url, index) {
                    const imgElement = document.createElement('img');
                    imgElement.src = 'profile_pictures/' + url;
                    imgElement.className = 'd-block w-100';
                    imgElement.alt = 'Image ' + (index + 1);

                    const carouselItem = document.createElement('div');
                    carouselItem.className = 'carousel-item' + (index === 0 ? ' active' : '');
                    carouselItem.appendChild(imgElement);

                    document.querySelector('#carouselExample .carousel-inner').appendChild(carouselItem);
                });

                // Show the modal
                myModal.show();
            });";
        }
        ?>
    </script>
</body>
</html>
