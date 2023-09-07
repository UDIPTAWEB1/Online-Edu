<?php include('connect.php');?>
<?php
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$dd=$_POST['dd'];
$mm=$_POST['mm'];
$yy=$_POST['yy'];
$dob=$dd.'-'.$mm.'-'.$yy;
$ans=$_POST['ans'];

$sql="INSERT INTO `user`(`fname`,`mname`,`lname`,`email`,`pwd`,`dob`,`ans`)VALUES('$fname','$mname','$lname','$email','$pwd','$dob','$ans')"; 
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
if($res==1)
{
  header('location:user_profile.php?msg=Regiatration is successfull');
  exit;
}
else
{
  header('location:register.php?err=Registration unsuccessfull');
  exit;
}

?>
