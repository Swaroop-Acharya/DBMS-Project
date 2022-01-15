
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medcines Update</title>
    <link rel="stylesheet" href="css/EmployeeADD.css" class="css">
</head>

<body>
    <div class="left">
        <h1>UPDATE</h1>
        <h1>MEDCINES DETAILS</h1>
        </div>
    <div class="container">
        <div class="title">ADD</div>
        <div class="content">
            <form action="" method="post">
            <?php
                    //Connecting to our DATA base[needmeds]
                    include 'connection.php' ;

                        //Getting id of the selected tuple
                        $ids=$_GET['mid'];
                        
                        //Query for selecting Employee information corresponding to Employee ID
                        $showquery="select * from stocks  where M_ID='$ids' ";
                        
                        //Executing the QUERY
                        $showdata =mysqli_query($con,$showquery);
                        
                        //Selected tuple is in array form to fetch we use this
                        $arraydata=mysqli_fetch_array($showdata);


                    //After clicking Submit button the following will be EXECUTED
                    if(isset($_POST['submit']))
                    {
                        $MidUpdate=$_GET['mid'];

                        //Asigning Variables[php Variables] to the Table variables
                        $M_ID=$_POST['M_ID'];
                        $M_NAME=$_POST['M_NAME'];
                        $QUANTITY=$_POST['QUANTITY'];
                        $BASE_PRICE=$_POST['BASE_PRICE'];


                        //Update Query to update the employees information
                        $query="update stocks
                                set  M_NAME='$M_NAME',QUANTITY='$QUANTITY',BASE_PRICE='$BASE_PRICE'
                                where M_ID='$MidUpdate' ";

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
                        <span class="details">Medicine ID</span>
                        <input type="text" name="M_ID" value=" <?php  echo $arraydata['M_ID'];   ?> " placeholder="Enter the medcine serial no" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="M_NAME" value=" <?php  echo $arraydata['M_NAME'];   ?> " placeholder="Enter medicine name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantity</span>
                        <input type="text"  name="QUANTITY" value=" <?php  echo $arraydata['QUANTITY'];   ?> " placeholder="Quantity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Base Price</span>
                        <input type="text" name="BASE_PRICE" value=" <?php  echo $arraydata['BASE_PRICE'];   ?> " placeholder="Enter the base price" required>
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