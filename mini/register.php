<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['name'];
    $gmail = $_POST['email'];
    $password = $_POST['pass'];
    $confirmpassword = $_POST['cpass'];

    // Check if the email already exists in the database
    $check_query = "SELECT * FROM user WHERE email = '$gmail'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) == 0) {
        // Email doesn't exist, proceed with insertion
        $query = "INSERT INTO user (name, email, pass, cpass) VALUES ('$fullname', '$gmail', '$password', '$confirmpassword')";
        mysqli_query($con, $query);
        echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        header("Location: http://localhost/mini/login.php");
        exit();
    } else {
        // Email already exists, show error message
        echo "<script type='text/javascript'> alert('Email already exists. Please use a different email address.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body{
        background: url(ROHIT.jpeg) no-repeat center center/cover; 
           
            
        }
    .container{
        margin: auto;
        width: 500px;
        height: 300px;
       font-size: -50px;
        border-radius: 10px;
        color: white;
        transform: translate(0%, 15%);

       
    
    }  
    input[type="text"],select,textarea{
       margin: 10px;
        font-size: 20px;
        color: #FF5722;
       border: 3px solid white;
       text-align: 50px;
       border-radius: 5px;

       

       }
       button{
        font-size: 20px;
            background-color: #FF5722;
            color: antiquewhite;
            border-radius: 5px;

       }
       #email{
        position: relative;
        left: 73px;
       }
       #pass{
        position: relative;
        left: 75px;
        margin-top:11px;
        margin-bottom:16px;
        width:247px;
        height:22px;
        border:3px solid white;
        border-radius:5px;

       }
      #cpass{
        position: relative;
        left: 16px;
        margin-top:11px;
        margin-bottom:16px;
        width:247px;
        height:22px;
        border:3px solid white;
        border-radius:5px;
      }
      #name{
        position: relative;
    left: 61px;
      }
      h2{
        text-align: center;
    font-size: 50px
      }
       
</style>
<body>
    
    <div class="container">
        <h2>Registration</h2>
        <form method="POST">

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name"  required>
        <br>
        <label for="email">Email id:               </label>
        <input type="text" id="email" name="email" placeholder="@gmail.com">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="pass" name="pass" placeholder="*******">
         <br>
        <label for="password">Confirm Password:</label>
        <input type="password" id="cpass" name="cpass" placeholder="*******">
         <br>

         <button type="submit" class="btn" name="submit">Register</button>

    </div>
</body>
</html>