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
    <link rel="stylesheet" href="css/PATwelcome.css" />
    <link href="doctor/connection.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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
              <a class="link1" href="PharmacyDisplay.php">Pharmacies</a>
            </li>
            <li id="signid" class="linklist">
              <a class="link1"  href="DoctorDisplay.php">Doctors</a>
            </li>
            <li>

            <a id="logout" href="PHlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
      
      </ul>
    </div>
        </div>
      </nav>
      <?php echo "<h3>Welcome " . $_SESSION['PAT_NAME'] . "</h3>";
      
      ?>
      <?php
        include 'connection.php';

        $condition="select * from patient";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);

        $P_ID=$result['PAT_ID'];

        $name= $_SESSION['PAT_NAME'];

 

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  patient where PAT_NAME='$name' " ; 



        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);



        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
        ?>
           
            <?php  echo "<h4>Your ID is  " . $res['PAT_ID'] . "</h4>"; 
          $res['PAT_ID'];
            
            
            ?>
        <?php
        }
        ?>
<form action="" method="post">


               <p>Please click refresh button to see your presciption <input type="submit" class="pr"  name="search" value="Refresh">
              </form>
              <h4>Please visit your respective pharmacy to collect your medicines</h4>
<section>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                      <tr>
                          <th>PR DATE</th>
                            <th>DOCTOR NAME</th>
                            <th>PHARMACY</th>
                            <th>MEDCINE</th>
                            <th>DOSAGE</th>
                            <th>MEDCINE</th>
                            <th>DOSAGE</th>
                            <th>MEDCINE</th>
                            <th>DOSAGE</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content2">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                $PR_ID="";
        
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
                            $query="select a.* ,b.D_NAME ,c.P_NAME 
                                    from prescription a ,doctor b,pharmacy c 
                                    where PAT_ID='$PAT_ID' and a.D_ID=b.D_ID  and a.P_ID=c.P_ID";

                            $selectquery=mysqli_query($con,$query);

                            while($res=mysqli_fetch_array($selectquery))
                            {

          
                               
                              ?>
                              <tr>
                            
                                  <td> <?php  echo $res['PR_DATE'];  ?></td>
                                  <td> <?php  echo $res['D_NAME'];  ?></td>
                                  <td> <?php  echo $res['P_NAME'];  ?></td>
                                  <td> <?php  echo $res['M_NAME1'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE1'];  ?></td>
                                  <td> <?php  echo $res['M_NAME2'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE2'];  ?></td>
                                  <td> <?php  echo $res['M_NAME3'];  ?></td>
                                  <td> <?php  echo $res['DOSAGE3'];  ?></td>
                                 
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

    
  </body>
</html>

