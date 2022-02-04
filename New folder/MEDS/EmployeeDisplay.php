<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- TARSH and EDIT icon pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="css/EmployeeDisplay.css">
</head>
<body>
    <section>
        <h1>STAFFs</h1><p></p>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>EMPLOYEE ID</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>PHONE</th>
                            <th>SALARY</th>
                            <th>OPERATION</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            session_start();
                include 'connection.php';


                
                $phname= $_SESSION['P_NAME'];


                $query1="select P_ID from pharmacy where P_NAME='$phname' ";

                $squery=mysqli_query($con, $query1);


                $res=mysqli_fetch_array($squery);


                $P_ID=$res['P_ID'];
        
        
        
                //Query to select the Entire table [MAIN QUERY]
                $selectquery=" select  *  from  employee  where P_ID='$P_ID' " ; 
        
        
        
                //Executing the QUERY
                $query=mysqli_query($con,$selectquery);
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
             ?>
             <tr>
        
                 <td> <?php  echo $res['E_ID'];   ?></td>
                 <td> <?php  echo $res['E_NAME'];  ?></td>
                 <td> <?php  echo $res['GENDER'];   ?></td>
                 <td> <?php  echo $res['PHONE'] ;  ?></td>
                 <td> <?php  echo $res['SALARY'];  ?></td>
                 <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <a style="color:#00ff00;" title="UPDATE" href="EmpUP.php?id=<?php  echo $res['E_ID'];   ?>"><i class="fa fa-edit" aria-hidden="true"></i></a><span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> <a title="DELETE" style="color:red;" href="EmpDEL.php?Did=<?php  echo $res['E_ID'];   ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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