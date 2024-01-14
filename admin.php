<?php
session_start();
include_once("check_session.php");
$admin_name = "";

include_once("config.php");

if ($_SESSION['user_array']) {
    $admin_name = $_SESSION['user_array']['name'];
}

$data = mysqli_query($config, ("SELECT * FROM users WHERE id "));
$user_count = mysqli_num_rows($data);

$data = mysqli_query($config, ("SELECT * FROM posts WHERE id "));
$posts_count = mysqli_num_rows($data);

$data = mysqli_query($config, ("SELECT * FROM orders WHERE id "));
$orders_count = mysqli_num_rows($data);


// <img src="../upload/dashboard.png" alt="dashboard">

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">


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
                <li>
                    <p><?php echo $admin_name; ?></p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- content start-->
    <div class="content_container">
        <div class="admin_header">
            <div><a href="admin.php"><i class="fa-solid fa-gauge"></i></a>
                <p>dashboard</p>
            </div>
            <div><a href="posts.php"><i class="fa-solid fa-cloud-arrow-up"></i></a>
                <p>Posts</p>
            </div>
            <div><a href="users_count.php"><i class="fa-solid fa-user-group"></i></a>
                <p>Users</p>
            </div>
            <div><a href="orders.php"><i class="fa-solid fa-cart-arrow-down"></i></a>
                <p>Orders</p>
            </div>
            <div><a href="feedback_admin.php"><i class="fa-solid fa-comment-dots"></i></a>
                <p>Feedbacks</p>
            </div>
        </div>
        <div class="content__items">
            <div><strong>Users count</strong>
                <p><?php echo $user_count; ?></p>
            </div>
            <div><strong>posts count</strong>
                <p><?php echo $posts_count; ?></p>
            </div>
            <div><strong>Orders</strong>
                <p><?php echo $posts_count; ?>orders</p>
            </div>
            <div><strong>feedbacks</strong>
                <p>1000 feedbacks</p>
            </div>
        </div>
    </div>




    <?php
    include_once("footer.php");
    ?>