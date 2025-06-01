<?php
include('../popupheader.php');
$event=$_GET['event_id'];
if (count($_POST) && $_POST['member_no'] != '') {

    $res = add_donation1($_POST);
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
                    <label for="inputEmail3" class="col-sm-4 control-label">Member_no</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputusername3" name="member_no" placeholder="name">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Date</label>

                    <div class="col-sm-7">
                        <table>
                            <tr>
                                <td>
                                    <?php display_date("date[date]", ) ?>
                                </td>
                                <td>
                                    <?php display_month("date[month]", ) ?>
                                </td>
                                <td>
                                    <?php display_year("date[year]", ) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Recept no</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputusername3" name="recept_no" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">book_no</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="book_no" placeholder="status">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Amount</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputPassword3" name="amount"
                            placeholder="Amount">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Event_id</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputusername3" name="event_id" value="<?php echo$event ?>">
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