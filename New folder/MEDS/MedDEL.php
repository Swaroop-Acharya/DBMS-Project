<?php

include 'connection.php';

$id=$_GET['id'];


$deletequery="delete from stocks where M_ID='$id' ";

$query=mysqli_query($con,$deletequery);

header('location:PHwelcome.php');

?>