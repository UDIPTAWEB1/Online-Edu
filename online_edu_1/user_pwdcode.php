<?php include('connect.php');?>
<?php include('u_session.php');?>
<?php
$oldpwd=$_POST['oldpwd'];
$newpwd=$_POST['newpwd'];
$src=mysqli_query($con,"SELECT * FROM `user` WHERE `pwd`='$oldpwd' AND `uid`='".$_SESSION['u_info']['uid']."'");
if(mysqli_num_rows($src))
{
$sql="UPDATE `user` SET `pwd`='$newpwd' WHERE `uid`='".$_SESSION['u_info']['uid']."'";
$res=mysqli_query($con,$sql) or die (mysqli_error($con));
if($res==1)
{
  header('location:user_pwd.php?msg=Password is successfuly updated');
  exit;
}
else
{
  header('location:user_pwd.php?err=Password is not updated');
  exit;
}
}
else
{
	header('location:user_pwd.php?err=Password does not matched');
  	exit;
}
?>
