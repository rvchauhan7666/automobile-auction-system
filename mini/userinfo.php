
<?php
require_once("db.php");

// Check if the form is submitted
if (isset($_POST['register'])) {
    // Collect form data
    $firstname = $_POST['first'];
    $middlename = $_POST['middle'];
    $lastname = $_POST['last'];
    $dateofbirth = $_POST['dob'];
    $age = $_POST['age'];
    $state = $_POST['stat'];
    $city = $_POST['cit'];
    $pincode = $_POST['pinc'];
    $address = $_POST['addr'];
    $landmark = $_POST['nl'];
    $adharnumber = $_POST['an'];
    $filename = $_FILES['ap']['name'];
    $tempname = $_FILES['ap']['tmp_name'];
    $folder = "profile_pictures/" . $filename;

    // Move the uploaded file to the desired folder
    if (move_uploaded_file($tempname, $folder)) {
        // File moved successfully, now insert data into the database
        $sql = "INSERT INTO personal (finame, mname, lname, dob, age, state, city, pin, `add`, landmark, arno, aphoto)
                VALUES ('$firstname','$middlename','$lastname','$dateofbirth','$age','$state','$city','$pincode','$address','$landmark','$adharnumber','$filename')";

        // Execute the query
        if (mysqli_query($con, $sql)) {
            // Redirect to the success page
            header("Location: buttons.html");
            exit();
        } else {
            // Display an error message if the query fails
            echo "<script type='text/javascript'>alert('Failed to register.')</script>";
        }
    } else {
        // Display an error message if the file upload fails
        echo "<script type='text/javascript'>alert('Failed to move uploaded file.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <style>
    *{
        margin: 0;
    padding: 0;
    box-sizing: border-box;
       
    }
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1000px;
    background: url(ROHIT.jpeg) no-repeat center center/cover; 
        }
        form {
            max-width: 100vh;
            margin: 10px auto;
            position: relative;
            right:6rem;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], input[type="number"], input[type="file"], select, textarea {
            width: 85%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #e6937a ;
            border-radius: 5px;
        }
        button {
            background-color:F5 #FF5722;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
            right: 4px;
            bottom: 15px;
        }
        h1{
            color: white ;
            position: relative;
            left: 345px;
            bottom: 30rem;
            margin-bottom:1rem;
        }
       input[type="submit"]{
        position: relative;
            left: 1px;
            top: 20px;
            width: 6rem;
            height: 2rem;
            border-radius:5px;
            background-color: #FF5722;
            color:white;
            
       }
    </style>
</head>
<body>
    <h1>Personal Information</h1>

    <form enctype="multipart/form-data" method="post" action="userinfo.php">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="first" required>
        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middle">
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="last" required>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required> 
        <br>     
        <label for="state">State:</label>
        <input type="text" id="state" name="stat" required>
        
        <label for="city">City:</label>
        <input type="text" id="city" name="cit" required>
        
        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pinc" required>
        
        <label for="address">Address:</label>
        <textarea id="address" name="addr" rows="6" required></textarea>
        
        <label for="landmark">Nearest Landmark:</label>
        <input type="text" id="landmark" name="nl">
        
        <label for="aadharNumber">Aadhar Card Number:</label>
        <input type="text" id="aadharNumber" name="an" required>

        <label for="aadharPhoto">Upload Aadhar Card Photo:</label>
        <input type="file" id="aadharPhoto" name="ap" accept="image/*">
        
        <td class="labels" colspan="2" align="left" >
                <input type="submit" value="Register" name="register" class="vat"></td>
       <br>
        
    </form>
</body>
</html>

