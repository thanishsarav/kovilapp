<?php
include('../popupheader.php');

if (count($_POST) && $_POST['name'] != '') {

    $res = add_donation($_POST);
    if ($res) {
        echo "Successfully 1 record added";
    } else {
        die('Error: ');
    }
}
?>
<!-- /.container -->
<div class="container-fluid">
    <h2 class="container text-center">Add donation</h2>
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
                            placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Year</label>

                    <div class="col-sm-7">
                        <table>
                            <tr>

                                <td>
                                    <?php display_year($name = "year[year]") ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Status</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="status"
                            placeholder="status">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Amount</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="total_amount"
                            placeholder="Amount">
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