<?php
session_start();
include_once("config.php");

$product = "";
$usernameError = "";
$emailError = "";
$usernameError = "";
$productError = "";
if (isset($_GET['product'])) {
    $product = $_GET['product'];
}
if (isset($_POST["order"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $product = $_POST["product"];

    if (empty($username)) {
        $usernameError = "username field is required";
    }
    if (empty($email)) {
        $emailError = "email field is required";
    }
    if (empty($phonenumber)) {
        $phonenumberError = "phone number is required";
    }
    if (empty($product)) {
        $uproductError = "product field is required";
    }
    if (!empty($username) && !empty($email) && !empty($phonenumber) && !empty($product)){
        $qry= "INSERT INTO orders (id,name,email,phone,product) VALUES ('0','$username ','$email ','$phonenumber','$product')";
        $result = mysqli_query($config,$qry);
        if($result){
                echo "successfully ordered";
                header("Location:index.php");
        }else{
            echo "Order fail";
        }

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
            <strong>Fill to order</strong>
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="index.php" class="btn btn-danger btn-sm"> << Back </a></li>
            </ul>
        </div>
    </div>
    <div class="form-group form">
        <h4><strong>Please fill information to order</strong></h4>
        <form action="order_confirm.php" method="post">
            <div>
                <div><label for="username">Username</label></div>
                <div><input type="text" name="username" class="form-control " id="username"></div>
                <i class="text-danger"><?php echo $usernameError; ?></i>
            </div>

            <div>
                <div><label for="email">Email</div>
                <div><input type="email" name="email" class="form-control" id="email"></div>
                <i class="text-danger"><?php echo $usernameError; ?></i>
            </div>
            <div>
                <div><label for="phonenumber">Phone Number</div>
                <div><input type="phonenumber" name="phonenumber" class="form-control " id="phonenumber"></div>
                <i class="text-danger"><?php echo $usernameError; ?></i>
            </div>
            <div>
                <div><label for="product">Product</div>
                <div><input type="text" name="product" class="form-control " id="product" value="<?php echo $product; ?>"></div>
                <i class="text-danger"><?php echo $usernameError; ?></i>
            </div>
            <!-- <div>
                <div><label for="confirmpassword">Confirm Password</div>
                <div><input type="password" name="confirmpassword" class="form-control" id="confirmpassword"></div>

            </div> -->

            <div class="btn_container">
                <button type="submit" name="order" class="btn btn-sm btn-primary">Order Now</button>
            </div>
            <!-- <div>
                <p>already have an account? <a href="login.php">Login In here! </a></p>
            </div> -->
        </form>
    </div>
    <!-- <div class="posts_header_container">
        <div><strong>Users count</strong></div>
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
            $data = mysqli_query($config, ("SELECT * FROM users"));
            // $user_count = mysqli_num_rows($data);
            foreach ($data as $items) { ?>
                <tr>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['email']; ?></td>
                    <td><?php echo $items['phone']; ?></td>
                    <td><?php echo $items['role']; ?></td>
                    <td><a href="#"> reply </a>|<a href="#"> deleted </a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table> -->


    <?php
    include_once("footer.php");
    ?>