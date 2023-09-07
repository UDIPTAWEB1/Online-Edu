<?php include('function.php');?>
<!-- <?php include('u_session.php'); ?> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<style type="text/css">
.chng
{
width:300px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:18px;
text-align:justify;
}
.btn
{
width:165px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
padding:3px;
font-size:18px;
background-color:#87AEF8;
border-radius:15px 15px 15px 15px;
-mez-border-radius:15px 15px 15px 15px;
-webkit-border-radius:15px 15px 15px 15px;
}
.btn:hover
{
cursor:pointer;
color:#CC0000;
}
.txt
{
width:200px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:24px;
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
$(document).ready(function(){
	$("#pwd").validate({
		rules:{
			oldpwd:{
				required:true,
				minlength:3,
				maxlength:15
			},
			newpwd:{
				required:true,
				minlength:3,
				maxlength:15
			},
			pwd1:{
				required:true,
				minlength:6,
				maxlength:15,
				equalTo: "#newpwd"			
			}
		},
		message:{
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
      <li><a href="user_profile.php">Profile</a></li>
      <li><a href="user_pwd.php" class="current">Passsword</a></li>
      <li><a href="logout_code.php">Logout</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">Change Password</h2>
	  <form name="pwd" id="pwd" action="user_pwdcode.php"  method="post">
	  <table cellpadding="5" cellspacing="5" style="margin:0 auto">
	  <tr>
	  <td>Old Password:</td>
	  <td style="width:450px;"><input  type="password" name="oldpwd" id="oldpwd" class="text" /></td>
	  </tr>
	  <tr>
	  <td>New Password:</td>
	  <td style="width:300px;"><input  type="password" name="newpwd" id="newpwd" class="text"  /></td>
	  </tr>
	  <tr>
	  <td>Confirm Password:</td>
	  <td style="width:300px;"><input type="password" name="pwd1" id="pwd1" class="text"  /></td>
	  </tr>
	  <tr>
	  <td></td><td><input type="submit" name="ok" value="Change Password" class="btn" /></td>
	  </tr>
	  </table>
	  </form>
	  <?php
			if(isset($_GET['msg']))
			{
				echo "<center>"."<font color='green'>".$_GET['msg']."</font>"."</center>";
			}
			else
				{
					if(isset($_GET['err']))
					{			
						echo "<center>"."<font color='red'>".$_GET['err']."</font>"."</center>";
					}
				}
	?>
	  
      <p>&nbsp;</p>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
   </div>
  <!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
    <div id="footer">
      Copyright &copy; 2017 <a href="index.php">Online Edu</a> 
    </div>
</div>
</body>
</html>
