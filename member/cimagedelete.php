<?php
include('../popupheader.php');
include_once( "../function.php");

$id = $_GET['id'];
$c_image = $_GET['c_image'];
$msg = '';
?>
<section class="content-header">
    <h1>
        Delete Child Photo
    </h1>
</section>

<section class="content">       
    <div class="box box-default">
        <div class="box-body">
            <?php
            if (isset($_POST['c_image'])) {
                $c_image = $_POST['c_image'];

                $file = $base_dir . "/image/member/" . $c_image;
                //echo $file;
                if (!unlink($file)) {
                    echo "Error in deleting file";
                } else {
                    $sql = "UPDATE `$tbl_child` SET `c_image`='' where `id`=$id";

                    if (!mysqli_query( $con,$sql)) {
                        die('Error: ' . mysql_error());
                    }
                    $msg .= "Successfully Deleted! ";
                }
            }
            if ($msg != '') {
                ?>

                <h4><?php echo $msg ?></h4>
                <center>    <button type="button"  class="btn btn-outline-primary" onclick="window.close()">Ok</button></center>
            <?php
            } else {
                ?>
                <label>Are you sure want to delete this image?</label>
                <br>
                <br>
                <form action="" method="POST">
                    <input type="hidden" name="c_image" value="<?php echo $c_image ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" class="btn btn-outline-primary"  >Yes</button>
                    <button type="submit" class="btn btn-outline-primary"  onclick="window.close()">No</button>
                </form>
            <?php } ?>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>