<?php
session_start();
include_once("config.php");
$qry = ("SELECT * FROM posts");
$post_array = mysqli_query($config, $qry);
if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:posts.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="top_bar">
        <div class="logo__container">
            <a href="index.php"><img src="upload/logo.jpg" alt="logo" class="logo"></a>
        </div>
        <div class="topbar_header">
            <strong>Posts</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">


        <div>
            <strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | All Posts</strong>
        </div>
        <div class="hd_button_container">
            <a href="post_create.php" class="btn btn-sm btn-info">Add new post</a>
            <a href="admin.php" class="btn btn-sm btn-warning"> <<-Back </a>
        </div>
    </div>

    <form class="card_container" action="posts.php" method="post">
        <?php foreach ($post_array as $items) {
            $pid = $items['id'];
        ?>

            <div class="cards">
                <div class="card__title">
                    <h3><?php echo $items['title'] ?></h3>
                </div>
                <img src="upload/<?php echo $items['imglink']; ?>" class="cards__img fluid">
                <div class="card__content">
                    <p>
                        <?php echo $items['price']; ?>
                    </p>
                    <p>
                        <?php echo $items['description']; ?>
                    </p>
                    <a class="btn but-sm btn-primary" href="post_edit.php?pid=<?php echo $pid; ?>">Edit</a>
                    <a class="btn but-sm btn-danger" href="posts.php?post_deleted_id=<?php echo $pid; ?>">Deleted</a>
                </div>
            </div>
        <?php

        } ?>
    </form>
    <?php
    if (isset($_GET['post_deleted_id'])) {
        $id = $_GET['post_deleted_id'];
        $qry = "DELETE FROM posts WHERE id=$id";
        $data = mysqli_query($config, $qry);
        if ($data) {
            // header("Location:posts.php");
        } else {
            echo "post delete fail";
        }
    }
    ?>

    <?php
    include_once("footer.php");
    ?>