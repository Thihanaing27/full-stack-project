<?php
session_start();
include_once("config.php");

if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:post_create.php");
    }
}


if (isset($_POST['upload'])) {
    $title = $_POST['postTitle'];
    $price = $_POST['postPrice'];
    $description = $_POST['postDescription'];
    // echo $title, $price,$description;

    $imglink = $_FILES['postImg']['name'];
    move_uploaded_file($_FILES['postImg']['tmp_name'], 'upload/' . $imglink);
    $qry = "INSERT INTO posts (id, title , price , description , imglink) VALUES ('0' , '$title' , '$price' , '$description','$imglink')";
    $data = mysqli_query($config, $qry);
    if ($data) {
        header("Location:posts.php");
    } else {
        echo "error";
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
            <strong>Post Create</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | Post Creation</strong></div>
        <div class="hd_button_container"><a href="posts.php" class="btn btn-sm btn-info"> <<- Back</a></div>
    </div>
    <form class="create_form" action="post_create.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="postTitle">Post Title</label><br>
            <input type="text" name="postTitle" id="postTitle" class="form-control">
        </div>

        <div>
            <label for="postPrice">Price</label><br>
            <input type="text" name="postPrice" id="postPrice" class="form-control">
        </div>
        <div>
            <label for="postDescription">Description</label><br>
            <textarea name="postDescription" id="postDescription" class="form-control">
            </textarea>
        </div>
        <div>
            <label for="postImg">Select a picture</label><br>
            <input type="file" name="postImg" id="postImg" class="form-control">
        </div>
        <div>
            <button type="submit" name="upload" class="btn btn-sm btn-info">Upload</button>
            <button type="reset" class="btn btn-sm btn-warning">Cancle</button>
        </div>

    </form>



    <?php
    include_once("footer.php");
    ?>