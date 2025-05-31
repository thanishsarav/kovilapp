<?php
include('../popupheader.php');
$success = '';
if (count($_POST) && $_POST['username'] != '') {

    $res = add_user($_POST);
    if ($res) {
        $success = "Successfully 1 record added";
    } else {
        die('Error: ' . mysql_error());
    }
}
?>   
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add role</h4>
            </div>
            <div class="modal-body">
                <p>Role:</p>
                <form method="POST" action="adduser.php">
                    <input type="text" class="form-control" id="inputusername3" name="role">
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Save </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
        <div class="container-fluid">
            <?php if ( $success) { ?>
        <div class="alert alert-success col-sm-10  col-sm-offset-1" style="margin-bottom:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo  $success ?>
        </div>
    <?php } ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="border-bottom: 1px outset green;" >
                            <h2 class="card-title">Add User</h2>
                        </div>
                       
                        <form class="form-horizontal" method="POST" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="ename" class="col-sm-3 text-right control-label col-form-label">User
                                        Name</label>
                                    <div class="col-sm-5"  width="10%" >
                                        <input type="text" class="form-control" id="ename" placeholder="User Name" name="username" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pname"
                                        class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-5"  width="10%" >
                                        <input type="text" class="form-control" id="pname" placeholder="Email" name="email" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 text-right control-label col-form-label">mobile
                                        no</label>
                                        <div class="col-sm-5"  width="10%" >
                                        <input type="text" class="form-control" id="pname" placeholder="mobile no" name="mobile_no">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rate"
                                        class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-5"  width="10%" >
                                        <input type="password" class="form-control" id="rate" placeholder="Password"  name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Role</label>
                                    <div class="col-sm-5"  width="10%" >
                                        <select class="form-control custom-select" data-placeholder="Choose a Category"
                                            tabindex="1" name="role" >
                                            <option data-toggle="modal" data-target="#myModal">Add role</option>
                                            <option selected="selected">Select</option>
                                            <option value="Manager">Manager</option>
                                            <option value="admin">Admin</option>
                                            <option value="staff">Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit"  class="btn btn-outline-primary" >Save</button>
                                    <button type="button" onclick="window.close()"  class="btn btn-outline-primary" >Cancel</button>
                                </div>
                            </div>
                        </form>
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