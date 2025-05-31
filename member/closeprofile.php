<?php
include('../popupheader.php');
$id = $_GET['id'];
if (count($_POST) > 0) {
    $close_reason_code = $_POST['close_reason_code']??null;
    $married_to = $_POST['married_to']??null;
    $close_reason_detail = $_POST['close_reason_detail']??null;

$sql = "UPDATE `$tbl_matrimony` SET `close_reason_code`='$close_reason_code', `married_to`='$married_to', `close_reason_detail`='$close_reason_detail', `status`='closed' WHERE `id` ='$id'";
if (!mysqli_query($con,$sql))    
  {
  die('Error: ' . mysqli_error($con));
  }
  else
  echo "Successfuly record updated";
}
  ?>
<div class="container-fluid">
    <h2 class="container text-center">Reason for Closing Profile</h2>
</div>

<form class="form-horizontal" method="post">
    <!-- form start -->
    <!-- Horizontal Form -->
    <div class="box box-info" >
        <div class="box-body">
            <br>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Reason for closing</label>

                    <div class="col-sm-7">
<?php display_closing_reasons("close_reason_code"); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Married to</label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control " id="inputEmail3" name="married_to" style="width:150px" >
					    Enter matrimony ID if alliance set within this portal	
                    </div>
					
					
					
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Closed Reason</label>

                    <div class="col-sm-7">
                        <textarea type="text" class="form-control" id="inputrole3" name="close_reason_detail"></textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit"  class="btn btn-outline-primary" >Cancel</button> 
                <button type="submit" class="btn btn-outline-primary" >Save</button>
            </div>
        </div>
    </div>

</form>
<?php
//include('../footer.php');
?>