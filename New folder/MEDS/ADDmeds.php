<?php
session_start();
include 'connection.php' ;
$P_NAME= $_SESSION['P_NAME'];
$quer="select P_ID from pharmacy where P_NAME='$P_NAME' ";

$ex=mysqli_query($con,$quer);
$arr=mysqli_fetch_array($ex);
$P_ID=$arr['P_ID'];
$S_ID="S" . $arr['P_ID'];
if(isset($_POST['submit']))
{
    $M_ID=$_POST['M_ID'];
    $M_NAME=$_POST['M_NAME'];
    $QUANTITY=$_POST['QUANTITY'];
    $BASE_PRICE=$_POST['BASE_PRICE'];
    $insertquery="insert into stocks(P_ID, S_ID, M_ID,M_NAME,QUANTITY,BASE_PRICE)
     values('$P_ID','$S_ID','$M_ID','$M_NAME','$QUANTITY','$BASE_PRICE')";
   $res= mysqli_query($con,$insertquery);
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
        <h1>ADD MEDCINES</h1>
           <h6>Keep it coming......</h6>
        </div>
    <div class="container">
        <div class="title">ADD</div>
        <div class="content">
            <form action="ADDmeds.php" method="post">
                <div class="user-details">

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
                        <input type="number" name="BASE_PRICE" placeholder="Enter the base price" required>
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