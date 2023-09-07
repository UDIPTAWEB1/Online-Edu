<?php include('connect.php');?>
<?php
 
$email=$_POST['email'];
$pwd=$_POST['pwd'];

$sql="SELECT * FROM `user` WHERE `email`='$email' AND `pwd`='$pwd'";
$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res))
{
 $rec=mysqli_fetch_array($res);
 $_SESSION['u_info']=$rec;	
 header('location:user_acc.php?status=Sucessfully loging......');
 exit;
}
else
{
 header('location:login.php?err=Invalid email or password');
 exit;
}

?>

