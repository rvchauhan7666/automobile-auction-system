<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Price Reduction</title>
</head>
<body>

    </div>
<div class="container">
    
        <style>
            
                
            body {
                background: url(ROHIT.jpeg) no-repeat center center/cover;
                color: white;
            }
         

      .container
      {

    border: 2px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    width: 217px;
    height: 123px;
    padding: 38px;
position: relative;
left:125px;
top:145px;

      }
      .button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #FF5722;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #E64A19;
        }
.want{ font-weight: bold;
    position: relative;
    left: 524px;
    bottom:136px;
    font-size: 34px;
}
.yes{position: relative;
    left: 526px;
    bottom:130px;
    border-radius:5px;
    background-color: #FF5722;
    color:white;
    width: 72px;
    height: 35px;
            
}
.no{
    position: relative;
    left: 606px;
    bottom:130px;
    border-radius:5px;
    background-color: #FF5722;
    color:white;
    width: 72px;
    height: 35px;
            
            
}
     

        </style>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $originalPrice = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $scratches = isset($_POST['scratches']) ? $_POST['scratches'] : "";
    $dents = isset($_POST['dents']) ? $_POST['dents'] : "";
    $modelYear = isset($_POST['year']) ? intval($_POST['year']) : 0;

    $reducedPrice = $originalPrice;

    echo "Original Price: ₹" . number_format($originalPrice, 2) . "<br>";
    echo "Scratches: " . $scratches . "<br>";
    echo "Dents: " . $dents . "<br>";
    echo "Model Year: " . $modelYear . "<br>";

    if ($scratches == '0-2' && $dents == '0-2' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.1599);
    } elseif ($scratches == '0-2' && $dents == '0-2' && ($modelYear >= 2015 && $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2599);
    } elseif ($scratches == '0-2' && $dents == '0-2' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3599);
    } elseif ($scratches == '0-2' && $dents == '2-4' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.1799);
    } elseif ($scratches == '0-2' && $dents == '2-4' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2799);
    } elseif ($scratches == '0-2' && $dents == '2-4' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3799);
    } elseif ($scratches == '0-2' && $dents == '4-6' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2399);
    } elseif ($scratches == '0-2' && $dents == '4-6' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3399);
    } elseif ($scratches == '0-2' && $dents == '4-6' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4399);
    } elseif ($scratches == '2-4' && $dents == '0-2' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.1799);
    } elseif ($scratches == '2-4' && $dents == '0-2' && ($modelYear >= 2015 && $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2799);
    } elseif ($scratches == '2-4' && $dents == '0-2' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3799);
    } elseif ($scratches == '2-4' && $dents == '2-4' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2199);
    } elseif ($scratches == '2-4' && $dents == '2-4' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3199);
    } elseif ($scratches == '2-4' && $dents == '2-4' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4199);
    } elseif ($scratches == '2-4' && $dents == '4-6' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2699);
    } elseif ($scratches == '2-4' && $dents == '4-6' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3699);
    } elseif ($scratches == '2-4' && $dents == '4-6' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4699);
    } elseif ($scratches == '4-6' && $dents == '0-2' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2399);
    } elseif ($scratches == '4-6' && $dents == '0-2' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3399);
    } elseif ($scratches == '4-6' && $dents == '0-2' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4399);
    } elseif ($scratches == '4-6' && $dents == '2-4' && ($modelYear >= 2010 && $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.2699);
    } elseif ($scratches == '4-6' && $dents == '2-4' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3699);
    } elseif ($scratches == '4-6' && $dents == '2-4' && ($modelYear >= 2020 && $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4699);
    } elseif ($scratches == '4-6' && $dents == '4-6' && ($modelYear >= 2010 and $modelYear <= 2020)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.3999);
    } elseif ($scratches == '4-6' && $dents == '4-6' && ($modelYear >= 2015 and $modelYear <= 2019)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4999);
    } elseif ($scratches == '4-6' && $dents == '4-6' && ($modelYear >= 2020 and $modelYear <= 2024)) {
        $reducedPrice = $originalPrice - ($originalPrice * 0.4999);
    }

    echo "Reduced Price: ₹" . number_format($reducedPrice, 2);
}
?>


</body>
<p class="want">Want to sell ?</p>
<button class="yes"onclick="window.location.href='car.php'">Yes</button>
<button class="no"onclick="window.location.href='buttons.html'">No</button>
</html>