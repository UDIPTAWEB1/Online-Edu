<?php
session_start();
ob_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"online_edu");
?>
