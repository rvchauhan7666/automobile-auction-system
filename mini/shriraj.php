<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    include("db.php");
    
    // Function to get the highest bid for a product
    function getHighestBid($productId)
    {
        global $con;
    
        $sql = "SELECT MAX(amt) AS highest_bid FROM bid WHERE prodi = '$productId'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['highest_bid'];
        }
    
        return null;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $productid = $_POST['productid'];
        $mail = $_POST['email'];
        $productName = $_POST['productName'];
        $bidAmount = $_POST['bidAmount'];
    
        if (!empty($mail) && !empty($productName) && !empty($bidAmount)) {
            // Insert bid into the database
            $query = "INSERT INTO bid (prodi, gmail, prod, amt) VALUES ('$productid', '$mail', '$productName', '$bidAmount')";
    
            if (mysqli_query($con, $query)) {
                // Bid placed successfully, now get the highest bid for the product
                $highestBid = getHighestBid($productid);
    
                if ($highestBid !== null) {
                    echo "success|" . $highestBid; // Return success and highest bid value
                } else {
                    echo "success"; // Return success without highest bid
                }
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }
    
    
    
    
    ?>
</body>
</html>