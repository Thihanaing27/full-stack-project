<?php
include_once("config.php");


$usernameError = "";
$emailError = "";
$phonenumberError = "";
$passwordError = "";
$confirmpasswordError = "";

if (isset($_POST['register'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if (empty($name)) {
        $usernameError = "username field is required";
    }
    if (empty($email)) {
        $emailError = "email field is required";
    }
    if (empty($phonenumber)) {
        $phonenumberError = "phone number field is required";
    }
    if (empty($password)) {
        $passwordError = "password field is required";
    }
    if (empty($confirmpassword)) {
        $confirmpasswordError = "confirm password field is required";
    }
    if ($confirmpassword != $password) {
        $confirmpasswordError = "password does not match";
    }
    if (!empty($name) && !empty($email) && !empty($phonenumber) && !empty($password) && !empty($confirmpassword) && $confirmpassword == $password) {
        $qry = "INSERT INTO users (id , name , email , phone , password) VALUES ('0' , '$name' , '$email' , '$phonenumber','$password')";
        $data = mysqli_query($config, $qry);
        if ($data) {
            echo "success";
            header("Location:login.php");
        } else {
            echo "fail";
        }
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="top_bar">
        <div class="logo__container">
            <a href="index.php"><img src="upload/logo.jpg" alt="logo" class="logo"></a>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="index.php" class="btn btn-danger btn-sm">
                        << Home</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-group form">
        <h4><strong>Registration</strong></h4>
        <form action="register.php" method="post">
            <div>
                <div><label for="username">Username</label></div>
                <div><input type="text" name="username" class="form-control <?php if ($usernameError != "") { ?>is-invalid<?php } ?>" id="username"></div>
                <i class="text-dark"><?php echo $usernameError; ?></i>
            </div>

            <div>
                <div><label for="email">Email</div>
                <div><input type="email" name="email" class="form-control <?php if ($emailError != "") { ?>is-invalid<?php } ?>" id="email"></div>
                <i class="text-dark"><?php echo $emailError; ?></i>
            </div>
            <div>
                <div><label for="phonenumber">Phone Number</div>
                <div><input type="phonenumber" name="phonenumber" class="form-control <?php if ($phonenumberError != "") { ?>is-invalid<?php } ?>" id="phonenumber"></div>
                <i class="text-dark"><?php echo $phonenumberError; ?></i>
            </div>
            <div>
                <div><label for="password">Password</div>
                <div><input type="password" name="password" class="form-control <?php if ($passwordError != "") { ?>is-invalid<?php } ?>" id="password"></div>
                <i class="text-dark"><?php echo $passwordError; ?></i>
            </div>
            <div>
                <div><label for="confirmpassword">Confirm Password</div>
                <div><input type="password" name="confirmpassword" class="form-control <?php if ($confirmpasswordError != "") { ?>is-invalid<?php } ?>" id="confirmpassword"></div>
                <i class="text-dark"><?php echo $confirmpasswordError; ?></i>
            </div>

            <div class="btn_container">
                <button type="submit" name="register" class="btn btn-sm btn-primary">Register Now</button>
            </div>
            <div>
                <p>already have an account? <a href="login.php">Login In here! </a></p>
            </div>
        </form>
    </div>
    <?php
    include_once("footer.php");
    ?>

    <!--  
    username
    email
    phonenumber
    password
    confirm password
-->