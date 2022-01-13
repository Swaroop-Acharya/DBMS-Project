<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy SIGUP</title>
    <link rel="stylesheet" href="css/PharmacyRIG.css" class="css">
</head>

<body>
    <div class="left">
        <h1>Welcome</h1>
        <p>Phramacy ,lets help togther</p>
        </div>
    <div class="container">
        <div class="title">SIGN UP</div>
        <div class="content">
            <form action="PharmacyRIG.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Name</span>
                        <input type="text" name=" P_NAME" placeholder="Enter your Phramacy name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text" name="P_LOCATION" placeholder="Enter your location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text"  name="EMAIL" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="PHONE" placeholder="Enter your Phone number" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
            </form>
        </div>
    </div>

</body>

</html>





<?php

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $P_NAME=$_POST['P_NAME'];
    $P_LOCATION=$_POST['P_LOCATION'];
    $EMAIL=$_POST['EMAIL'];
    $PHONE=$_POST['PHONE'];

    //Insertion Query [Main-QUERY] for table Pharmacy
    $insertquery="insert into pharmacy(P_NAME, P_LOCATION, EMAIL, PHONE) values('$P_NAME','$P_LOCATION','$EMAIL','$PHONE')";

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