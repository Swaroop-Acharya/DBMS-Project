<?php 

session_start();

if (!isset($_SESSION['PAT_NAME'])) {
    header("Location: PATlogin.php");
}

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
              <a class="link1" href="#">Prescriptions</a>
            </li>
            <li>

            <a id="logout" href="PHlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
          </ul>
        </div>
      </nav>
<?php echo "<h3>Welcome " . $_SESSION['PAT_NAME'] . "</h3>"; ?>
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
