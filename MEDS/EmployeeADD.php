<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Admission</title>
    <link rel="stylesheet" href="css/EmployeeADD.css" class="css">
</head>
<body>
    <div class="left">
        <h1>ADD</h1>
        <h3 style="color:white; , font: size 150px; ">AN</h3>
        <h1>EMPLOYEE</h1>
        <p>Lets bulid an Medic Army</p>
        </div>
    <div class="container">
        <div class="title">HIRE</div>
        <div class="content">
            <form action="EmployeeADD.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Name</span>
                        <input type="text" name=" E_NAME" placeholder="Enter employee Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <input type="text" name="GENDER" placeholder="Enter employee Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="PHONE" placeholder="Enter employee Phone Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">SALARY</span>
                        <input type="text"  name="SALARY" placeholder="Salary" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="HIRE UP">
                </div>
            </form>
        </div>
    </div>

</body>

</html>





<?php
session_start();
//Connecting to our DATA base[needmeds]
include 'connection.php' ;

$phname= $_SESSION['P_NAME'];


$query1="select P_ID from pharmacy where P_NAME='$phname' ";

$squery=mysqli_query($con, $query1);


$res=mysqli_fetch_array($squery);


$P_ID=$res['P_ID'];

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $E_NAME=$_POST['E_NAME'];
    $GENDER=$_POST['GENDER'];
    $PHONE=$_POST['PHONE'];
    $SALARY=$_POST['SALARY'];

    //Insertion Query [Main-QUERY] for table Employee
    $insertquery="insert into employee(E_NAME, GENDER, PHONE,SALARY,P_ID) values('$E_NAME','$GENDER','$PHONE','$SALARY','$P_ID')";

    //Executing the Query
   $res= mysqli_query($con,$insertquery);

    //Checking if it is Successful
   if($res){
       ?>
       <script>
           alert("Login succesfuly completed");
       </script>
       <?php
   }else{
    ?>
       <script>
           alert("EROOR");
       </script>
       <?php
   }   
}
?>