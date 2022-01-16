<?php 

include 'connection.php';
session_start();

if (!isset($_SESSION['PAT_NAME'])) {
    header("Location: PATlogin.php");
}
$patname=$_SESSION['PAT_NAME'];
$gemail="select * from patient where PAT_NAME='$patname' ";


$exec=mysqli_query($con,$gemail);


$fetch=mysqli_fetch_array($exec);



$_SESSION['email']=$fetch['email'];

$_SESSION['password']=$fetch['password'];
$_SESSION['patlocation']=$fetch['PAT_LOCATION'];



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/DoctorDisplay.css">
    <link rel="stylesheet" href="css/PATwelcome.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Audiowide"
    />
  </head>
  <body>
    <div class="navdiv">
      <nav class="navbar">
        <div class="logo">
          <span>
            <h1><a class="logoa" href="#">MED</a></h1>
          </span>
        </div>
        <div class="links">
          <ul class="ullists">
            <li id="pharid" class="linklist">
              <a class="link1" href="PharmacyDisplay.php">Pharmacy</a>
            </li>
            <li id="signid" class="linklist">
              <!-- <a class="link1" name="search" href="#">Prescriptions</a> -->
              <form action="" method="post">


                <input type="submit"  name="search" value="Prescription">
              </form>
            </li>
            <li>

            <a id="logout" href="PHlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
          </ul>
        </div>
      </nav>
<?php echo "<h3>Welcome " . $_SESSION['PAT_NAME'] . "</h3>"; ?>
<section>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>PATIENT ID</th>
                            <th>DOCTOR ID</th>
                            <th>MEDCINE1</th>
                            <th>DOSAGE1</th>
                            <th>MEDCINE2</th>
                            <th>DOSAGE2</th>
                            <th>MEDCINE3</th>
                            <th>DOSAGE3</th>
                            <th>PRESCIPTION DATE</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content2">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';
               $patn= $_SESSION['PAT_NAME'];

                $query1="select PAT_ID from patient where PAT_NAME='$patn' ";
                $select=mysqli_query($con, $query1);
                $arry=mysqli_fetch_array($select);

                $PAT_ID=$arry['PAT_ID'];
        
                if(isset($_POST['search']))
                {


                    include 'connection.php';
                    

                        if(isset($_POST['search']))
                        {    
                            $query="select * from prescription where PAT_ID='$PAT_ID' ";

                            $selectquery=mysqli_query($con,$query);

                            while($res=mysqli_fetch_array($selectquery))
                            {
                              ?>
                              <tr>
                                  <td> <?php  echo $res['PAT_ID'];  ?></td>
                                  <td> <?php  echo $res['D_ID'];  ?></td>
                                  <td> <?php  echo $res['M_NAME1'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE1'];  ?></td>
                                  <td> <?php  echo $res['M_NAME2'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE2'];  ?></td>
                                  <td> <?php  echo $res['M_NAME3'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE3'];  ?></td>
                                  <td> <?php  echo $res['PR_DATE'];  ?></td>
                              </tr>
                            <?php
                            }
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
    </section>
<form action="" method="post">
<section>
        <h1>DOCTORS</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>CLINIC</th>
                            <th>GENDER</th>
                            <th>PHONE</th>
                            <th>SELECT</th>
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
                $selectquery=" select  *  from  doctor " ; 
        
        
        
                //Executing the QUERY
                $query=mysqli_query($con,$selectquery);
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
             ?>
             <tr>
                 <td> <?php  echo $res['D_NAME'];  ?></td>
                 <td> <?php  echo $res['CLINIC'];  ?></td>
                 <td> <?php  echo $res['GENDER'];   ?></td>
                 <td> <?php  echo $res['PHONE'] ;  ?></td>
                 <td><a href="BookDOC.php?Did=<?php  echo $res['D_ID'];  ?>">BOOK</a></td>
             </tr>
           <?php
                }
                 ?>
            </tbody>
        </table>
    </div>
    </section>



  </form>
    
  </body>
</html>

