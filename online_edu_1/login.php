<?php include('connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"  src="js/jquery-1.10.2.js"></script>
<script type="text/javascript"  src="js/bjqs-1.3.min.js"></script>
<script type="text/javascript"  src="js/bjqs-1.3.js"></script>
<link  rel="stylesheet"  type="text/css" href="css/bjqs.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<script class="secret-source">
        jQuery(document).ready(function($) {
          $('#banner-slide').bjqs({
            animtype      : 'fade',
            height        : 300,
            width         : 966,
            responsive    : true,
            randomstart   : true
          });
          
        });
</script>
<style type="text/css">
.body
{
margin:0;
padding:0;
}
.log
{
width:500px;
height:300px;
font-size:24px;
font-family:Arial, Helvetica, sans-serif;
border:1px solid #000000;
text-align:left;
margin:0 auto;
box-shadow:5px 5px 5px #777777;
border-radious:15px;
-moz-border-radius:15px;
-webkit-border-radius:15px;
}
.text
{
width:200px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:24px;
padding:3px;
text-align:center;
}
.btn
{
width:130px;
height:auto;
padding:3px;
font-family:Arial, Helvetica, sans-serif;
font-size:18px;
background-color:#599DE8;
border-radius:15px 15px 15px 15px;
-mez-border-radius:15px 15px 15px 15px;
-webkit-border-radius:15px 15px 15px 15px;
}
.btn:hover
{
cursor:pointer;
color:#0D3D77;
}
</style>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
  <div align="center" id="container">
	<div id="banner-slide">
       	<ul class="bjqs">
        	<li><img src="images/slid0.jpeg"/></li>
        	<li><img src="images/slide1.jpg"/></li>
            <li><img src="images/slide2.jpg"/></li>
            <li><img src="images/slide3.jpg"/></li>
            <li><img src="images/slide4.jpg"/></li>
            <!--<li><img src="images/slide5.jpg"/></li>-->
       </ul>             
    </div>
</div>
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
  <div id="menu">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">about</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="login.php" class="current">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">User Login</h2>
      <p>&nbsp;</p>
	  
	 <div class="log">
	  <form name="frm" action="login_code.php" method="post">
  <table cellpadding="15" cellspacing="15" >
   <tr>
    <td>Email ID</td>
	<td><input type="email" placeholder="Email ID" name="email" required="required" class="text" /></td>
	</tr>
	
	<tr>
	<td>Password</td>
	<td><input type="password" placeholder="Password" name="pwd" required="required" class="text" /></td>
	</tr>
	
	<tr>
	<td>&nbsp;</td><td colspan="5" style="text-align:center"><input type="submit" name="ok" value="Login"  class="btn"/></td>
   </tr>
  </table>
  </form>
  <p style="text-align:center; color:red;">
  <?php
	if(isset($_GET['err'])){
		echo $_GET['err'];
	}
  ?>
  </p>
 </div>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  
  <!-- end of content -->

  </div>
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
    Copyright &copy; 2021 <a href="index.php">Online Education</a></div>
</div>
</body>
</html>
