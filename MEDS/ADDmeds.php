
<?php

//Connecting to our DATA base[needmeds]
include 'connection.php' ;

//After clicking Submit button the following will be EXECUTED
if(isset($_POST['submit']))
{
    //Asigning Variables[php Variables] to the Table variables
    $P_ID=$_POST['P_ID'];
    $S_ID=$_POST['S_ID'];
    $M_ID=$_POST['M_ID'];
    $M_NAME=$_POST['M_NAME'];
    $QUANTITY=$_POST['QUANTITY'];
    $BASE_PRICE=$_POST['BASE_PRICE'];

    //Insertion Query [Main-QUERY] for table Stock
    $insertquery="insert into stocks(P_ID, S_ID, M_ID,M_NAME,QUANTITY,BASE_PRICE) values('$P_ID','$S_ID','$M_ID','$M_NAME','$QUANTITY','$BASE_PRICE')";

    //Executing the Query
   $res= mysqli_query($con,$insertquery);

    //Checking if it is Successful
   if($res){
       ?>
       <script>
           alert("Medicine added to stock Sucessfully");
       </script>
       <?php
   }else{
    ?>
       <script>
           alert("Woops! ,Something went wrong");
       </script>
       <?php
   }   
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD MEDS</title>
    <link rel="stylesheet" href="css/EmployeeADD.css" class="css">
</head>

<body>
    <div class="left">
        <h1>ADD</h1>
        <h1>MEDCINES</h1>
        <p>Keep it coming......</p>
        </div>
    <div class="container">
        <div class="title">ADD</div>
        <div class="content">
            <form action="ADDmeds.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Pharmacy ID</span>
                        <input type="text" name="P_ID" placeholder="Pharmacy ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Stock ID</span>
                        <input type="text" name="S_ID" placeholder="Stock ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medicine ID</span>
                        <input type="text" name="M_ID" placeholder="Enter the medcine serial no" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medcine Name</span>
                        <input type="text" name="M_NAME" placeholder="Enter medicine name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantity</span>
                        <input type="text"  name="QUANTITY" placeholder="Quantity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Base Price</span>
                        <input type="text" name="BASE_PRICE" placeholder="Enter the base price" required>
                    </div>
                </div>
             
                <div class="button">
                    <input type="submit" name="submit" value="ADD TO STOCK">
                </div>
            </form>
        </div>
    </div>

</body>

</html>