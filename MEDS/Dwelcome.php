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
    <link rel="stylesheet" href="PRESC.css">
    <link rel="stylesheet" href="css/Dwelcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Doctor Interface</title>
</head>
<body>
    <div class="navdiv">
        <nav class="navbar">
            <div class="logo">
                <span>
                    <h1><a class="list1" href="medical.html">MED</a></h1>
          </span>
        </div>
        <div class="links">
          <ul class="unlist1">
              <li>
                  <div class="dropdiv">
                <a class="suplist1" href="#">Patients</a>
                
            </div>
        </li>
        <li class="dropdown">
            <a class="list1" href="prescription">Pharmacy</a>
        </li>
        <li>

            <a id="logout" href="Dlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
    </ul>
</div>
</nav>
</div>
<?php echo "<h3>Welcome " . $_SESSION['D_NAME'] . "</h3>"; ?>
    <section>
        <h2 style="color:#fff;">Appointments</h2>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>PATIENT ID</th>
                            <th>NAME</th>
                            <th>AGE</th>
                            <th>GENDER</th>
                            <th>LOCATION</th>
                            <th>PHONE</th>
                            <th>PRESCRIPTION</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';
        
        
        
                //Query to select the Entire table [MAIN QUERY]
                $selectquery=" select  *  from  patient " ; 
        
        
        
                //Executing the QUERY
                $query=mysqli_query($con,$selectquery);
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
             ?>
             <tr>
                 <td> <?php  echo $res['PAT_ID'];  ?></td>
                 <td> <?php  echo $res['PAT_NAME'];  ?></td>
                 <td> <?php  echo $res['AGE'];  ?></td>
                 <td> <?php  echo $res['GENDER'];  ?></td>
                 <td> <?php  echo $res['PAT_LOCATION'];  ?></td>
                 <td> <?php  echo $res['PHONE'] ;  ?></td>
                 <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#prescription">New</a></td>
             </tr>
           <?php
                }
                 ?>
            </tbody>
        </table>
    </div>
    </section>
    <div class="left">
        <h3>PRESCRIPTION</h3>
        <p>Write and send it to pharamcy in one click!!</p>
        </div>
    <div id="prescription" class="container">
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