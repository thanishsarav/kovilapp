<?php
include('../popupheader.php');
$id = $_GET['id'];
if (count($_POST) > 0) {
    $res = update_donation($id, $_POST);
    if ($res) {
        echo "Successfully 1 record updated";
    } else {
        die('Error: ' . mysql_error());
    }
}

$row = get_donation($id);
?>
<!-- /.container -->
<div class="container-fluid">
    <h2 class="container text-center">Update donation</h2>
</div>
<div class="col-md-12">
    <!-- Horizontal Form -->
    <form method="post" class="form-horizontal">
        <div class="box box-info">
            <!-- form start -->
            <div id="size" class="box-body">
                <br>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Name</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputusername3" name="name"
                            value="<?php echo $row['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Year</label>

                    <div class="col-sm-7">
                        <table>
                            <tr>

                                <td>
                                    <?php display_year($name = "year[year]",$row['year']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Status</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="status"
                             value="<?php echo $row['status'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">No of books</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="book_no"
                            value="<?php echo $row['book_no'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label"> Total Amount</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="total_amount"
                            value="<?php echo $row['total_amount'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Remaining Amount</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="remaining_amount"
                            value="<?php echo $row['remaining_amount'] ?>">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->
        </div>
    </form>
    <!-- /.box -->
    <!-- general form elements disabled -->

    <!-- /.box -->
</div>
<div style="clear:both"></div>

<?php
include('../footer.php');
?>