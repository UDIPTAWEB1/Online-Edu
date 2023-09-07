<?php include('connect.php');?>
<?php include('u_session.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Education</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.js"></script>
<script type="text/javascript">
      $(document).ready(function ($) {
        $('#ucon').perfectScrollbar({
          wheelSpeed: 5,
          wheelPropagation: false
        });
      });
    </script>

<style type="text/css" >
#ucon {
        height:147px;
        width: 350px;
        overflow: hidden;
		text-align:center;
      }

#text
{
	width:auto;
	height:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	text-align:left;
}
#btn
{
	width:100px;
	height:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	text-align:center;
	border-radius:15px 15px 15px 15px;
	-mez-border-radius:15px 15px 15px 15px;
	
	
}
    label.error{
	width:auto;
	height:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
	background:#990033;
	color:#FFFFFF;
	border-radius:5px;
	padding:3px;
	margin-left:5px;
	position:relative;
	}
	input.error { border: 1px solid red; }
	.tab{
		padding:1px;
	}
	.tab th{
		width:75px;
	}
	.tab td{
		width:75px;
	}

</style>
<script type="text/javascript" src="js/jquery-1.10.2.js" ></script>
<script type="text/javascript" src="js/jquery.validate.js" ></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script>
$(document).ready(function() {
	
	$.validator.addMethod("lettersOnly",function (value,element){
		return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
		},"Please enter letters only.");
		
	/*$validator.addMethod("extension", function(value, element) {
	param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, "Please enter a value with a valid extension.");*/
		
	
    $("#frm").validate({
		rules:{
			keyword:{
				required:true,
				lettersOnly:true
				
			},
			
			pass:{
				required:true
			}
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
    <h1><a href="#"> <img src="images/logo.png" alt="" /></a></h1>
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
      <li><a href="user_upload.php" class="current">Upload</a></li>
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
      <h2 style="text-align:center">Upload Documents</h2>
      <p>&nbsp;</p>
      <div>
      <form name="frm" id="frm" action="user_upload.php" method="post" enctype="multipart/form-data">
      <!--<input type="hidden" name="mode" value="e">-->
      <?php 
      $sql="SELECT tid,tname FROM `type` order by tname";
      $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
      ?>
     <center> <tr>
      	<td>Document Type</td>
        <td><select name="tid">
        
        	<option selected>Type</option>
        	<?php
		  $i=1;
		  while($drow=mysqli_fetch_assoc($rs))
		  {
			  ?>
        	<option value="<?php echo $drow['tid'] ?>"><?php echo $drow['tname'] ?></option>
        	<?php $i++; } ?>
        </select></td>
      </tr></center>
      <br>
      <center><tr>
      	<td>Subject</td>
        <td><input type="text" name="keyword" /></td>
      </tr></center>
      <br>
      <center><tr>
      <td>Select Document</td>
      <td><input type="file" name="file" class="required" accept="application/pdf" /></td>
      </tr></center>
      <br><br>
      <center><tr>
      <td></td><td><input type="submit" value="Upload"  name="ok"  id="btn"/></td>
      </tr></center>
      </table>
      </form>
      <?php
if(isset($_POST['ok']))
{
	$uid=$_SESSION['u_info']['uid'];
	$key=$_POST['keyword'];
	$tid=$_POST['tid'];
	$fname=$_FILES['file']['name'];
	$durl="documents/".rand(111111,999999).$fname;
	$up=move_uploaded_file($_FILES['file']['tmp_name'],$durl);
	if($up==1)
	{
		$sql="INSERT INTO `document` (`uid`,`tid`,`durl`,`keyword`,`filename`) VALUES('$uid','$tid','$durl','$key','$fname')";
		$res=mysqli_query($con,$sql);
		if($res==1)
		{
			$src=mysqli_query($con,"SELECT `did` FROM `document` WHERE `durl`='".$durl."'")or die(mysqli_error($con)) ;
			if(mysqli_num_rows($src)>0){
				$drow=mysqli_fetch_assoc($src);
				$sql=mysqli_query($con,"INSERT INTO `approve`(`did`,`status`)VALUES(".$drow['did'].",'N')") or die(mysqli_error($con));
				if($sql==1){
					header('location:user_upload.php?msg=Your Document Upload sucessfully');
					exit;
				}
				else{
					header('location:user_upload.php?err=Your Document Not Upload');
			exit;
				}
			}
			
		}
		else
		{
			header('location:user_upload.php?err=Sorry!!! Your File Not Upload');
			exit;
		}
	}
	else
	{
		header('location:user_upload.php?err=File not upload');
		exit;
	}
}
?>
      
      <center>
      <?php
	  $doc=mysqli_query($con,"SELECT * FROM `document` WHERE `uid`='".$_SESSION['u_info']['uid']."'")or die(mysqli_error($con));
	  if(mysqli_num_rows($doc))
	  {
		  ?>
          <div style="height:20px; padding-top:20px;">
		  <?php
		  echo "Total documents uploaded ".mysqli_num_rows($doc);
		  ?></div>
          
          <table cellpadding="7" cellspacing="0" class="tab">
          <th>SlNo.</th><th>Subject</th><th>File Name</th><th>Delete</th>
          </table>
          <div id="ucon">
          <table cellpadding="7" cellspacing="0" border="1" class="tab">
		  <?php
		  $i=1;
		  while($drow=mysqli_fetch_array($doc))
		  {
			  ?>
              <tr>
              <td><?php echo $i ?></td>
              	<td><?php echo $drow['keyword'] ?></td>
                <td><?php echo $drow['filename'] ?></td>
                <td><a href="user_upload.php?did=<?php echo $drow['did'] ?>" onClick="return confirm('Do you want to delete document <?php echo $drow['filename'] ?>?')"><img src="images/file_remove.png" width="32" height="32" /></a></td>
                </tr>
			  <?php
			  $i++;
		  }
		  
		  ?>
		  </table>
          </div>
		  <?php
	  }
	  else
	  {
		  echo "There are no documents uploaded";
	  }
	  ?>
      <?php
	  if(isset($_GET['did']))
	  {
		  $ddid=$_GET['did'];
		  $del=mysqli_query($con,"DELETE FROM `document` WHERE `did`='$ddid'") or die(mysqli_error($con));
		  if($del==1)
		  {
			  header('location:user_upload.php?msg=File has been deleted');
			  exit;
		  }
		  else
		  {
			  header('location:user_upload.php?err=File has not been deleted');
			  exit;
		  }
	  }
	  ?>
      </center>
      
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
