<?php
require('connect.php');
$did=$_GET['did'];
$upd="UPDATE `approve` SET `status`='S' WHERE `did`=$did";
$res=mysqli_query($con,$upd)or die(mysqli_error($con));
if($res==1){
	header('location:suspended_document.php?msg=Document Suspended');
	exit;
	
}else{
	header('location:new_upload.php?msg=Document not approve');
	exit;
}
?>