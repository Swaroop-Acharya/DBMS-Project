<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PRsend.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Send Prescription</title>

</head>
<body>
    <h1>Send Prescription to Pharmacy</h1>
    <div id="prescription" class="container">
        <div class="title">PRESCRIPTION</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"> Patient ID</span>
                        <input class="ininput" type="text" name="PAT_ID" placeholder="Patient ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input class="ininput" type="text" name="M_NAME1" placeholder="Enter Medicine1" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input class="ininput" type="text" name="DOSAGE1" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input class="ininput" type="text" name="M_NAME2" placeholder="Enter Medicen2" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input class="ininput" type="text" name="DOSAGE2" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input class="ininput" type="text" name="M_NAME3" placeholder="Enter Medicen3" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Dosage</span>
                        <input class="ininput" type="text" name="DOSAGE3" placeholder="MORNING-NOON-NIGTH" required>
                    </div>
                </div>
             
                <div class="button">
                    <input class="ininput2" type="submit" name="submit" value="SEND">
                </div>
            </form>
        </div>
    </div>
</body>
</html>




                                            <!-- PHP SCRIPT  -->
             <?php

                    //Using current session 
                    session_start();
                     
                    //Connecting to our DATA base[needmeds]
                    include 'connection.php' ;

                    //Using the current session fetching the Doctor ID 
                    $DOCname=$_SESSION['D_NAME'];

                    //Query 
                    $Demail="select * from doctor where D_NAME='$DOCname' ";

                    $exec=mysqli_query($con,$Demail);
                    $fetch=mysqli_fetch_array($exec);
                    $_SESSION['D_ID']=$fetch['D_ID'];

                    //Doctor ID who issues presciption for his patient
                    $D_ID=$_SESSION['D_ID'];


                    //[QUERY] Fetching the Pharmacy ID of the patient (Which is already given to the patient)
                    $query="select P_ID from patient where D_ID=$D_ID ";

                    $launch=mysqli_query($con,$query);
                    $res=mysqli_fetch_array($launch);
                    //Storing the Pharmacy ID
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
                            alert("Prescription sent to pharmacy successfully");
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert("Oops! something went wrong");
                        </script>
                        <?php
                    }   
                    }
        ?>