<?php
include('../header.php');
if (count($_POST) && $_POST['display_name'] != '') {

    $res = add_label($_POST);
    if ($res) {
        echo "Successfully 1 record added";
    } else {
        die('Error: ' . mysql_error());
    }
}
?>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
        <div class="container-fluid">
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="border-bottom: 1px outset green;" >
                            <h2 class="card-title">Add label</h2>
                        </div>
                       
                        <form class="form-horizontal" method="POST" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="ename" class="col-sm-3 text-right control-label col-form-label">Display name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="display_name" id="ename" placeholder="Display name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pname"
                                        class="col-sm-3 text-right control-label col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pname" name="slug"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 text-right control-label col-form-label">
                                        Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  name="category" id="pname" placeholder="mobile no">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rate"
                                        class="col-sm-3 text-right control-label col-form-label">Parent id</label>
                                    <div class="col-sm-9">
                                        <input type="Parent id" class="form-control" name="parent_id" id="rate" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rate"
                                        class="col-sm-3 text-right control-label col-form-label">Order</label>
                                    <div class="col-sm-9">
                                        <input type="Order" class="form-control" name="order"  id="rate" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Type</label>
                                    <div class="col-md-9">
                                          <?php display_type("type"); ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
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