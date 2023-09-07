<?php require('function.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>
    <style type="text/css">
label.error{
    margin-left:10px;
    border:1px solid #000;
    border-radius:7px;
    padding:5px;
    background:#F0F;
    box-shadow:3px 3px 0 0 #666;
}
</style>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require('menu.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Password Change
                        </h1>
                        
                    </div>
                </div>
               <div class="row">
               <form name="frm" method="post" id="frm">
               <center><b><font color="red"><?php if(isset($_REQUEST['msg'])) echo $_REQUEST['msg']; ?></font></center>
                <table cellpadding="50">
                    <tr>
                        <td colspan="3" align="center"><h2>Change Password</h2></td>
                    </tr>
                    <tr>
                    <td>email</td>
                    <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>Old Password:</td>
                        <td><input type="password" name="pwd"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input type="password" name="new_pwd"></td>
                        <td></td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" align="center"><input type="submit" name="ok" value="ok"></td>
                    </tr>
                </table>
                </form>
               </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script>
 -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
if(isset($_POST['ok']))
{
                            $con=mysqli_connect("localhost","root","");
                            mysqli_select_db("online_edu",$con);
                            $email=$_POST['email'];
                                 $pwd=$_POST['pwd'];
                            $new_pwd=$_POST['new_pwd'];
                            
                       
                            $q=mysqli_query($con,"select * from admin where email='$email' and pwd='$pwd'")or die(mysqli_error($con));
                            $a=mysqli_fetch_array($q);
                            if($a>0)
                            {
                                mysqli_query("update admin set pwd='$new_pwd' where email='$email'")or die(mysqli_error());
                                ?>
                               <script>
                               window.location('change_password.php?msg=change successfully');
                               </script>
                               <?php

                            }

                            }
                            ?>
                        
                            



