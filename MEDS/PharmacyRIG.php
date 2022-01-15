
<?php

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

error_reporting(0);

session_start();

if (isset($_SESSION['P_NAME'])) {
    header("Location: PHlogin.php");
}

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $P_NAME=$_POST['P_NAME'];
    $P_LOCATION=$_POST['P_LOCATION'];
    $PHONE=$_POST['PHONE'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    //Insertion Query [Main-QUERY] for Pharmacy
    $insertquery="insert into pharmacy(P_NAME,P_LOCATION,PHONE,email,password) values('$P_NAME','$P_LOCATION','$PHONE','$email','$password')";

    //Executing the Query
   $res= mysqli_query($con,$insertquery);

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
    <title>Pharmacy SIGNUP</title>
    <link rel="stylesheet" href="css/DoctorRIG.css" class="css">
</head>
<body>
<div class="left">
        <h1>Welcome</h1>
        <p>Pharmacy, Lets cure people</p>
        </div>
</div>
    <div class="container">
        <div class="title">SIGN UP</div>
        <div class="content">
            <form action="PharmacyRIG.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="P_NAME" placeholder="Enter your pharmacy Name" value="<?php echo $P_NAME; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text"  name="P_LOCATION"    placeholder="Enter your pharmacy Location" value="<?php echo $P_LOCATION; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text"  name="PHONE" placeholder="Enter your phone number" value="<?php echo $PHONE; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email"  name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password"  name="password" placeholder="Enter your password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
                <a href="PHlogin.php">Have an account? sign-in here</a>
            </form>
        </div>
    </div>
        
</body>
</html>

