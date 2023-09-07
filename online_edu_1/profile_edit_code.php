<?php include('connect.php');?>
<?php include('u_session.php'); ?>
<?php
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$squestion=$_POST['squestion'];
$ans=$_POST['ans'];
$upd="UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`dob`='$dob',`gender`='$gender', `squestion`='$squestion',`ans`='$ans' WHERE `uid`='".$_SESSION['u_info']['uid']."' ";
$res=mysqli_query($con,$upd);
if($res==1)
{
 header('location:user_profile.php?msg=Records Updated Successfuly');
 exit;
}
else
{
 header('location:user_profile.php?err=Records Are Not Updated');
 exit;
}
?>
