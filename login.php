<?php
session_start();
//testing for git push to remote
include('init.php');
if (isset($_SESSION['username'])) {
    header('Location:dashboard.php');
} else {
    if (isset($_POST['username']) && $_POST['username'] != '') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (login($username, $password)) {

            header('Location:dashboard.php');

        } else {

            $error = "Username or password invalid!";
        }
    }
    ?>
    <html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="30x30" href="<?php echo $path ?>/image/gddb.png">
        <title>Kakaveri Annamar Trust</title>
        <!-- Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">

    </head>

    <body class="page-login">
        <div class="preloader">
        <div class="lds-ripple">
          
            <div class="loading-text">
                <h2>
                    பக்கமேற்றுகிறது..</h2>
            </div>
        </div>
    </div>
        <div class="main-wrapper" style="
                background-image: url('image/as.avif');">


            <?php global $error;
            if ($error) { ?>
                <div class="col-8" style="padding-left:400px;padding-top:100px;border-radius:130px;padding-bottom:5px">
                    <div class="card  card-hover">

                        <div class="card-body bg-warning text-white">
                            <h2 class="card-title"> <i class="  fas fa-exclamation-circle"></i><?php echo $error ?></h2>


                        </div>
                    </div>
                </div>
            <?php }
            ; ?>

            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="
              border-radius: 25px;">

                <div class="auth-box" style="
               border-radius: 25px;">

                    <div id="loginform">
                        <div class="logo">

                            <h5 class="font-medium m-b-20">SIGN IN</h5>
                            <hr>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal m-t-20" id="loginform" action="" method="POST">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder=" Enter your Username" aria-label="Username" name="username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="ti-pencil"></i></span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg"
                                            placeholder=" Enter your Password" aria-label="Password" name="password"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember
                                                    me</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="col-xs-12 p-b-20">
                                            <button class="btn btn-block btn-lg btn-info" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div> -->
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            Don't have a session already?
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="recoverform">
                        <div class="logo">
                            <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Recover Password</h5>
                            <span>Enter your Email and instructions will be sent to you!</span>
                        </div>
                        <div class="row m-t-20">
                            <!-- Form -->
                            <form class="col-12" action="index.html">
                                <!-- email -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control form-control-lg" type="email" required=""
                                            placeholder="Username">
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-lg btn-danger" type="submit"
                                            name="action">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- All Required js -->
            <!-- ============================================================== -->
            <script src="assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- ============================================================== -->
            <!-- This page plugin js -->
            <!-- ============================================================== -->
            <script>
                $('[data-toggle="tooltip"]').tooltip();
                $(".preloader").fadeOut();
                // ============================================================== 
                // Login and Recover Password 
                // ============================================================== 
                $('#to-recover').on("click", function () {
                    $("#loginform").slideUp();
                    $("#recoverform").fadeIn();
                });
            </script>
            <script>
                $(function () {
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' // optional
                    });
                });
            </script>
    </body>

    </html>
    <?php
}
?>