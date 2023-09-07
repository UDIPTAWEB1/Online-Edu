<?php include('connect.php');?>
<?php include('u_session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.js" ></script>
<script type="text/javascript" src="js/jquery.validate.js" ></script>

<style type="text/css">
.btn{
width:115px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
padding:1px;
font-weight:bold;
background-color:#A8A8A8;
box-shadow:5px 5px 5px #777777;
}
#frm1{
width:auto;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
padding:2px;
}
label.error{
		width:auto;
		height:auto;
		font-family:Arial, Helvetica, sans-serif;
		font-weight:bold;
		font-size:12px;
		background:#900;
		color:#FFF;
		border-radius:5px;
		padding:3px;
		margin-left:5px;
		position:relative;
	}
</style>
<script type="text/javascript">
$(document).ready(function(e) {
    $.validator.addMethod("lettersOnly",function (value,element){
  return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
  },"Please enter letters only.");
  $.validator.addMethod("phone",function (value,element){
  return this.optional(element) || /^\d{10}$/i.test(value);
  },"10 digit mobile number only.");
 
 $("#frm").validate({
	 rules:{
		 fname:{
			 required:true,
			 lettersOnly:true,
			 maxlength:35,
			 minlength:3
		 },
		 mname:{
			 
			 lettersOnly:true,
			 maxlength:20,
			 minlength:3
		 },
		 lname:{
			 required:true,
			 lettersOnly:true,
			 maxlength:35,
			 minlength:3
		 },
		 email:{
			 required:true,
			email:true
	 },
	dob:{
		required:true
	},
	gnd:{
		required:true,
	    minlength:1
	 },
	 squestion:{
		 required:true
	 },
	 ans:{
		 required:true
	 },
	 },
	 messages:{
	 }
	 });
});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header1">
    <div id="site_title1">
    <h1><a href="#"> <img src="images/edu.png" alt="" /></a></h1>
    </div>
    <div style="width:450px; float:right; text-align:right; margin-top:50px">
    	<h2>Welcome <?php echo $_SESSION['u_info']['fname'];?></h2>
    </div>
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
  <div id="menu">
    <ul>
      <li><a href="user_acc.php">Home</a></li>
      <li><a href="user_upload.php">Upload</a></li>
      <li><a href="user_search.php">Search</a></li>
      <li><a href="user_profile.php" class="current">Profile</a></li>
      <li><a href="user_pwd.php">Passsword</a></li>
      <li><a href="logout_code.php">Logout</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">Your Profile</h2>
      <p>&nbsp;</p>
	  <!--<img border="0" src="images/pro1.jpg" alt="profile_pic" width="255" height="198" />-->
	  <form name="frm" action="profile_edit_code.php" method="post" id="frm">
	   <?php
	   $sql="SELECT * FROM `user` WHERE `uid`='".$_SESSION['u_info']['uid']."'";
	   $urs=mysqli_query($con,$sql);
	   $urow=mysqli_fetch_array($urs);
	   ?>
       <form action="registert_code.php" method="post"  >
	  <table cellpadding="5" cellspacing="5" style="margin:0 auto">
	  <tr>
	  <td style="width:200px">First Name</td>
	  <td style="width:450px"><input type="text" name="fname"  id="fname" placeholder="First Name" required="required" class="text" value="<?php echo $urow['fname']; ?>" /></td>
	  <tr>
	  <td>Middle Name</td>
	  <td><input type="text" name="mname" id="mname" placeholder="Middle Name"  class="text" value="<?php echo $urow['mname']; ?>" /></td>
	  </tr>
	  <tr>
	  <td>Last Name</td>
	  <td><input type="text" name="lname" id="lname" placeholder="Last Name" required="required" class="text" value="<?php echo $urow['lname']; ?>" /></td>
	  </tr>
	  </tr>
	  <tr>
	  <td>Email</td>
	  <td><input type="email" name="email" id="email" placeholder="Email" required="required" value="<?php echo $urow['email']; ?>" readonly="readonly"  /></td>
	  </tr>
	  <tr>
	  <td>Date of Birth</td>
	  <td>
	  		<input type="text" name="dob"  id="dob" placeholder="Date of Birth" required="required" value="<?php echo $urow['dob']; ?>" />
	  </td>
	  </tr>
      <tr><td>Gender</td>
      		<td><input type="radio" name="gender" value="Male"
            <?php
				if($urow['gender']=='Male')
				{
					?> checked="checked" 
					<?php 
				} ?> />Male
            	<input type="radio" name="gender" value="Female"
				<?php
                if($urow['gender']=='Female')
				{
					 ?> checked="checked"
					 <?php
				} ?> />Female
                </td>
      </tr>
	  <tr>
	  <td>Security Question</td>
	  <td>
	  <select name="squestion" >
	  <option selected="<?php echo $urow['squestion']; ?>"><?php echo $urow['squestion']; ?></option>
	  
	  </select>
	  </td>
	  <tr>
	  <td>Your Answer</td>
	  <td><input type="text" name="ans" class="text" required="required" value="<?php echo $urow['ans']; ?>" />
	  </td>
	  </tr>
	  <tr>
	  <td>&nbsp;
	  </td><td><input type="hidden" name="uid" value="<?php echo $urow['uid']; ?>" /><input type="submit" name="ok" value="Save Changes" class="btn"  />
	  </td>
	  </tr>
      <tr>
      <td>
      <?php
   		if(isset($_GET['msg']))
		{
			echo "<center>"."<font color='green' style='text-align:center'>".$_GET['msg']."</font>"."</center>";
		}
		else
			{
				if(isset($_GET['err']))
				{
					echo "<center>"."<font color='red' style='text-align:center'>".$_GET['err']."</font>"."</center>";
				}
			}
	?>
      </td>
      <td>&nbsp;</td>
      </tr>
	  </table>
	  </form>
	  
	  
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
   </div>
  <!-- end of content -->
  
    <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
    <div id="footer">
      Copyright &copy; 2021 <a href="index.php">Online Education</a>
    </div>
</div>
</body>
</html>
