<?php include('connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.min.css" />
<link  rel="stylesheet"  type="text/css" href="css/bjqs.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<script type="text/javascript" src="js/jquery-1.10.2.js" ></script>
<script type="text/javascript" src="js/jquery.validate.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript"  src="js/bjqs-1.3.min.js"></script>
<script type="text/javascript"  src="js/bjqs-1.3.js"></script>
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
    label.error{
	width:auto;
	height:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	background:#950000;
	color:#FFFFFF;
	border-radius:5px;
	padding:3px;
	margin-left:5px;
	position:relative;
	float:right;
	}
#frm{
width:auto;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:16px;
padding:2px;
font-weight:bold;
border:1px  solid #999999;
}
.btn{
width:100px;
height:auto;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
padding:1px;
font-weight:bold;
background-color:#A8A8A8;
box-shadow:5px 5px 5px #777777;
}	
</style>
<script type="text/javascript" >
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
					   minlength:3,
					   maxlength:35
					   },
			   mname:{
			         lettersOnly:true,
					 minlength:3,
					 maxlength:20
					 },
				lname:{
	                  required:true,
					  lettersOnly:true,
					  minlength:3,
					  maxlength:35
					  },
					email:{
					  	required:true,
						email:true
						},
					pwd:{
						required:true,
						minlength:3,
						maxlength:15
						},		
                    gender:{
						 required:true,
						 minlength:1
						 },
					squestion:{
						 	required:true,
						},
						ans:{
							required:true,
							},
						ph:{
							phone:true
							}   
				     },
					 
					 messages:{
                          fname:{
						  		required:'Please enter your first name.',
								},
						mname:{
								required:'Please enter your middle name.',
								},
						lname:{
								required:'Please enter your last name.',
								},
						email:{
								required:'Please enter your email.',
							  },
						pwd:{
							 required:'Please enter your password.',
							 },
						gender:{
							  required:'Please specify your gender.',
							  },
						squestion:{
	                           required:'Please select your security question.',
							   },
						ans:{
						    required:'Please enter your answer.',
							},
								   						  
						ph:{
							required:'Please enter your phone number.',
							},
					 }
  });
							
		$("#dob").datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '-60:+0'
			});
});	 
</script>
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
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php" class="current">Register</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="content">
    <div class="content_box" style="height:500px;">
      <h2 style="text-align:center">User Registration</h2>
	  <form  name="frm" id="frm"action="registert_code.php" method="post">
	  <table cellpadding="5" cellspacing="5" align="center">
	  <tr>
	  <td>First Name</td>
	  <td><input type="text" name="fname" placeholder="First Name" required="required" class="text" /></td>
	  <tr>
	  <td>Middle Name</td>
	  <td><input type="text" name="mname" placeholder="Middle Name"  class="text" /></td>
	  </tr>
	  <tr>
	  <td>Last Name</td>
	  <td><input type="text" name="lname" placeholder="Last Name" required="required" class="text" /></td>
	  </tr>
	  </tr>
	  <tr>
	  <td>Email</td>
	  <td><input type="email" name="email" placeholder="Email" required="required" class="text" /></td>
	  </tr>
	  <tr>
	  <td>Password</td>
	  <td><input type="password" name="pwd" placeholder="Password" required="required" class="text" /></td>
	  </tr>
	  <tr>
	  <td>Date of Birth</td>
	  <td><input type="text" name="dob" id="dob" /></td>
	  </tr>
      <tr><td>Gender</td>
      		<td><input type="radio" name="gender" value="Male" />Male
            	<input type="radio" name="gender" value="Female" />Female</td>
      </tr>
	  <tr>
	  <td>Security Question</td>
	  <td>
	  <select name="squestion">
	  <option selected="selected"></option>
	  <option value="What&acute;s your birth day">What's your birth day</option>
	  <option value="What&acute;s your favourite book">What's your favourite book</option>
	  <option value="What&acute;s your pets name">What's your pets name</option>
	  <option value="What&acute;s your favourite food">What's your favourite food</option>
	  </select>
	  </td>
	  <tr>
	  <td>Security Answer</td>
	  <td><input type="text" name="ans" class="text" required="required" />
	  </td>
	  </tr>
	  <tr>
	  <td>Contact number</td>
	  <td><input type="text" name="ph" class="text" required="required"  /></td>
	  </tr>
	  <tr>
	  <td>&nbsp;
	  </td><td><input type="submit" name="ok" value="Sign Up" class="btn"  />
	  </td>
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
    Copyright &copy; 2021 <a href="index.php">Online Education</a> </div>
</div>
</body>
</html>
