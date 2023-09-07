<?php session_start(); 
    require('session.php');
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Online Education </a>
            </div>
            <!-- Top Menu Items -->
           <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 

                    <?php
                   echo $_SESSION['info']['fname'];
                    ?> 
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li class="divider"></li> -->
                        <!--<li>
                            <a href="change_password.php"> Change Password</a>
                        </li>-->
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="view_document.php"><i class=""></i>Document Type</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class=""></i> All Document <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="approve_document.php">Approve Document</a>
                            </li>
                            <li>
                                <a href="new_upload.php">New Upload Document</a>
                            </li>
                            <li>
                                <a href="suspended_document.php">Suspended Document</a>
                            </li>
                        </ul>
                    </li>
                     
                    <li>
                        <a href="all_user.php"><i class=""></i>All Users</a>
                    </li>
                   <!-- <li>
                        <a href="passenger_info.php"><i class=""></i></a>
                    </li>
                    <li>
                        <a href="passenger_info.php"><i class=""></i></a>
                    </li>
                    <li>
                        <a href="passenger_info.php"><i class=""></i></a>
                    </li>
                    <li>
                        <a href="passenger_info.php"><i class=""></i></a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>