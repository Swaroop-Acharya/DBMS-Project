<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Prescription</title>
    <link rel="stylesheet" href="css/PrRIG.css" class="css">
</head>

<body>
    <div class="left">
        <h1>PRESCRIPTION</h1>
        <p>Write and send it to pharamcy in one click!!</p>
        </div>
    <div class="container">
        <div class="title">SIGN UP</div>
        <div class="content">
            <form action="PharmacyRIG.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Patient ID</span>
                        <input type="text" name="PAT_ID" placeholder="Patient ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Doctor ID</span>
                        <input type="text" name="D_ID" placeholder="Doctor ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pharmacy ID</span>
                        <input type="text"  name="P_ID" placeholder="Pharmacy ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="MED_NAME1" placeholder="Enter Medicens" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="MED_NAME2" placeholder="Enter Medicens" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="MED_NAME3" placeholder="Enter Medicens" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input type="text" name="DOSAGE" placeholder="MORNING-NOON-NIGTH" required>
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
    $PAT_ID=$_POST['PAT_ID'];
    $D_ID=$_POST['D_ID'];
    $P_ID=$_POST['P_ID'];
    $MED_NAME1=$_POST['MED_NAME1'];
    $MED_NAME2=$_POST['MED_NAME2'];
    $MED_NAME3=$_POST['MED_NAME3'];
    $DOSAGE=$_POST['DOSAGE'];

    //Insertion Query [Main-QUERY] for table Pharmacy
    $insertquery="insert into prescription(PAT_NAME,D_ID,P_ID,MED_NAME1,DOSAGE) values('$PAT_NAME','$D_ID','$P_ID','$MED_NAME1','$DOSAGE')";
    $insertquery="insert into prescription(PAT_NAME,D_ID,P_ID,MED_NAME2,DOSAGE) values('$PAT_NAME','$D_ID','$P_ID','$MED_NAME2','$DOSAGE')";
    $insertquery="insert into prescription(PAT_NAME,D_ID,P_ID,MED_NAME3,DOSAGE) values('$PAT_NAME','$D_ID','$P_ID','$MED_NAME3','$DOSAGE')";

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