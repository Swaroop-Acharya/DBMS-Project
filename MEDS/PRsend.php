<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PRsend.css">
    <title>Document</title>
</head>
<body>
    <div id="prescription" class="container">
        <div class="title">PRESCRIPTION</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Patient ID</span>
                        <input type="text" name="PAT_ID" placeholder="Patient ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="M_NAME1" placeholder="Enter Medicine1" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input type="text" name="DOSAGE1" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="M_NAME2" placeholder="Enter Medicen2" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input type="text" name="DOSAGE2" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="M_NAME3" placeholder="Enter Medicen3" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input type="text" name="DOSAGE3" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="SEND">
                </div>
            </form>
        </div>
    </div>
</body>
</html>





<?php

//Connecting to our DATA base[needmeds]

                    session_start();
                    include 'connection.php' ;
                    $DOCname=$_SESSION['D_NAME'];
                    $Demail="select * from doctor where D_NAME='$DOCname' ";

                    $exec=mysqli_query($con,$Demail);

                    $fetch=mysqli_fetch_array($exec);

                    $_SESSION['D_ID']=$fetch['D_ID'];

                    $D_ID=$_SESSION['D_ID'];


                    $query="select P_ID from patient where D_ID=$D_ID ";

                    $launch=mysqli_query($con,$query);

                    $res=mysqli_fetch_array($launch);

                    $P_ID=$res['P_ID'];

                    //After clicking Submit button the following will be EXECUTED
                    if(isset($_POST['submit']))
                    {
                        //Asigning Variables[php Variables] to the Table variables
                        $D_ID=$_SESSION['D_ID'];
                        $PAT_ID=$_POST['PAT_ID'];
                        $M_NAME1=$_POST['M_NAME1'];
                        $DOSAGE1=$_POST['DOSAGE1'];
                        $M_NAME2=$_POST['M_NAME2'];
                        $DOSAGE2=$_POST['DOSAGE2'];
                        $M_NAME3=$_POST['M_NAME3'];
                        $DOSAGE3=$_POST['DOSAGE3'];
                        $P_ID=$res['P_ID'];

                        //Insertion Query [Main-QUERY] for table Pharmacy
                        $insertquery1="insert into prescription(D_ID,PAT_ID,M_NAME1,DOSAGE1,M_NAME2,DOSAGE2,M_NAME3,DOSAGE3,P_ID) values('$D_ID','$PAT_ID','$M_NAME1','$DOSAGE2','$M_NAME2','$DOSAGE2','$M_NAME1','$DOSAGE2','$P_ID')";

                        //Executing the Query
                    $res1= mysqli_query($con,$insertquery1);




                        //Checking if it is Successful
                    if($res1){
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