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
body{
padding:0;
margin:0;
}
#header{
width:auto;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:18px;
font-weight:bold;
text-align:justify;
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
      <li><a href="index.php" class="current">Home</a></li>
      <li><a href="about.php">about</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">Welcome to Education</h2>
	  <p>&nbsp;</p>     
	  <form name="frm" >
	  <table cellpadding="5" cellspacing="5" id="header">
	  <tr>
	  <td style="font-family:Arial, Helvetica, sans-serif;color:#3A3A3A;font-size:20px;font-weight:bold">Education is the best friend. An educated person is respected everywhere.
	   Education beats the beauty and the youth.</td>
	  </tr>
	  <tr>
	  <td align="right" style="font-family:Arial, Helvetica, sans-serif;color:#3A3A3A;font-size:20px;font-weight:bold">
	   - Chanakya
	  </td>
	  </tr>
      <tr>
	  <td style="font-family:Arial, Helvetica, sans-serif;color:#3A3A3A;font-size:20px;font-weight:bold">A nation is advanced in proportion to education and inteligence spread among the masses.</td>
	  </tr>
	  <tr>
	  <td align="right" style="font-family:Arial, Helvetica, sans-serif;color:#3A3A3A;font-size:20px;font-weight:bold">
	   - Swami Vivekananda
	  </td>
	  </tr>
	  </table>
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
	   <?php
if(isset($_GET['msg']))
{
	echo "<center>"."<font color='green' size='5px'>".$_GET['msg']."</font>"."</center>";
}
else
{
	if(isset($_GET['err']))
{
	echo "<center>"."<font color='red' size='5px'>".$_GET['err']."</font>"."</center>";
}
}
?>
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
