<?php
session_start();
include_once("config.php");

if (!$_SESSION['user_array']) {
    header("Location:login.php");
} else {
    if ($_SESSION['user_array']['role'] != "admin") {
        header("Location:orders_count.php");
    }
}

$qry= "SELECT * FROM orders";
$orders_array= mysqli_query($config,$qry);


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
            <strong>Orders</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="posts_header_container">
        <div><strong><a href="admin.php"><i class="fa-solid fa-gauge"></i></a> | orders count</strong></div>
        <div class="hd_button_container"><a href="admin.php" class="btn btn-sm btn-info"> <<-back </a></div>
    </div>
    <table class="table table-bordered user_table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Product</th>
                <th>control</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($orders_array as $items) { 
                $order_id= $items['id'];?>
                <tr>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['email']; ?></td>
                    <td><?php echo $items['phone']; ?></td>
                    <td><?php echo $items['product']; ?></td>
                    <td><a href="#"> reply </a>|<a href="orders.php?order_deleted_id=<?php echo $order_id; ?>"> deleted </a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
    <?php
    if (isset($_GET['order_deleted_id'])) {
        $id = $_GET['order_deleted_id'];
        $qry = "DELETE FROM orders WHERE id=$id";
        $data = mysqli_query($config, $qry);
        if ($data) {
            header("Location:orders.php");
        } else {
            echo "post delete fail";
        }
    }
    ?>


    <?php
    include_once("footer.php");
    ?>