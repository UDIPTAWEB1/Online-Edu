<?php require("function.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Profile</title>
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
        <?php require ('menu.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Document Type
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Types
                            </li>
                        </ol> -->
                        <?php
 $obj=new Helper;
 $tid=array("tid"=>base64_decode($_GET['tid']));
$data_Array=array("table_name"=>"type");
array_push($data_Array,$tid);
$rs=$obj->search_data($data_Array);
//print $rs;
$rec=mysqli_fetch_object($rs);
?>
 <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Type
                            </li>
                        </ol>
                        <a href="view_document.php"><button class="btn btn-warning">Back</button></a><br>
                    </div>
                     <div class="col-lg-6">
                     <script type="text/javascript" src="js/jquery.js"></script>
                    <script type="text/javascript" src="js/jquery.validate.js"></script>

                         <form role="form" method="post" id="frm">

                            <div class="form-group">
                                <label> Modify Document Type:</label>
                                <input type="text" name="tname" id="tname" class="form-control" value="<?php echo $rec->tname; ?>" placeholder="Enter document type">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-lg btn-info" value="Update">
                            </div>
                        </form>
                               <!-- /.row -->
                 <script>
                        $(document).ready(function() {
                            jQuery.validator.addMethod("nameonly", function(value, element) {
                            return this.optional(element) || value == value.match(/^[a-zA-Z & ]+$/);
                        },"Only alphabets Allowed.");
                             $("#frm").validate({
                                rules:{
                                    tname:{
                                            required:true,
                                            nameonly:true
                                            }
                                        },
                                        messages:{
                                                tname:{
                                                    required:'Please enter your document type.'
                                                }
                                            }
                                            })
                                    });
                    </script>
                <?php
    if(isset($_POST['update'])){
        $data_array=array("table_name"=>"type");
        array_pop($_POST);
        //$_POST['lang']=implode(",", $_POST['lang']);
        array_push($data_array, $_POST);
        array_push($data_array,$tid);
        $res=$obj->update_data($data_array);
        if($res==1){
            ?>
            <script>
                window.location='view_document.php?msg=Update Sucessfully';
            </script>
            <?php
            
        }
        else{
            echo 'Update not done';
            exit;
        }
    }
    ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
