<?php include('connect.php');?>
<?php
session_destroy();
header('location:index.php?msg=Successfully logout');
?>