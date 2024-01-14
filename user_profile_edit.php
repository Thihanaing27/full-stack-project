<?php
session_start();
include_once("config.php");

$user_id = "";
$user_name = "";
$user_email = "";
$user_phone = "";
$user_password = "";

if (!$_SESSION['user_array']) {
    header("Location:index.php");
} else {
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $qry = "SELECT * FROM users WHERE id=$user_id";
        $user_array = mysqli_query($config, $qry);

        foreach ($user_array as $items) {
            $user_name = $items['name'];
            $user_email = $items['email'];
            $user_phone = $items['phone'];
            $user_password = $items['password'];
        }
    }
}
if (isset($_POST['confirm'])) {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $user_password = $_POST['user_password'];

    if($user_password == $password){
        $qry = "UPDATE users SET name='$username' , email='$email' , phone= '$phonenumber' WHERE id=$userid";
        $data = mysqli_query($config, $qry);
        if ($data) {
            header("Location:user_profile.php?user_id=$userid");
        } else {
            echo "error";
        }
    }else{
        echo "Wrong password";
        header("Location:user_profile_edit.php?user_id=$userid");
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
                <li><a href="user_profile.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger btn-sm">
                        << Back </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-group form">
        <h4><strong>Profile edition</strong></h4>
        <form action="user_profile_edit.php" method="post">
            <input type="hidden" value="<?php echo $user_password ?>" name="user_password">

            <div>
                <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
                <div><label for="username">Username</label></div>
                <div><input type="text" name="username" class="form-control" id="username" value="<?php echo $user_name; ?>"></div>

            </div>

            <div>
                <div><label for="email">Email</div>
                <div><input type="email" name="email" class="form-control " id="email" value="<?php echo $user_email; ?>"></div>

            </div>
            <div>
                <div><label for="phonenumber">Phone Number</div>
                <div><input type="phonenumber" name="phonenumber" class="form-control " id="phonenumber" value="<?php echo $user_phone; ?>"></div>

            </div>
            <div>
                <div><label for="password">Password</div>
                <div><input type="password" name="password" class="form-control " id="password" placeholder="Type the password to confirm"></div>

            </div>
            <!-- <div>
                <div><label for="confirmpassword">Confirm Password</div>
                <div><input type="hidden" name="confirmpassword" class="form-control " id="confirmpassword" value="<?php echo $user_password; ?>"></div>

            </div> -->

            <div class="btn_container">
                <button type="submit" name="confirm" class="btn btn-sm btn-primary">Confirm Now!</button>
            </div>
            <div>
                <p>already have an account? <a href="login.php">Login In here! </a></p>
            </div>
        </form>
    </div>
    <?php
    include_once("footer.php");
    ?>