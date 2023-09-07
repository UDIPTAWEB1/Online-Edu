<?php include('connect.php');?>
<?php include('u_session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
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
      <li><a href="user_acc.php" class="current">Home</a></li>
      <li><a href="user_upload.php">Upload</a></li>
      <li><a href="user_search.php">Search</a></li>
      <li><a href="user_profile.php">Profile</a></li>
      <li><a href="user_pwd.php">Passsword</a></li>
      <li><a href="logout_code.php">Logout</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">Welcome to Education</h2>
       <p>&nbsp;</p>
	   <!--<form name="frm">
	   <table>
	   <tr>
	   <td>
	   
	   </td>
	   </tr>
	   </table>
	   </form>-->
	   <form name="frm" >
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
	</form>
      <div class="cleaner_h20"></div>
      <div class="image_fl"> <img src="images/images01.jpg" alt="" /> </div>
      <div class="section_w250 float_r">
        <ul class="list_01">
         <li>Online Education is simple </li>
          <li>Online Education is fast </li>
          <li>Online Education is effective </li>
          <li>Online Education is great </li>
          <li>So let's Start with it</li>
        </ul>
      </div>
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
