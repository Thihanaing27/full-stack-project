<?php
session_start();
include_once("config.php");
$user_id = "";
$user_name = "";
$user_email = "";
$user_phoneNumber = "";

if (!$_SESSION) {
  header("Location:index.php");
} else {
  $user_id = $_GET["user_id"];
  $qry= "SELECT * FROM users WHERE id=$user_id";
  $data= mysqli_query($config,$qry);
  foreach($data as $items){
    $user_name = $items["name"];
    $user_email = $items["email"];
    $user_phoneNumber = $items["phone"];
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <div class="top_bar">
    <div class="logo__container">
      <a href="index.php"><img src="upload/logo.jpg" alt="logo" class="logo"></a>
    </div>
    <div class="topbar__items">
      <ul>
        <li><a href="index.php" class="btn btn-danger btn-sm">
            << Home</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="profile_card_container">

    <div class="card-header text-center">
      <h3>Profile</h3>
    </div>
    <div class="profile_card">
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
      <ul>
        <li>Name</li>
        <li>Email</li>
        <li>Phone Number</li>
      </ul>
      <ul>
        <li>::</li>
        <li>::</li>
        <li>::</li>
      </ul>
      <ul>
        <li><?php echo $user_name;?></li>
        <li><?php echo $user_email;?></li>
        <li><?php echo $user_phoneNumber;?></li>
      </ul>

    </div>
    <div class="card-footer profile_footer">
      <a href="user_profile_edit.php?user_id=<?php echo $user_id; ?>" class="btn btn-sm btn-primary">Edit Your Profile</a>
    </div>
  </div>
  <?php
  include_once("footer.php");
  ?>