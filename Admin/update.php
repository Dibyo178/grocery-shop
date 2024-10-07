<?php include('tokenconnect.php');


$id=$_GET['tid'];

$status=$_GET['status'];


$q="update tbl_token set status=$status where tid=$id";

mysqli_query($con,$q);

header('location:tokenList.php');



?>