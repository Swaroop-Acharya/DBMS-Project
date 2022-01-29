<?php
session_start();
session_destroy();
include 'connection.php';

$pid=$_GET['pid'];


$deletequery="delete from pharmacy where P_ID='$pid' ";

$query=mysqli_query($con,$deletequery);

header('location:Home.php');

?>