<?php 
$config = mysqli_connect("localhost", "root", "","itstore");

if (!$config){
    echo "error". mysqli_connect_error();
}
?>