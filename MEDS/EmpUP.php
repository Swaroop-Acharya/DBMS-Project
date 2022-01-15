<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Update</title>
    <link rel="stylesheet" href="css/EmployeeADD.css" class="css">
</head>

<body>
    <div class="left">
        <h1>UPDATE</h1>
        <h1>EMPLOYEE DETAILS</h1>
        <p>Lets bulid an Medic Army</p>
        </div>
    <div class="container">
        <div class="title">HIRE</div>
        <div class="content">
            <form action="" method="post">

                <?php
                    //Connecting to our DATA base[needmeds]
                    include 'connection.php' ;

                        //Getting id of the selected tuple
                        $ids=$_GET['id'];
                        
                        //Query for selecting Employee information corresponding to Employee ID
                        $showquery="select * from employee  where E_ID='$ids' ";
                        
                        //Executing the QUERY
                        $showdata =mysqli_query($con,$showquery);
                        
                        //Selected tuple is in array form to fetch we use this
                        $arraydata=mysqli_fetch_array($showdata);


                    //After clicking Submit button the following will be EXECUTED
                    if(isset($_POST['submit']))
                    {
                        $EidUpdate=$_GET['id'];

                        //Asigning Variables[php Variables] to the Table variables
                        $E_NAME=$_POST['E_NAME'];
                        $GENDER=$_POST['GENDER'];
                        $PHONE=$_POST['PHONE'];
                        $SALARY=$_POST['SALARY'];
                        $P_ID=$_POST['P_ID'];


                        //Update Query to update the employees information
                        $query="update employee
                                set  E_NAME='$E_NAME',GENDER='$GENDER',PHONE='$PHONE',SALARY='$SALARY',P_ID='$P_ID'
                                where E_ID='$EidUpdate' ";

                        //Executing the Query
                    $res= mysqli_query($con,$query);

                        //Checking if it is Successful
                    if($res){
                        ?>
                        <script>
                            alert("Data updated succesfully");
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert("Woops!! ,Data not updated properly");
                        </script>
                        <?php
                    }   
                    }
                    ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name=" E_NAME"  value=" <?php  echo $arraydata['E_NAME'];   ?> " placeholder="Enter employee ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <input type="text" name="GENDER"  value=" <?php  echo $arraydata['GENDER'];   ?> " placeholder="Enter employee Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="PHONE"  value=" <?php  echo $arraydata['PHONE'];   ?> " placeholder="Enter employee Phone Number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">SALARY</span>
                        <input type="text"  name="SALARY"   value=" <?php  echo $arraydata['SALARY'];   ?> " placeholder="Salary" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pharmacy ID</span>
                        <input type="text" name="P_ID"  value=" <?php  echo $arraydata['P_ID'];   ?> " placeholder="Pharmacy ID" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="UPDATE">
                </div>
            </form>
        </div>
    </div>

</body>

</html>


