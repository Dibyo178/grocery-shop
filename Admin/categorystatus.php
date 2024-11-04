<?php


include_once("tokenconnect.php");

$Pid=$_GET['tid'];

$status=$_GET['status'];

$update_q="UPDATE tbl_category SET status=$status WHERE catid=$Pid";
 
mysqli_query($con,$update_q);

header('location:category.php');


?>