<?php
include_once('init.php');
check_login();
//var_dump($_SERVER);
//echo $path;
//var_dump($_SESSION);

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
    <link rel="icon" type="image/png" sizes="30x30" href="<?php echo $path ?>/image/gddb.png">
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
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <div class="card" style="margin-bottom:0;color:white">
            <div class="card header"
                style="text-align: center;padding: 0px;background-color: #435f6f;
                background-image: linear-gradient(to right, #435f6f 0%, #567a8f 50%, #567a8f 100%), linear-gradient(to right, #4d6d7f 0%, #7fa0b2 51%, #7094a8 100%);margin-bottom:0px;color:white;text-shadow:2px 2px blue;">
                <h1>Kakaveri Annammar Trust </h1>
                
                      
                        
                    </div>
                </div>

            </div>

            <div class="card body"
                style="background-color: #435f6f;
                background-image: linear-gradient(to right, #435f6f 0%, #567a8f 50%, #567a8f 100%), linear-gradient(to right, #4d6d7f 0%, #7fa0b2 51%, #7094a8 100%);color:white">

                <header class="topbar"
                    style="padding-left:5px;padding-bottom:70px;position:relative;background-color: #435f6f;
                background-image: linear-gradient(to right, #435f6f 0%, #567a8f 50%, #567a8f 100%), linear-gradient(to right, #4d6d7f 0%, #7fa0b2 51%, #7094a8 100%);color:white">
                    <nav class="navbar top-navbar navbar-expand-md navbar-light">

                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar" id="navbarSupportedContent" style="">

                            <ul class="navbar-nav float-left " style="padding-left:0px;padding-bottom:30px;color:white">
                                <div class="nav-item dropdown" style="padding-left:0px;color:white">

                                    <a class="nav-link dropdown-toggle text-light"
                                        href="<?php echo $path ?>/dashboard.php" id="2" aria-haspopup="true">
                                        <p> Dashboard</p>

                                    </a>


                                </div>
                                <li class="nav-item dropdown" style="padding-left:25px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <p>Family</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left mailbox" aria-labelledby="0"
                                        style="max-height: 44px !important;border:2px inset #095A51">

                                        <ul class="list-style-none">

                                            <li> 
                                                <div class="message-center message-body">
                                                   
                                                   
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

                                <li class="nav-item dropdown" style="padding-left:15px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <p>User</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <?php
                                    if (($_SESSION['username']) == 'admin') {
                                        ?>
                                        <div class="dropdown-menu dropdown-menu-left  mailbox " aria-labelledby="0"
                                            style="max-height: 84px !important;border:2px inset #095A51">

                                            <ul class="list-style-none">

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
                                        <?php
                                    }
                                    ?>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:15px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <p>Listed by</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left  mailbox " aria-labelledby="0"
                                        style="max-height: 254px !important;border:2px inset #095A51">

                                        <ul class="list-style-none">

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
                                                    <a href="<?php echo $path ?>/member/village.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Village</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/member/pudavai.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Pudavai</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/member/bloodgroup.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Bloodgroup</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/member/kattalai.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Kattalai</h5>

                                                        </div>
                                                    </a>



                                             </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:15px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <p>Donation</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left  mailbox " aria-labelledby="0"
                                        style="max-height: 50px !important;border:2px inset #095A51">

                                        <ul class="list-style-none">

                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a  href="<?php echo $path ?>/donetion/donlist.php" 
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Donationlist</h5>

                                                        </div>
                                                    </a>
                                                   
                                                    


                                               </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                 <li class="nav-item dropdown" style="padding-left:15px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <p>Horoscope</p><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left  mailbox " aria-labelledby="0"
                                        style="max-height: 50px !important;border:2px inset #095A51">

                                        <ul class="list-style-none">

                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a  href="<?php echo $path ?>/member/listhoroscope.php" 
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Horoscopelist</h5>

                                                        </div>
                                                    </a>
                                                    


                                               </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown" style="padding-left:15px;">
                                    <a class="nav-link dropdown-toggle text-light" href="" id="2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class=" fas fa-cogs"
                                            style="margin-top: 28px;"></i><!--  <i class="font-22 mdi mdi-email-outline"></i> -->

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left  mailbox " aria-labelledby="0"
                                        style="max-height: 84px !important;border:2px inset #095A51 ">

                                        <ul class="list-style-none">

                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="<?php echo $path ?>/label/labellist.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">List Label</h5>

                                                        </div>
                                                    </a>
                                                    <a href="<?php echo $path ?>/label/addlabel.php"
                                                        class="message-item">

                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Add Label</h5>

                                                        </div>
                                                    </a>


                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <?php
                                if (($_SESSION['username']) == 'admin') {
                                    ?>
                                    <li class="nav-item dropdown" style="padding-left:15px;">
                                        <a class="nav-link dropdown-toggle text-light" href="<?php echo $path ?>/trash.php"
                                            id="2" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-trash" style="margin-top: 28px;"></i>

                                        </a>

                                    </li>
                                <?php }
                                ; ?>


                            </ul>


                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-right" style="padding-left:250px;padding-bottom:30px">
                                <!-- ============================================================== -->
                                <!-- Messages -->
                                <!-- ============================================================== -->


                                <li class="nav-item dropdown" style="padding-left:55px;">
                                    <a class="nav-link dropdown-toggle text-light pro-pic" href=""
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="../image/user/<?php echo $_SESSION['u_image'] ?>" height="50px"  width="50px" alt="user"
                                            class="rounded-circle " width="40">
                                        <span class="m-l-5 font-medium d-none d-sm-inline-block"
                                            style="text-shadow:1px 1px blue;"> <?php echo $_SESSION['username'] ?>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right user-dd"
                                        style="border:2px solid rgb(7, 195, 29)">
                                        <span class="with-arrow">
                                            <span class="bg-success"></span>
                                        </span>
                                        <div
                                            class="d-flex no-block align-items-center p-15 bg-success text-white m-b-10">
                                            <div class="">
                                                <img src="../image/user/<?php echo$_SESSION['u_image'] ?>" alt="user"
                                                    height="100px" width="100px" class="rounded-circle " width="60">
                                            </div>
                                            <div class="m-l-10">
                                                <h4 class="m-b-0"><?php echo $_SESSION['username'] ?></h4>

                                            </div>
                                        </div>
                                        <div class="profile-dis scrollable">
                                            <a class="dropdown-item" href="<?php echo $path ?>/logout.php">
                                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <div class="p-l-30 p-10">
                                            <a href="<?php echo $path ?>/myaccount/view.php?id=<?php echo $_SESSION['id'] ?>"
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

        <div class="page-wrapper" style="margin-left:0.5px;padding-top:10px;">