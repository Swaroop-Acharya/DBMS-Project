
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
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    if( $AGE>99 ){
        ?>
        <script>
            alert("Woops! ,Please enter a valid age")
        </script>
        <?php
        }else{
            //Insert Query 
            $insertquery="insert into patient(PAT_NAME,AGE, GENDER,PAT_LOCATION, PHONE,email,password) values(' $PAT_NAME',' $AGE','$GENDER', '$PAT_LOCATION','$PHONE', '$email','$password')";
            $res= mysqli_query($con,$insertquery);

            //Update Query for Pharmacy ID in patient table
            $query2="select P_ID,P_NAME from pharmacy where P_LOCATION='$PAT_LOCATION' ";
            $pex=mysqli_query($con,$query2);
            $fetch=mysqli_fetch_array($pex);

            //pharmacy ID
            $P_ID=$fetch['P_ID'];

            //QUERY: Updating the patient table[pharmacy ID]
            $query3="update patient
            set  P_ID=$P_ID
            where email='$email' and  PHONE='$PHONE' and password ='$password'";

            $execute2=mysqli_query($con,$query3);

        }

    //Insertion Query [Main-QUERY] for table Employee

    //Executing the Query

    //Checking if it is Successful
   if($res){
       ?>
       <script>
           alert("Login succesfuly completed");
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
    <title>Patient SIGNUP</title>
    <link rel="stylesheet" href="css/PatientRIG.css" class="css">
</head>
<body>
    <div class="left">
        <h1>Welcome</h1>
        <h6>Manage your prescription</h6>
        </div>
    <div class="container">
        <div class="title">SIGNUP</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Name</span>
                        <input type="text" name=" PAT_NAME" value="<?php echo $PAT_NAME; ?>" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="AGE"  value="<?php echo $AGE; ?>" placeholder="Enter your age" required>
                    </div>
                    <div class="col-10">
                    <label for="gender" required>Gender:</label>
                </div>
                <div class="col-90">
                    <input type="radio" id="Male" name="GENDER" required value="Male"/>Male
                    <input type="radio" id="Female" name="GENDER" required value="Female"/>Female
                </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text" name="PAT_LOCATION" value="<?php echo $PAT_LOCATION; ?>" placeholder="Enter your location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone</span>
                        <input type="text"   pattern="[6789]{1}[0-9]{9}" name="PHONE" value="<?php echo $PHONE; ?>" placeholder="Enter your phone number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password"  value="<?php echo $_POST['password']; ?>" placeholder="Ex:Swaroop@3" required>
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


