<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $productid = $_POST['productid'];
    $mail = $_POST['email'];
    $productName = $_POST['productName'];
    $bidAmount = $_POST['bidAmount'];

    if (!empty($mail) && !empty($productName) && !empty($bidAmount)) {
        $query = "INSERT INTO bid (prodi, gmail, prod, amt) VALUES ('$productid', '$mail', '$productName', '$bidAmount')";

        if (mysqli_query($con, $query)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place a Bid</title>
    <style>
        *{
           

        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: url(ROHIT.jpeg) no-repeat center center/cover;
            width:40%;
            margin: auto;
            position: relative;
            top: 5rem;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color:white;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #FF5722;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #bidNotification {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>
      <form action="shriraj.php" method="post">
<label for="product_id">Product ID:</label>
        <input type="text" id="product_id" name="productid" required>

        <label for="email">Email ID:</label>
        <input type="email" id="email" name="email" required>

        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="bidAmount">Bid Amount (₹):</label>
        <input type="number" id="bidAmount" name="bidAmount" required>

        <button type="submit">Place Bid</button>
    </form>

    <div id="bidNotification"></div>

    <script>
        function placeBid() {
            var bidForm = document.getElementById('bidForm');
            var productid = document.getElementById('product_id').value;
            var email = document.getElementById('email').value;
            var productName = document.getElementById('productName').value;
            var bidAmount = document.getElementById('bidAmount').value;

            if (!email || !productName || !bidAmount) {
                alert('Please fill in all the fields.');
                return;
            }

            
            var formData = new FormData(bidForm);

           
            fetch('bidding.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(result => {
                if (result === 'success') {
                   

                    setTimeout(function() {
                        bidNotification.style.display = 'none';
                    }, 5000);
                } else {
                    alert('Bid place successfully.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    </script>
</body>
</html>
