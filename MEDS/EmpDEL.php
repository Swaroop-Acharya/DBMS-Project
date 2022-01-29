<?php

include 'connection.php';

$id=$_GET['Did'];

//QUERY
$deletequery="delete from employee where E_ID=$id";

$query=mysqli_query($con,$deletequery);

header('location:EmployeeDisplay.php');

?>