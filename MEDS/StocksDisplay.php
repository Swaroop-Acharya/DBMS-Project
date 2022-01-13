<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- TARSH and EDIT icon pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="css/StocksDisplay.css">
</head>
<body>
    <section>
        <h1>STOCKS</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>PHARMACY ID</th>
                            <th>STOCK ID</th>
                            <th>M_ID</th>
                            <th>MED_NAME</th>
                            <th>QUATITY</th>
                            <th>BASE PRICE</th>
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
        
                 <td> <?php  echo $res['P_ID'];   ?></td>
                 <td> <?php  echo $res['S_ID'];   ?></td>
                 <td> <?php  echo $res['M_ID'];   ?></td>
                 <td> <?php  echo $res['MED_NAME'];  ?></td>
                 <td> <?php  echo $res['QUANTITY'];  ?></td>
                 <td> <?php  echo $res['BASE_PRICE'];   ?></td>
                 <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-edit" aria-hidden="true"></i><span>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><i class="fa fa-trash" aria-hidden="true"></i></td>
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