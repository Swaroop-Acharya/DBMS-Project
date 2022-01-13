<?php
$username="root";
$password="";
$server='localhost';
$db='needmeds';

$con = mysqli_connect($server,$username,$password,$db);

if($con)
{
    // echo "Connection successful";
    ?>

<script>

    alert('Connection Successful');
</script>
<?php

}
else 
{
   die("No Connection Established" . mysqli_connect_error());
}

?>