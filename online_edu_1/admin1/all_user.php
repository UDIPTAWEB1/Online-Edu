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
                            User Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> user
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="col-lg-12">
                    <?php
                    $obj=new Helper;
                    $data_array=array('table_name'=>"user");
                    $rs=$obj->view_data($data_array);
                    if(mysqli_num_rows($rs)>0){
                        ?>
                        <table class="table tabale-bordered">
                            <tr>
                                <th>Sl No.</th>
                                <th>fname</th>
                                <th>lname</th>
                                <th>email</th>
                                <th>pwd</th>
                                <th>dob</th>
                                <th>gender</th>
                                <th>ph</th>
                            </tr>
                            <?php
                            $sl=1;
                            while($row=mysqli_fetch_object($rs)){
                                ?>
                                <tr>
                                    <td><?php echo $sl ?></td>
                                    <td><?php echo $row->fname ?></td>
                                    <td><?php echo $row->lname ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo base64_encode($row->pwd) ?></td>
                                    <td><?php echo $row->dob ?></td>
                                    <td><?php echo $row->gender ?></td>
                                    <td><?php echo $row->ph ?></td>
                            
                                </tr>
                                <?php
                                $sl++;
                            }
                            ?>
                        </table>
                        <?php
                    }
                    else{
                        echo "No such type found";
                    }
                    ?>
                </div>    
                                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
