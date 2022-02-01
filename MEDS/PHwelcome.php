<?php 

session_start();

if (!isset($_SESSION['P_NAME'])) {
    header("Location: PHlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PHwelcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Pharmacy Interface</title>
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
                <a class="suplist1" href="#">EMPLOYEES</a>
                <div class="hidlist">
                    <ul class="unlist">
                        <li>
                            <button><a class="list2" target=_block href="EMPA.php">ADD EMPLOYEE</a></button>
                        </li>
                        <li>
                            <button><a class="list2"  target=_block href="EmployeeDisplay.php">List</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a class="list1" target=_block  href="ADDmeds.php">ADD MEDCINE</a>
        </li>
        <form action="" method="post">

        
            <li class="dropdown">
                <a class="list1" target=_block href="PHdocD.php">DOCTORS</a>
            </li>
        </form>
        <li>

            <a id="logout" href="PHlogout.php">Logout &nbsp&nbsp&nbsp<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
    </ul>
</div>
</nav>
</div>
<?php echo "<h3>Welcome " . $_SESSION['P_NAME'] . "</h3>"; ?> 
<form action="#" method="post">
    <input class="psubmit " style="float:right;" type="submit"  name="search" value="Search">
    <input class="psearch " style="float:right;" type="text"  class="search1" placeholder="Enter Patient ID" name="PAT_ID" id="">
    <p class="ppara" style="float:right;  ">Search Prescription</p>
</form>

<?php
        include 'connection.php';

        $condition="select * from pharmacy";
        
        $conquery=mysqli_query($con,$condition);

        $result=mysqli_fetch_array($conquery);

        $P_ID=$result['P_ID'];

        $name= $_SESSION['P_NAME'];

        //Query to select the Entire table [MAIN QUERY]
        $selectquery=" select  *  from  pharmacy where P_NAME='$name' " ; 



        //Executing the QUERY
        $query=mysqli_query($con,$selectquery);



        //Iterating through Entire table using while loop
        //Using MYSQLI Fetch fuction to show that table
        while($res=mysqli_fetch_array($query))
        {
        ?>
            <?php  echo "<h4>Your Pharmacy ID : " . $res['P_ID'] . "</h4>";   ?>
            <?php  echo "<h4>Your Stock ID:S " . $res['P_ID'] . "</h4>";   ?>
            <form action="" method="post">
               <a href="PHdelete.php?pid=<?php echo  $res['P_ID'] ?>"> <input class="dela" type="button" value="Delete Account"></a>
            </form>
        <?php
        }
        ?>
    <section>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>PATIENT ID</th>
                            <th>DOCTOR ID</th>
                            <th>MEDCINE1</th>
                            <th>MEDCINE2</th>
                            <th>MEDCINE3</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content2">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';


                $phname= $_SESSION['P_NAME'];


                $query1="select P_ID from pharmacy where P_NAME='$phname' ";

                $squery=mysqli_query($con, $query1);


                $res=mysqli_fetch_array($squery);


                $P_ID=$res['P_ID'];


        
                if(isset($_POST['search']))
                {


                    include 'connection.php';

                        if(isset($_POST['search']))
                        {
                            $PAT_ID=$_POST['PAT_ID'];
                            
                            $query="select PR_ID ,PAT_ID,D_ID,M_NAME1,M_NAME2,M_NAME3 from prescription where PAT_ID='$PAT_ID' and P_ID='$P_ID'  ";

                            $selectquery=mysqli_query($con,$query);

                            while($res=mysqli_fetch_array($selectquery))
                            {
                              ?>
                              <tr>
                                  <td> <?php  echo $res['PAT_ID'];  ?></td>
                                  <td> <?php  echo $res['D_ID'];  ?></td>
                                  <td> <?php  echo $res['M_NAME1'];  ?></td>
                                  <td> <?php  echo $res['M_NAME2'];  ?></td>
                                  <td> <?php  echo $res['M_NAME3'];  ?></td>
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
 <section>
        <h2 style="color:#fff; margin-top:2px; text-align:center">CURRENT STOCK</h2>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>MEDCINE ID</th>
                            <th>MEDCINE NAME</th>
                            <th>QUANTITY</th>
                            <th>BASE PRICE</th>
                            <th>EDIT</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';
                
                $name= $_SESSION['P_NAME'];

                $condition="select * from pharmacy where P_NAME='$name'";
        
                $conquery=mysqli_query($con,$condition);

                $result=mysqli_fetch_array($conquery);

                $P_ID=$result['P_ID'];

                // Query to select the Entire table [MAIN QUERY]
                $selectquery=" select  *  from stocks where P_ID= $P_ID " ; 

        
                // $selectquery=" select B.M_ID , B.M_NAME, B.QUANTITY,B.BASE_PRICE
                // from pharmacy A , stocks B
                // where B.P_ID=A.P_ID and B.P_ID=$P_ID";
        
                //Executing the QUERY
                $query=mysqli_query($con,$selectquery);
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
             ?>
             <tr>
                 <td> <?php  echo $res['M_ID'];  ?></td>
                 <td> <?php  echo $res['M_NAME'];  ?></td>
                 <td> <?php  echo $res['QUANTITY'];  ?></td>
                 <td> <?php  echo $res['BASE_PRICE'] ;  ?></td>
                 <td> <a style="color:#00ff00;" title="UPDATE" href="MedUP.php?mid=<?php  echo $res['M_ID'];  ?>"><i class="fa fa-edit" aria-hidden="true"></i></a><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> <a title="DELETE" style="color:red;" href="MedDEL.php?id=<?php  echo $res['M_ID'];  ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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