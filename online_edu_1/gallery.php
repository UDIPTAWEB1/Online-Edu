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
<link rel="stylesheet" type="text/css" href="css/lightbox.css" />

<script type="text/javascript" src="js/lightbox.js"></script>
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
      <li><a href="gallery.php" class="current">Gallery</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="contact.php">Contact</a></li>    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:600px;">
      <h2 style="text-align:center">Gallery</h2>
      <p>&nbsp;</p>
	  <table cellpadding="1" cellspacing="1" align="center">
	  <tr>
	  <td>
      <a href="img/gallery1.jpg" data-lightbox="roadtrip" data-title="gallery1.jpg"><img src="img/gallery1.jpg" class="margin_left				          margin_top" /></a>
	  </td>
	  <td>
	  <a href="img/gallery2.jpg" data-lightbox="roadtrip" data-title="gallery2.jpg"><img src="img/gallery2.jpg" class="margin_left          margin_top" /></a>
	  </td>
	  </tr>
	  <tr>
	  <td>
	 <a href="img/gallery3.jpg" data-lightbox="roadtrip" data-title="gallery3.jpg"><img src="img/gallery3.jpg" class="margin_left         margin_top" /></a>
	  </td>
	  <td>
	  <a href="img/gallery4.jpg" data-lightbox="roadtrip" data-title="gallery4.jpg"><img src="img/gallery4.jpg" class="margin_left         margin_top" /></a>
	  </td>
	  </tr>
	  <tr>
	  <td>
	  <a href="img/gallery5.jpg" data-lightbox="roadtrip" data-title="gallery5.jpg"><img src="img/gallery5.jpg" class="margin_left         margin_top" /></a>
	  </td>
	  <td>
	  <a href="img/gallery6.jpg" data-lightbox="roadtrip" data-title="gallery6.jpg"><img src="img/gallery6.jpg" class="margin_left         margin_top" /></a>
	  </td>
	  </tr>
	  </table>
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
