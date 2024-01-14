<?php 
session_start();
$admin_name="";

if ($_SESSION['user_array']){
    $admin_name = $_SESSION['user_array']['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/admin.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!-- <link rel="stylesheet" href="../css/fontawesome.min.css"> -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  -->

    <title>Document</title>
</head>

<body>
    <div class="top_bar">
        <div class="logo__container">
        <a href="index.php"><img src="upload/logo.jpg" alt="logo" class="logo"></a>
        </div>
        <div class="topbar_header">
            <strong>Admin Page</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><p><?php echo $admin_name;?></p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
