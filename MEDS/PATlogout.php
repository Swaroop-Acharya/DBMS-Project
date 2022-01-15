<?php

session_start();
session_destroy();

header("Location:PATlogin.php");

?>