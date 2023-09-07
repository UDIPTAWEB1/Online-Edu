<?php require("function.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

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

<body style="background-color:#FFF">
    <div id="wrapper">
        <div class="col-lg-4" style="margin-left:250px; margin-top:150px;">
						<h2 class="text-primary" style="text-align:center">Administration Login</h2>
                        <form role="form" name="login" method="post" id="login">
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="email" name="email" id="user_name" class="form-control">                              
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pwd" id="pass" class="form-control">                              
                            </div>
                            <input type="submit" name="login" class="btn btn-default btn-primary" value="Login">
                        </form>
                        <?php
                        if(isset($_POST['login'])){
                            $obj=new Helper;
                            $data_array=array('table_name'=>'admin');
                            array_pop($_POST);
                            array_push($data_array, $_POST);
                            $res=$obj->search_data($data_array);
                            if(mysqli_num_rows($res)>0){
                                session_start();
                                $row=mysqli_fetch_assoc($res);
                                $_SESSION['info']=$row;
                                header('location:index.php');
                            }
                        } 
                        ?>
                    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
