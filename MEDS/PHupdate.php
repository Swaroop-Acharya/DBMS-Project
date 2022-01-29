<?php

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

$ids=$_GET['puid'];

$sq="select * from pharmacy where P_ID='$ids'";
$shdata=mysqli_query($con,$sq);
$arrd=mysqli_fetch_array($shdata);
//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $PidU=$_GET['puid'];
    $P_NAME=$_POST['P_NAME'];
    $P_LOCATION=$_POST['P_LOCATION'];
    $PHONE=$_POST['PHONE'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    //Update Query [Main-QUERY] for Pharmacy

    $uquery="update pharmacy
            set P_NAME='$P_NAME', P_LOCATION='$P_LOCATION' ,PHONE='$PHONE' ,email='$email',password='$password'
            where P_ID=' $PidU',";

   

    //Executing the Query
   $res= mysqli_query($con,$uquery);

    //Checking if it is Successful
   if($res){
       ?>
       <script>
           alert("Sign Up successful");
       </script>
       <?php
   }else{
    ?>
       <script>
           alert("Woops! Something went wrong");
       </script>
       <?php
   }   
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Profile Update</title>
    <link rel="stylesheet" href="css/DoctorRIG.css" class="css">
</head>
<body>
<div class="left">
        <h1>EDIT PROFILE</h1>
        </div>
</div>
    <div class="container">
        <div class="title">Profile</div>
        <div class="content">
            <form action="PharmacyRIG.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="P_NAME" placeholder="Enter your pharmacy Name" value="<?php echo $arrd['P_NAME']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text"  name="P_LOCATION"    placeholder="Enter your pharmacy Location" value="<?php echo $arrd['P_LOCATION']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text"  name="PHONE" placeholder="Enter your phone number" value="<?php echo $arrd['PHONE']; ?>" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

