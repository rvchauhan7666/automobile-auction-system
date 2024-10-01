
<?php
require_once("db.php");

if (isset($_POST['register'])) {
    $ownersname = $_POST['owner'];
    $carscompany = $_POST['company'];
    $modelname = $_POST['model'];
    $modelnumber = $_POST['modelNo'];
    $yearofmodel = $_POST['yearM'];
    $buyingyear = $_POST['buyingY'];
    $colour = $_POST['color'];
    $kilometersdriven = $_POST['kmsDrive'];
    $anymodifications = $_POST['modifiy'];
    $numberofdents = $_POST['Dents'];
    $numberofscratches = $_POST['Scratches'];
    $repaintedornot = $_POST['repaint'];
    $ownerdetails = $_POST['Details'];
    $pricedetected = $_POST['priced'];

    $frontViewFilename = $_FILES['frontV']['name'];
    $frontViewTempname = $_FILES['frontV']['tmp_name'];
    $frontViewFolder = "profile_pictures/" . $frontViewFilename;

    $leftViewFilename = $_FILES['leftV']['name'];
    $leftViewTempname = $_FILES['leftV']['tmp_name'];
    $leftViewFolder = "profile_pictures/" . $leftViewFilename;

    $rightViewFilename = $_FILES['rightV']['name'];
    $rightViewTempname = $_FILES['rightV']['tmp_name'];
    $rightViewFolder = "profile_pictures/" . $rightViewFilename;

    $backViewFilename = $_FILES['backV']['name'];
    $backViewTempname = $_FILES['backV']['tmp_name'];
    $backViewFolder = "profile_pictures/" . $backViewFilename;

    $interiorViewFilename = $_FILES['interiorV']['name'];
    $interiorViewTempname = $_FILES['interiorV']['tmp_name'];
    $interiorViewFolder = "profile_pictures/" . $interiorViewFilename;

    $openbViewFilename = $_FILES['openBV']['name'];
    $openbViewTempname = $_FILES['openBV']['tmp_name'];
    $openbViewFolder = "profile_pictures/" . $openbViewFilename;

    $sql = "INSERT INTO car (own, comp, modna, modNo, yrM, byngY, clr, kmsDr, modf, Dts, Scrat, rpnt, Dtls, pric, frV, lftV, rgtV, bckV, intrV, opnBV)
            VALUES ('$ownersname','$carscompany','$modelname','$modelnumber','$yearofmodel','$buyingyear','$colour','$kilometersdriven','$anymodifications','$numberofdents','$numberofscratches','$repaintedornot','$ownerdetails','$pricedetected','$frontViewFilename', '$leftViewFilename', '$rightViewFilename', '$backViewFilename', '$interiorViewFilename', '$openbViewFilename')";

    if (move_uploaded_file($frontViewTempname, $frontViewFolder) &&
        move_uploaded_file($leftViewTempname, $leftViewFolder) &&
        move_uploaded_file($rightViewTempname, $rightViewFolder) &&
        move_uploaded_file($backViewTempname, $backViewFolder) &&
        move_uploaded_file($interiorViewTempname, $interiorViewFolder) &&
        move_uploaded_file($openbViewTempname, $openbViewFolder)) {

        if (mysqli_query($con, $sql)) {
            // Data stored successfully, redirect to buttons.html
            header("Location: buttons.html");
            exit();
        } else {
            echo "<h3>Failed to create record!</h3>";
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "<h3>Failed to upload one or more images!</h3>";
    }
}
?>



<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details and Photos</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: solid black;
            background: url(ROHIT.jpeg) no-repeat center center/cover;
            overflow-x:hidden;
        }
        form {
            max-width: 800px;
            margin: 10 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
            position: relative;
    left: 21rem;
    font-size: 1.3rem;
        }
        input[type="text"], input[type="number"],
        input[type="file"],
       select, textarea {
            width: 45%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #fff;
            border-radius: 6px;
            position: relative;
    left: 21rem;
        }
        input[type="file"] {
            margin-top: 5px;
            color:#fff;
        }
        button {
            background-color: #d43242;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
    left: 21rem;
        }
        .hey{
            color:#fff;
            font-size:34px;
            position: relative;
            left:20.5rem;
        }
        .her{
            width:105%;
        }
        #yearOfModel{
            width:47.4%;
        }
        .vat{
            background-color: #FF5722;
            position: relative;
            left:22rem;
            width:5rem;
            height:1.8rem;
            font-size:1rem;
            border-radius:5px;
            color: white;
        }
    </style>
</head>
<body>
    <p class="hey">Car Details</p>
    <form enctype="multipart/form-data" method="post" >
           <label for="ownerName">Owner's Name:</label>
        <input type="text" id="ownerName" name="owner" required>
        
        <label for="company">Car's Company:</label>
        <input type="text" id="company" name="company" required>
        
        <label for="modelName" >Model Name:</label>
        <input type="text" id="modelName" name="model" required>
        
        <label for="modelNo">Model No:</label>
        <input type="text" id="modelNo" name="modelNo" required>
        
        <label for="yearOfModel" width: 40px;>Year of Model:</label>
        <select type="number" id="yearOfModel" name="yearM" required>
                <option>Select Option</option>
                <option>2024</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
                <option>2014</option>
                <option>2013</option>
                <option>2012</option>
                <option>2011</option>
                <option>2010</option>
            </select>
    
        
        <label for="buyingYear">Buying Year:</label>
        <input type="number" id="buyingYear" name="buyingY" required>
        
        <label for="colour">Colour:</label>
        <input type="text" id="colour" name="color" required>
        
        <label for="kmsDriven">Kilometers Driven:</label>
        <input type="number" id="kmsDriven" name="kmsDrive" required>
        
        <label for="modifications">Any Modifications:</label>
        <input type="text" id="modifications" name="modifiy">
        
        <div class="her">
        <label for="numDents">Number of Dents:</label>
        <select type="number" id="numDents" name="Dents">
        <option>Select Option</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
         </select>
                
            
        
        <label for="numScratches">Number of Scratches:</label>
        <select type="number" id="numScratches" name="Scratches">
        <option>Select Option</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
                 </select>
        
        <label for="repainted">Repainted or Not:</label>
        <select id="repainted" name="repaint">
        <option>Select Option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        
       <label for="ownerDetails">Owner Details:</label>
        <select id="ownerDetails" name="Details">
        <option>Select Option</option>
            <option value="1st">1st Owner</option>
            <option value="2nd">2nd Owner</option>
            <option value="3rd">3rd Owner</option>
        </select>
        </div>
        <label for="minPrice">Price Detected:</label>
        <input type="number" id="priced" name="priced">
        
        <label for="frontView">Front View Photo:</label>
        <input type="file" id="frontView" name="frontV" accept="image/*">
        
        <label for="leftSideView">Left Side View Photo:</label>
        <input type="file" id="leftSideView" name="leftV" accept="image/*">
        
        <label for="rightSideView">Right Side View Photo:</label>
        <input type="file" id="rightSideView" name="rightV" accept="image/*">
        
        <label for="backView">Back View Photo:</label>
        <input type="file" id="backView" name="backV" accept="image/*">
        
        <label for="interior">Interior Photo:</label>
        <input type="file" id="interior" name="interiorV" accept="image/*">
        
        <label for="openBonnet">Open Bonnet Photo:</label>
        <input type="file" id="openBonnet" name="openBV" accept="image/*">
        <br><br>
        
        <td class="labels" colspan="2" align="left" >
                <input type="submit" value="Register" name="register" class="vat" ></td>
    


</form>
</body>