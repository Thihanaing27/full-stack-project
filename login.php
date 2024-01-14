<?php
session_start();
include_once("config.php");
?>
<?php
$error = "";
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $data = mysqli_query($config, ("SELECT * FROM users WHERE email='$email' AND password='$password'"));
    $user_count = mysqli_num_rows($data);
    if ($user_count === 1) {
        $user_array= mysqli_fetch_assoc($data);
        $_SESSION['user_array']= $user_array;

        if($user_array['role'] == 'admin'){
            header('Location:admin.php');
        } else{
            header("Location:index.php");
        }
        
    } else {
        $error = "invalid email or password";
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
            <img src="upload/logo.jpg" alt="logo" class="logo">
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
        <form action="login.php" method="post">
            <div>
                <?php 
                if ($error != ""):
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $error;?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif?>
            </div>
            <div>
                <div><label for="email">Email</div>
                <div><input type="email" name="email" class="form-control" id="email"></div>
            </div>
            <div>
                <div><label for="password">Password</div>
                <div><input type="password" name="password" class="form-control" id="password"></div>
            </div>
            <div class="btn_container">
                <button type="submit" name="login" class="btn btn-sm btn-primary">login</button>
            </div>
            <div>
                <p>If you doesn't have an account <br> <a href="register.php">click for Register </a></p>
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