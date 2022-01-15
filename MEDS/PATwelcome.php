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
    </div>


      <div class="appoint">
        <h2>Schedule an Appointment now</h2>

        <a href="Appointment.php? id=<?php    echo $_SESSION['PAT_NAME'];   ?>"> <input class="buttton" type="button" value="Shedule"></a>
      <div class="appdiv">
        <h1>Get Medicines now</h1>
        <input type="text"  class="search1" placeholder="Search Medicines" name="M_NAME" id="">
        <input type="submit"  name="search" value="Search">
      </div>

    </div>
  </form>
    <section>
        <h1>PHARMACY</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>LOCATION</th>
                            <th>PHONE</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';
        
                if(isset($_POST['search']))
                {
                    //Asigning Variables[php Variables] to the Table variables
                    $M_NAME=$_POST['M_NAME'];



                    //Insertion Query [Main-QUERY] for Doctor
                      $search="select * from stocks where M_NAME='$M_NAME'  ";

                      $squery=mysqli_query($con,$search);

               
                      $result=mysqli_fetch_array($squery);

                
                      $P_ID=$result['P_ID'];
                    
                       // Query to select the Entire table [MAIN QUERY]
                       $selectquery=" select  * from pharmacy where P_ID= $P_ID " ; 



                      //Executing the Query
                        $query= mysqli_query($con,$selectquery);
        
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
                  ?>
                  <tr>
                      <td> <?php  echo $res['P_NAME'];  ?></td>
                      <td> <?php  echo $res['P_LOCATION'];  ?></td>
                      <td> <?php  echo $res['PHONE'];  ?></td>
                      <td> <?php  echo $res['email'];  ?></td>
                  </tr>
                <?php
                }
              }
                 ?>
            </tbody>
        </table>
    </div>
    </section>
  </body>
</html>
