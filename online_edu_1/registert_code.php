<?php include('connect.php');?>
<?php
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$dob=$_POST['dob'];
$squestion=$_POST['squestion'];
$ans=$_POST['ans'];
$ph=$_POST['ph'];
$sql="INSERT INTO `user`(`fname`,`mname`,`lname`,`email`,`pwd`,`dob`,`squestion`,`ans`,`ph`)
VALUES('$fname','$mname','$lname','$email','$pwd','$dob','$squestion','$ans','$ph')"; 
$res=mysqli_query($con,$sql)or die(mysqli_error($con));
if($res==1)
{
  header('location:register.php?msg=Regiatration is successfull');
  exit;
}
else
{
  header('location:register.php?err=Registration is unsuccessfull');
  exit;
}

?>
