<?php

session_start();

// error_reporting(0);

include 'connection.php';

//OPERATION 1

//Selected Doctor ID
$id=$_GET['Did'];

//Extracting location of the patient using session
$patemail=$_SESSION['email'];
$patpassword=$_SESSION['password'];
$patlocation=$_SESSION['patlocation'];

//QUERY: updating doctor id in patient table[Initially it was null]
$query1="update patient
set  D_ID=$id
where email='$patemail' and password ='$patpassword' ";

$execute1=mysqli_query($con,$query1);
//




//OPERATION 2


// QUERY:Selecting Pharmacy ID for patient table by matching Pharmacy location with Patient Location
$query2="select P_ID,P_NAME from pharmacy where P_LOCATION='$patlocation' ";

$pex=mysqli_query($con,$query2);
$fetch=mysqli_fetch_array($pex);

//pharmacy ID
$P_ID=$fetch['P_ID'];

//QUERY: Updating the patient table[pharmacy ID]
$query3="update patient
set  P_ID=$P_ID
where email='$patemail' and password ='$patpassword'";

$execute2=mysqli_query($con,$query3);



if($execute1 && $execute2)
{

    ?>

<script>

    alert('Booked an appointment successfully');

    <?php
header('Location:PATwelcome.php');
?>

</script>

<?php

}
else 
{
   die("No Connection Established" . mysqli_connect_error());
}

?>