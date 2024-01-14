<?php
$userName = "";
if (!$_SESSION){
   
}else{
    if ($_SESSION['user_array']['role']) {
        $userName= $_SESSION['user_array']['name'];
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
    <link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>

<body>

    <div class="top_bar">
        <div class="logo__container">
            <a href="index.php"><img src="upload/logo.jpg" alt="logo" class="logo"></a>
        </div>
        <div class="topbar__items">
            <ul>
                <?php if($userName != ""){?>
                <li><a href="user_profile.php?user_id=<?php echo $_SESSION['user_array']['id'] ?>" class="text-white"><?php echo $userName; ?></a></li>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Logout</a></li>
                <?php }else { ?>
                <li><a href="register.php" class="btn btn-primary btn-sm">Register</a></li>
                <li><a href="login.php" class="btn btn-warning btn-sm">Login</a></li>
            <?php }?>
            </ul>
        </div>
    </div>