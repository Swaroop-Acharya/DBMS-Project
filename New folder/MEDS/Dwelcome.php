<?php 


session_start();

if (!isset($_SESSION['D_NAME'])) {
    header("Location: Dlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PRsend.css">
    <link rel="stylesheet" href="css/Dwelcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Doctor Interface</title>
</head>
<body>
    <div class="navdiv">
        <nav class="navbar">
            <div class="logo">
                <span>
                    <h1><a class="list1" href="Home.php">MED</a></h1>
          </span>
        </div>
        <div class="links">
          <ul class="unlist1">
              <li>
                  <div class="dropdiv">
                <a class="suplist1" href="#">Medicens</a>
                
            </div>
        </li>
        <li class="dropdown">
            <a class="list1"  href="PharmacyDisplay.php">Pharmacy</a>
        </li>
        <li>

            <a id="logout" href="Dlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
    </ul>
</div>
</nav>
</div>
<?php echo "<h3>Welcome " . $_SESSION['D_NAME'] . "</h3>"; ?>
<?php
        include 'connection.php';

        $condition="select * from doctor";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);

        $D_ID=$result['D_ID'];

        $name= $_SESSION['D_NAME'];

 

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  doctor where D_NAME='$name' " ; 



        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);



        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
        ?>
           
            <?php  echo "<h4>Your ID is  " . $res['D_ID'] . "</h4>";  ?>
            <?php
            $clin="select CLINIC from doctor ";
            $EXE=mysqli_query($con,$clin);
            $re=mysqli_fetch_array($EXE);
            echo "<h4>CLINIC: " . $res['CLINIC'] . "</h4>";  
            
            ?>
        <?php
        }
        ?>
        <div id="prescription" class="container">
        <div class="title">PRESCRIPTION</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details"></span>
                        <input class="ininput" type="number" name="PAT_ID" placeholder="Enter Patient ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details"></span>
                        <input class="ininput" type="text" name="M_NAME1" placeholder="Enter Medicine1" required>
                    </div>
                    <div class="input-box">
                        <span class="details"></span>
                        <input class="ininput" type="text" name="DOSAGE1" placeholder="Dosage:MORNING-NOON-NIGTH" required>
                    </div>
                    <div class="input-box">
                        <span class="details"> </span>
                        <input class="ininput" type="text" name="M_NAME2" placeholder="Enter Medicen2">
                    </div>
                    <div class="input-box">
                        <span class="details"></span>
                        <input class="ininput" type="text" name="DOSAGE2" placeholder="Dosage:MORNING-NOON-NIGTH" >
                    </div>
                    <div class="input-box">
                        <span class="details"> </span>
                        <input class="ininput" type="text" name="M_NAME3" placeholder="Enter Medicen3" >
                    </div>
                    <div class="input-box">
                        <span class="details"></span>
                        <input class="ininput" type="text" name="DOSAGE3" placeholder="Dosage:MORNING-NOON-NIGTH" >
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
// $query="select P_ID from patient ";

// $launch=mysqli_query($con,$query);
// $launch=mysqli_query($con,$query); $launch=mysqli_query($con,$query); $launch=mysqli_query($con,$query);
// //Storing the Pharmacy ID
// $P_ID=$res['P_ID'];

// echo $P_ID;

// $query="select P_ID from patient where PAT_ID='30' ";
//     $launch=mysqli_query($con,$query);
//     $ress=mysqli_fetch_array($launch);
//     $P_ID=$ress['P_ID'];

//     echo $P_ID;


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

    $query="select P_ID from patient where PAT_ID='$PAT_ID' ";
    $launch=mysqli_query($con,$query);
    $ress=mysqli_fetch_array($launch);
    $P_ID=$ress['P_ID'];

//Insertion Query [Main-QUERY] for table Pharmacy
   $insertquery1="insert into prescription(D_ID,PAT_ID,M_NAME1,DOSAGE1,M_NAME2,DOSAGE2,M_NAME3,DOSAGE3,P_ID) values('$D_ID','$PAT_ID','$M_NAME1','$DOSAGE1','$M_NAME2','$DOSAGE2','$M_NAME3','$DOSAGE3','$P_ID')";

 //Executing the Query
   $res1= mysqli_query($con,$insertquery1);


    $query1="update patient
    set  D_ID= '$D_ID'
    where PAT_ID='$PAT_ID' ";

    $execute1=mysqli_query($con,$query1);





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

