<?php include('../header.php');
if (($_SESSION['username']) != 'admin') {
    echo "<br>" . "<br>" . "<br>" . 'You are not authorized to visit this page!';
    die;
}

$error_msg = '';
$success_msg = '';

$username = $_SESSION['username'];
$id = $_GET['id'];

if (count($_POST) > 0) {
    $res = update_users($id, $_POST);
    if ($res) {
        $success_msg = "Updated Successfully ";
    } else {
        $error_msg = 'Error: ';
    }
}
$row = get_user($id); ?>

<div class="container-fluid">
    
     <?php if ($success_msg) { ?>
        <div class="alert alert-success col-sm-10  col-sm-offset-1" style="margin-bottom:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo "<h1>".$success_msg."</h1>" ?>
        </div>
    <?php } ?>

    <?php if ($error_msg) { ?>
        <div class="alert alert-danger alert-dismissable col-sm-10  col-sm-offset-1" style="margin-bottom:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_msg ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-12">
            
            <div class="card">
              
                <div class="card-body" style="border-bottom: 1px outset green;">
                    <h2 class="card-title">Update User</h2>
                </div>

                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="ename" class="col-sm-3 text-right control-label col-form-label">User
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ename" name="username"
                                    value="<?php echo $row['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pname" name="email"
                                    value="<?php echo $row['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">mobile
                                no</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pname" name="mobile_no"
                                    value="<?php echo $row['mobile_no'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Role</label>
                            <div class="col-md-9">
                                <select name="role" class="form-control">
                                    <option data-toggle="modal" data-target="#myModal">Add role</option>
                                    <option selected><?php echo $row['role'] ?></option>
                                    <option value="">Select</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="form-group m-b-0 text-right">
                            <button type="submit"  class="btn btn-outline-primary" >Update</button>
                            <button type="button" onclick="window.close()"
                                class="btn btn-outline-primary" >Cancel</button>
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