<?php include('connect.php');?>
<?php include('u_session.php');?>
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
      <li><a href="user_upload.php">Upload</a></li>
      <li><a href="user_search.php" class="current">Search</a></li>
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
      <h2 style="text-align:center">Search Documents</h2>
      <form name="frm" action="" method="post">
      <table cellpadding="5" cellspacing="5" style="margin:0 auto">
      <tr>
      	<td>Select Subject</td>
        <td><select name="keyword">
        	<option value="">Select</option>
            <?php
				$keyword=mysqli_query($con,"SELECT DISTINCT `keyword` FROM `document`");
				if(mysqli_num_rows($keyword))
				{
					while($drow=mysqli_fetch_array($keyword))
					{
						?><option value="<?php echo $drow['keyword'] ?>"><?php echo $drow['keyword'] ?></option><?php
					}
				}
			?>
            </select>
        </td>
        <td><input type="submit" name="src" value="Search" /></td>
      </tr>
      </table>
      </form>
      <p>&nbsp;</p>
      <?php
	  if(isset($_POST['src']))
	  {
		  $kw=$_POST['keyword'];
		  
		  $sql=mysqli_query($con,"SELECT d.*, u.fname, u.mname, u.lname ,t.tname, app.status, dw.nofd FROM document d INNER JOIN user u ON d.uid=u.uid INNER JOIN approve app ON d.did=app.did INNER JOIN type t ON d.tid=t.tid INNER JOIN download dw ON d.did=dw.did  WHERE app.status='Y' AND d.keyword='".$kw."'")or die(mysqli_error($con));
		  if(mysqli_num_rows($sql))
		  {
			  echo "<center>"."Total documents found ".mysqli_num_rows($sql)."</center>";
			  ?><table cellpadding="7" cellspacing="0" border="1" style="margin:0 auto">
              	<th>Sl.No.</th><th>Uploaded By</th><th>Subject</th><th>Download</th><th>No. of Document</th>
                <?php
				$i=1;
				while($row=mysqli_fetch_array($sql))
				{
					?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
                    <td><?php echo $row['keyword']; ?></td>
                    <td align="center"><a href="download.php?FileNO=<?php echo $row['durl'] ?>&did=<?php echo $row['did'] ?>"><img src="images/download.png" height="32" /></a>
                    </td>
                    <td><?php echo $row['nofd']; ?></td>
                    </tr>
					<?php
					$i++;
				}
				?>
                </table>
               <?php
			  
		  }
		  else
		  {
			  echo "<center>"."No Document found"."</center>";
		  }
	  }
	  ?>
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
