<?php
session_start();
include_once("config.php");
$title = "";
$price = "";
$description = "";
$imglink = "";
$pid = "";
if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:post_edit.php");
    }
}
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $qry = "SELECT * FROM posts WHERE id=$pid";
    $post_array = mysqli_query($config, $qry);

    foreach ($post_array as $items) {
        $title = $items['title'];
        $price = $items['price'];
        $description = $items['description'];
        $imglink = $items['imglink'];
    }
}

if (isset($_POST['update'])) {
    $postId = $_POST['postId'];
    $postTitle = $_POST['postTitle'];
    $postPrice = $_POST['postPrice'];
    $postDescription = $_POST['postDescription'];
    $oldImg = $_POST['oldImg'];
    $postImg = $_FILES['postImg']['name'];
    $post_edit_img = "";
    if ($postImg != null) {
        $post_edit_img = "$postImg";
        move_uploaded_file($_FILES['postImg']['tmp_name'], 'upload/' . $postImg);;
    } else {
        $post_edit_img = "$oldImg";
    }


    $qry = "UPDATE posts SET title='$postTitle' , price='$postPrice' , description= '$postDescription', imglink= '$post_edit_img' WHERE id=$postId";
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
            <img src="upload/logo.jpg" alt="logo" class="logo">
        </div>
        <div class="topbar_header">
            <strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | Posts</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="#" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | Post Editing</strong></div>
        <div class="hd_button_container"><a href="posts.php" class="btn btn-sm btn-info"> <<- Back</a></div>
    </div>
    <form class="create_form" action="post_edit.php" method="post" enctype="multipart/form-data">
        <div><input name="postId" type="hidden" value="<?php echo $pid; ?>"></div>
        <div>
            <label for="postTitle">Post Title</label><br>
            <input type="text" name="postTitle" id="postTitle" class="form-control" value="<?php echo $title; ?>">
        </div>
        <div>

        </div>

        <div>
            <label for="postPrice">Price</label><br>
            <input type="text" name="postPrice" id="postPrice" class="form-control" value="<?php echo $price; ?>">
        </div>
        <div>
            <label for="postDescription">Description</label><br>
            <textarea type="text-area" name="postDescription" id="postDescription" class="form-control"><?php echo $description; ?></textarea>
        </div>
        <div>
            <label for="postImg">Select a picture</label><br>
            <img src='upload/<?php echo $imglink; ?>' class='cards__img fluid'>
            <input type="hidden" name="oldImg" value="<?php echo $imglink; ?>">
            <input type="file" name="postImg" id="postImg" class="form-control" value="upload/<?php echo $imglink; ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-sm btn-info" name="update">Update</button>
            <button type="reset" class="btn btn-sm btn-warning">Cancle</button>
        </div>

    </form>



    <?php
    include_once("footer.php");
    ?>