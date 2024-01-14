<?php 
session_start();
include_once("config.php");

if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:feedback_admin.php");
    }
}

$qry= "SELECT * FROM feedback";
$result= mysqli_query($config,$qry);


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
            <strong> Feedbacks</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> |Feedbacks</strong></div>
        <div class="hd_button_container"><a href="admin.php" class="btn btn-sm btn-info"> <<-back </a></div>
    </div>

    <table class="table table-bordered user_table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Feedback discription</th>
                <th>control</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $items){
                $feedback_id=$items['id'];
                ?>
           
                <tr>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['title']; ?></td>
                    <td><?php echo $items['description']; ?></td>
                    <td><a href="#"> reply </a>|<a href="feedback_admin.php?feedback_deleted_id=<?php echo $feedback_id?>"> deleted </a></td>
                </tr>
                <?php }
            ?>
        </tbody>
    </table>
    <?php
    if (isset($_GET['feedback_deleted_id'])) {
        $id = $_GET['feedback_deleted_id'];
        $qry = "DELETE FROM feedback WHERE id=$id";
        $data = mysqli_query($config, $qry);
        if ($data) {
            header("Location:feedback_admin.php");
        } else {
            echo "feedback delete fail";
        }
    }
    ?>
    <?php
    include_once("footer.php");
    ?>