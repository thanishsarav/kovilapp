<?php
include('init.php');
?>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Kakaveri Annammar Trust</title>
    <!-- Custom CSS -->
    <link href="<?php echo $path ?>/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo $path ?>/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo $path ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo $path ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <div class="card" style="margin-bottom:0px" >
            <div class="card header" style="text-align: center;padding: 0px;background-color:skyblue;margin-bottom:0px"  >
                <h1>Kakaveri Annammar Trust</h1>
            </div>
            <div class="card body" >

                <header class="topbar" style="padding-left:45px;padding-bottom:50px;">
                    <nav class="navbar top-navbar navbar-expand-md navbar-light">

                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar" id="navbarSupportedContent" style="" >
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-left " style="padding-left:5px;padding-bottom:10px">
                                <div class="nav-item dropdown" style="padding-left:0px;">
                                    <!-- Message -->
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark"
                                        href="<?php echo $path ?>/dashboard.php" id="2" 
                                        aria-haspopup="true">
                                        <p>Dashboard</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>


                                </div>
                                <li class="nav-item dropdown" style="padding-left:45px;">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>Family</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                        aria-labelledby="0">
                                        <span class="with-arrow">
                                            <span class="bg-danger"></span>
                                        </span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title text-white bg-danger">
                                                    <h4 class="m-b-0 m-t-5">Family</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="<?php echo $path ?>/member/addmembers.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Add member </h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/member/listmember.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Member list</h5>

                                                        </div>
                                                    </a>

                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:35px;">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>User</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                        aria-labelledby="0">
                                        <span class="with-arrow">
                                            <span class="bg-danger"></span>
                                        </span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title text-white bg-danger">
                                                    <h4 class="m-b-0 m-t-5">Users</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="<?php echo $path ?>/user/userlist.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Userlist</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/user/adduser.php" class="message-item">


                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Add user</h5>

                                                        </div>
                                                    </a>

                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:35px;">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>Listed by</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                        aria-labelledby="0">
                                        <span class="with-arrow">
                                            <span class="bg-danger"></span>
                                        </span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title text-white bg-danger">
                                                    <h4 class="m-b-0 m-t-5">Listed by</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="<?php echo $path ?>/member/occupation.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Occupation</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/member/qualification.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Qualification</h5>

                                                        </div>
                                                    </a>

                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>


                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-right" style="padding-left:75px;padding-bottom:10px">
                                <!-- ============================================================== -->
                                <!-- Messages -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown" style="padding-left:45px;text-alaign:right">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>Label</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                        aria-labelledby="0">
                                        <span class="with-arrow">
                                            <span class="bg-danger"></span>
                                        </span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title text-white bg-danger">
                                                    <h4 class="m-b-0 m-t-5">Label</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="member/addmembers.php" class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Label</h5>

                                                        </div>
                                                    </a>


                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:45px;">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <p>Delete</p>

                                    </a>

                                </li>

                                <li class="nav-item dropdown" style="padding-left:45px;">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?php echo $path ?>/image/profile.webp" alt="user"
                                            class="rounded-circle" width="40">
                                        <span class="m-l-5 font-medium d-none d-sm-inline-block">User<i
                                                class="mdi mdi-chevron-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                        <span class="with-arrow">
                                            <span class="bg-primary"></span>
                                        </span>
                                        <div
                                            class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                            <div class="">
                                                <img src="<?php echo $path ?>/image/profile.webp" alt="user"
                                                    class="rounded-circle" width="60">
                                            </div>
                                            <div class="m-l-10">
                                                <h4 class="m-b-0">User</h4>

                                            </div>
                                        </div>
                                        <div class="profile-dis scrollable">
                                            <a class="dropdown-item" href="<?php echo $path ?>/login.php">
                                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <div class="p-l-30 p-10">
                                            <a href="<?php echo $path ?>user/viewuser.html"
                                                class="btn btn-sm btn-success btn-rounded">View
                                                User</a>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>

        <div class="page-wrapper" style="margin-left:0px;">