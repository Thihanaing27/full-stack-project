<?php
session_start();
include_once("config.php");

if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:users_count.php");
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
            <strong>Users</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="#" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | Users count</strong></div>
        <div class="hd_button_container"><a href="admin.php" class="btn btn-sm btn-info"> <<-back </a></div>
    </div>
    <table class="table table-bordered user_table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Users control</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = mysqli_query($config, ("SELECT * FROM users"));
            // $user_count = mysqli_num_rows($data);
            foreach ($data as $items) { 
                $user_count_id= $items['id'];
                ?>
                <tr>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['email']; ?></td>
                    <td><?php echo $items['phone']; ?></td>
                    <td><?php echo $items['role']; ?></td>
                    <td><a href="user_profile_edit.php?user_id=<?php echo $user_count_id; ?>"> edit </a>|<a href="users_count.php?user_deleted_id=<?php echo $user_count_id; ?>"> deleted </a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
    <?php
    if (isset($_GET['user_deleted_id'])) {
        $id = $_GET['user_deleted_id'];
        $qry = "DELETE FROM users WHERE id=$id";
        $data = mysqli_query($config, $qry);
        if ($data) {
            header("Location:users_count.php");
        } else {
            echo "post delete fail";
        }
    }
    ?>


    <?php
    include_once("footer.php");
    ?>