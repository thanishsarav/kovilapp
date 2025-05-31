<?php
include('../popupheader.php');
$id = (int) $_GET['id'];

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid ID');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $res = update_labels($id, $_POST);
    if ($res) {
        echo "Successfully updated 1 record";
    } else {
        die('Error updating record.');
    }
}
$row = get_label($id);
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="border-bottom: 1px outset green;">
                    <h2 class="card-title">Add label</h2>
                </div>

                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="ename" class="col-sm-3 text-right control-label col-form-label">Display
                                name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="display_name" id="ename"
                                    value="<?php echo $row['display_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pname" name="slug"
                                    value="<?php echo $row['slug'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">
                                Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pname" name="category"
                                    value="<?php echo $row['category'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-3 text-right control-label col-form-label">Parent id</label>
                            <div class="col-sm-9">
                                <input type="Parent id" class="form-control" id="rate" name="parent_id "
                                    value="<?php echo $row['parent_id'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-3 text-right control-label col-form-label">Order</label>
                            <div class="col-sm-9">
                                <input type="Order" class="form-control" id="rate" name="order"
                                    value="<?php echo $row['order'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rate" class="col-sm-3 text-right control-label col-form-label">Type</label>
                            <div class="col-md-7">
                                <?php display_type("type", $row['type']); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="form-group m-b-0 text-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                            <button type="submit" onclick="window.close()" class="btn btn-dark waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</div>

<?php include('../footer.php') ?>