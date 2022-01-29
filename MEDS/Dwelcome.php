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
                <a class="suplist1" href="#">Medicens</a>
                
            </div>
        </li>
        <li class="dropdown">
            <a class="list1" target=_block href="PharmacyDisplay.php">Pharmacy</a>
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
                //Extracting Doctor name using current session
                $DOCname=$_SESSION['D_NAME'];

                //QUERY: selecting all the details of Doctor
                $Demail="select * from doctor where D_NAME='$DOCname' ";


                $exec=mysqli_query($con,$Demail);
                $fetch=mysqli_fetch_array($exec);

                //Info for other [login]
                $_SESSION['email']=$fetch['email'];
                $_SESSION['password']=$fetch['password'];
                $_SESSION['D_ID']=$fetch['D_ID'];


                $docID=$_SESSION['D_ID'];
                //QUER:Selecting all the Patient Details based on Doctor ID
                $selectquery=" select  *  from  patient where D_ID='$docID' " ; 
        
        
        
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
                 <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a target=_block href="PRsend.php">New</a></td>
             </tr>
           <?php
                }
                 ?>
            </tbody>
        </table>
    </div>
    </section>
  </body>
</html>

</body>
</html>

