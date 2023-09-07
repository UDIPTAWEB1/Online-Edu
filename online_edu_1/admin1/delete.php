<?php require('function.php'); ?>
<?php
$obj=new Helper;
$data_array=array("table_name"=>"type");
$id=array("id"=>base64_decode($_GET['tid']));
array_push($data_array,$id);
$res=$obj->delete_rec($data_array);
//echo $res;
if($res==1){
	header('location:view_document.php?msg=Delete sucessfully');
	exit;
}else{
	header('location:view_document.php?err=Student has not been delete');
	exit;
}
?>