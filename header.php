<?php
session_start();
if (!isset($_SESSION['utoken'])) {
        header("Location: login.php");
    }else{
	$con=mysqli_connect("localhost","digicondevhub_building_user","id}hmOt(qLr=","digicondevhub_building");

    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> | </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <!--CSS for Image Uploaded -->
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <!--Datbase table view-->
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
     <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="user.png" width="100px" height="100px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"></strong>
                             </span><!--  <span class="text-muted text-xs block">admin <b class="caret"></b></span> </span> -->
                        </a>
                        <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul> -->
                    </div>
                    <div class="logo-element">
                        GYM
                    </div>
                </li>
                <li >
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></span>
                    </a>
                </li>
                <li >
                    <a href="view_user.php"><i class="fa fa-user-plus"></i> <span class="nav-label">Users</span></a>
                </li>
                <li>
                    <a href="view_ticket.php"><i class="fa fa-user-plus"></i> <span class="nav-label">Ticket</span></a>
                </li>







            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!--        put sidebar on start of page-wrapper -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm welcome-message">Welcome Admin</span>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        <div class="row  border-bottom "></div>

