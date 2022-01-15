
<?php

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

error_reporting(0);

session_start();

if (isset($_SESSION['D_NAME'])) {
    header("Location: Dlogin.php");
}

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $D_NAME=$_POST['D_NAME'];
    $CLINIC=$_POST['CLINIC'];
    $GENDER=$_POST['GENDER'];
    $PHONE=$_POST['PHONE'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    //Insertion Query [Main-QUERY] for Doctor
    $insertquery="insert into doctor(D_NAME, CLINIC, GENDER, PHONE,email,password) values('$D_NAME','$CLINIC','$GENDER','$PHONE','$email','$password')";

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
    <title>Doctor SIGNUP</title>
    <link rel="stylesheet" href="css/DoctorRIG.css" class="css">
</head>
<body>
<div class="left">
        <h1>Welcome</h1>
        <p>Hello Doc, Manage your Appointments</p>
        </div>
</div>
    <div class="container">
        <div class="title">SIGN UP</div>
        <div class="content">
            <form action="DoctorRIG.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="D_NAME" placeholder="Enter your name" value="<?php echo $D_NAME; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Clinic</span>
                        <input type="text"  name="CLINIC"    placeholder="Enter your Clinic" value="<?php echo $CLINIC; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <input type="text"  name="GENDER"  placeholder="Enter your gender" value="<?php echo $GENDER; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text"  name="PHONE" placeholder="Enter your number" value="<?php echo $PHONE; ?>" required>
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
                <a href="Dlogin.php">Have an account? sign-in here</a>
            </form>
        </div>
    </div>
        
</body>
</html>






