<?php

include 'connection.php';

$id=$_GET['Did'];


$deletequery="delete from employee where E_ID=$id";

$query=mysqli_query($con,$deletequery);

header('location:EmployeeDisplay.php');

?>