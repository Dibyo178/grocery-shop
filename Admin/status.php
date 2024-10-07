<?php


include_once("tokenconnect.php");

$Pid=$_GET['tid'];

$status=$_GET['status'];

$update_q="UPDATE product_cart SET status=$status WHERE id=$Pid";
 
mysqli_query($con,$update_q);

header('location:product_cart.php');


?>