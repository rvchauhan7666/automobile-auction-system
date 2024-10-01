<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = mysqli_real_escape_string($con, $_POST['mail']);  // Sanitize user input
    $password = mysqli_real_escape_string($con, $_POST['password']);  // Sanitize user input

    if (!empty($gmail) && !empty($password)) {
        $query = "SELECT * FROM user WHERE email = '$gmail' AND pass = '$password'";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("Location: userinfo.php");
                exit();
            } else {
                echo "<script type='text/javascript'> alert('Invalid email or password.')</script>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid email and password.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           
            margin: 0;
            padding: 0;
            background: url(ROHIT.jpeg) no-repeat center center/cover;
        }

        .container {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
           color:#fff;

           
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h2 {
            text-align: center;
            color: #fff;

        }

        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px; 
            background-color: #FF5722;
            color: #fff;
            border: 2px;
            border-radius: 5px;
            cursor: pointer;

        }

        button:hover {
            background-color: #E64A19; 
        }
        a{
            text-decoration: none;
            color: #ccc;
        }
       a:hover{
        color:#FF5722
       }
        .submit {
            width: 5rem;
            height: 1.7rem;
            position: relative;
           
            
        }
        #register{
            background-color: #FF5722;
            color:#fff;
            width:5rem;
            height:2rem;
           border-radius: 5px;
            cursor: pointer
    
        }
       .has {
        font-weight: bold;
        font-size:18px;
       } 
    </style>
</head>
<body>
    <div class="container">
      <form action = "login.php" method="post">
                <legend>LOGIN FORM</legend>
                <hr>
                <input type="email" name="mail" id="mail"placeholder="Email" required><br><br>
                <input type="password" name="password" id="password"placeholder="password" required><br><br>
               <input type="submit" value="LOGIN" id="register">
               <p class="have"> Don't have an account? <a href=".\register.php" class="has">Sign up.</a></p>

    </div>

</body>
</html>