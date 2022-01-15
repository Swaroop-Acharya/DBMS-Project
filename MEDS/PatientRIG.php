
<?php


error_reporting(0);

session_start();

if (isset($_SESSION['PAT_NAME'])) {
    header("Location: PATlogin.php");
}

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $PAT_NAME=$_POST['PAT_NAME'];
    $AGE=$_POST['AGE'];
    $GENDER=$_POST['GENDER'];
    $PAT_LOCATION=$_POST['PAT_LOCATION'];
    $PHONE=$_POST['PHONE'];
    $P_ID=$_POST['P_ID'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    //Insertion Query [Main-QUERY] for table Employee
    $insertquery="insert into patient(PAT_NAME,AGE, GENDER,PAT_LOCATION, PHONE,P_ID,email,password) values(' $PAT_NAME',' $AGE','$GENDER', '$PAT_LOCATION','$PHONE','$P_ID', '$email','$password')";

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
        <h1>Sign up</h1>
        <h3 style="color:white; , font: size 150px; ">and</h3>
        <h1>Book an Appointment</h1>
        </div>
    <div class="container">
        <div class="title">SIGNUP</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Name</span>
                        <input type="text" name=" PAT_NAME" value="<?php echo $PAT_NAME; ?>" placeholder="Enter employee Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="AGE" value="<?php echo $AGE; ?>" placeholder="Enter employee Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <input type="text" name="GENDER" value="<?php echo $GENDER; ?>" placeholder="Enter employee Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text" name="PAT_LOCATION" value="<?php echo $PAT_LOCATION; ?>" placeholder="Enter employee Phone Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone</span>
                        <input type="text"  name="PHONE" value="<?php echo $PHONE; ?>" placeholder="Salary" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pharmacy ID</span>
                        <input type="text" name="P_ID" value="<?php echo $P_ID; ?>" placeholder="Pharmacy ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Pharmacy ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password"  value="<?php echo $_POST['password']; ?>" placeholder="Enter password" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="SIGN UP">
                </div>
                <a href="PATlogin.php">Have an account? sign-in here</a>
            </form>
        </div>
    </div>

</body>

</html>


