<?php
include_once('config.php');
$fullName=$_POST['fullName'];
$name= $_POST['username'];
$email= $_POST['email'];
$phoneNumber= $_POST['phoneNumber'];
$password= $_POST['password'];
$confirmPassword= $_POST['confirmPassword'];

if(isset($_POST['Register'])){
$fullNameError="";
$usernameError="";
$emailError="";
$phoneNumberError="";
$passwordError="";
$confirmPasswordError="";

if(empty($fullName)){
     $fullNameError="The full name field is required";
}if(empty($name)){
    $usernameError="The username field is required";
}if(empty($email)){
    $emailError="The email field is required";
}if(empty($phoneNumber)){
    $phoneNumberError="phone number field is required";
}if(empty($password)){
    $passwordError="The password field is required";
}if(empty($confirmPassword)){
    $confirmPasswordError="The confirm password field is required";
}else{
       $qry = "INSERT INTO users (id ,fullname, name , email ,ph, password) VALUES ('0' ,'$fullName', '$name' , '$email' , '$phoneNumber','$password')";
   $data=mysqli_query($con,$qry);
   if($data){
       echo "success";
   }else {
       echo "fail";
   }
}

}

?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<title>IT Store</title>

<body>
    <!--top bar start-->
    <div class="top-bar position-sticky">
        <div class="logo__container">
            <img src="/images/logo.jpg" alt="logo" class="logo">
        </div>
        <div class="topbar__items">
            <ul>
                <li><a href="register.php" class="btn btn-danger btn-sm">Register</a></li>
                <li><a href="login.php" class="btn btn-warning btn-sm">Login</a></li>
            </ul>
        </div>

    </div>
    <!--top bar end-->
    

    <!--nav-bar start -->
<!--
    <div class="nav-bar-container">
        <div class="nav__name">
            <strong>IT STORE</strong>
        </div>
        <input type="checkbox" id="check" class="check">
        <label for="check" class="check-btn"><img src="./images/menu.png" class="check__img"></label>
        <div class="nav__link">
            <ul>
                <li><a href="home.php" class="btn btn-sm btn-primary">home</a></li>
                <li><a href="#" class="btn btn-sm btn-primary">About</a></li>
                <div class="btn-group dropstart nav__dropdown">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropstart
                    </button>
                    <ul class="dropdown-menu dd__menu">
                        <li><a class="dropdown-item btn btn-sm btn-primary" href="#">Menu item</a></li>
                        <li><a class="dropdown-item btn btn-sm btn-primary" href="#">Menu item</a></li>
                        <li><a class="dropdown-item btn btn-sm btn-primary" href="#">Menu item</a></li>
                    </ul>
                </div>
                <li><a href="#" class="btn btn-sm btn-primary">contact</a></li>
                <li><a href="#" class="btn btn-sm btn-primary">Feedback</a></li>
            </ul>
        </div>
    </div>
    -->
    <!--nav-bar-end -->
    
    <!--register form start-->
    <div class="container form_container">
        <h1 class="form-title">Registration</h1>
        <form action="register.php" method="POST" class="">
            
            <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label><br>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
                    
          </div>
              <i class="text-danger"><?php echo $fullNameError;?></i>
          <div class="user-input-box">
            <label for="username">Username</label><br>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"/>
          </div>
          <i class="text-danger"><?php echo $usernameError;?></i>
          <div class="user-input-box">
            <label for="email">Email</label><br>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <i class="text-danger"><?php echo $emailError;?></i>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label><br>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number"/>
          </div>
          <i class="text-danger"><?php echo $phoneNumberError;?></i>
          <div class="user-input-box">
            <label for="password">Password</label><br>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <i class="text-danger"><?php echo $passwordError;?></i>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label><br>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
          <i class="text-danger"><?php echo $confirmPasswordError;?></i>
        </div>
        <div class="gender-details-box py-4">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Other</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register" class="btn btn-md btn-info" name="Register">
        </div>
            <div class="form__footer">
            <span>already have an account?  /   <a href="login.php">SingIn !</a></span>
            </div>
        </form>
    </div>
    <!--register form end-->
    
    <!--form started
    <div class="container">
        <form action="<?PHP_SELF?>" method="" class="form">
              <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Other</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
        </form>
        
    </div>
    <!--form end-->
    
    <!--footer start -->
    <div class="footer">
        <div class="container footer_container">
            <div>
              <h3>IT STORE</h3>
              <p>
                Yangon <br>
                Mandalay <br>
                </p>
              <strong>Phone:</strong> +959257655506 <br>
              <strong>Email:</strong> thihanaing27220223@gamil.com <br>
            </div>
            <div class="footer__links">
                <h4>Usefull Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policey</a></li>
                </ul>
            </div>
        </div>
        <hr>
      <div class="container py-4 footer__name">
        <div class="copyright">
          &copy; Copyright <strong><span>IT STORE</span></strong>. All Rights Reserved
        </div>
        <div class="credits footer__links">
          Designed by <a href="#">THIHA NAING</a>
        </div>
      </div>
    </div>


    <!--footer end -->
</body>
</html>