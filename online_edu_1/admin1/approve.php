<?php
require('connect.php');
$did=$_GET['did'];
$upd="UPDATE `approve` SET `status`='Y' WHERE `did`=$did";
$res=mysqli_query($con,$upd)or die(mysqli_error($con));
if($res==1){
	$sql="INSERT INTO `download` (`did`,`nofd`) VALUES ($did,'0')";
	$res1=mysqli_query($con,$sql)or die(mysqli_error($con));
	if($res1){
		header('location:approve_document.php?msg=Document Approveed');
		exit;
	}
	else{
		header('location:new_upload.php?msg=Document not approve');
		exit;
	}
}else{
	header('location:new_upload.php?msg=Document not approve');
	exit;
}
?>