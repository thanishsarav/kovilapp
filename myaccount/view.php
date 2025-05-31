<?php include('../header.php');
$id =  $_GET['id']  ;
$username = $_SESSION['username'];
$row = get_u($username); ?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="border-bottom: 1px outset green;">
                    <h2 class="card-title" style="text-align: center;">View User</h2>
                    <div class="button-group" width="100px" style="text-align: right;">

                       
                    </div>
                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="card ">

                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3 class="card-title">Photo</h3>
                                        <img src="../image/user/<?php echo $row['u_image'] ?>" class="img-thumbnail  "
                                            width="200px"><br><br>

                                        <div class="btn-group" style="margin-bottom:40px">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="uimageupload()">Upload</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="uimagedelete()">Delete</button>

                                        </div>
                                    </div>
                                    <script>
            function uimageupload()
            {
                url = "../user/uimageupload.php?id=<?php echo $id ?>";
                title = "popup";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
            }
        </script>
        <script>
            function uimagedelete()
            {
                url = "../user/uimagedelete.php?id=<?php echo $row['id'] ?> &u_image=<?php echo $row['u_image'] ?>";
                title = "popup";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
            }
        </script>
                                    <div class=" col-sm-8">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>User Name</td>
                                                        <td> <?php echo $row['username'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php echo $row['email'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td><?php echo $row['role'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile no</td>
                                                        <td><?php echo $row['mobile_no'] ?></td>
                                                    </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->

    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Email campaign chart -->

    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include('../footer.php') ?>