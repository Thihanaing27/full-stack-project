<?php
include_once("config.php");
if (isset($_POST['sent'])) {
    $title= $_POST['feedback_title'];
    $dsc= $_POST['feedback_dsc'];
    $qry= "INSERT INTO feedback (id,title,description) VALUES (0,'$title','$dsc')";
    $result= mysqli_query($config,$qry);
    if($result){
            echo "success";
            header("Location:index.php");
    }else{
        echo "feedback error";
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
            <strong>Feedbacks</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong>Feedbacks</strong></div>
        <div class="hd_button_container"><a href="index.php" class="btn btn-sm btn-info"><<-back </a></div>
    </div>
    <div class="form-group form">
        <h4><strong>Sent to us Feedback</strong></h4>
        <form action="fmail.php" method="post">

            <div>
                <div><label for="feedback_title">Title</div>
                <div><input type="text" name="feedback_title" class="form-control" id="feedback_title"></div>
            </div>
            <div>
                <div><label for="feedback_dsc">Discription</div>
                <div><textarea type="password" name="feedback_dsc" class="form-control" id="feedback_dsc"></textarea></div>
            </div>
            <div class="btn_container">
                <button type="submit" name="sent" class="btn btn-sm btn-primary">Sent Now</button>
            </div>

        </form>
    </div>

    <?php
    include_once("footer.php");
    ?>