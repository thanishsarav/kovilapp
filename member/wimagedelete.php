<?php
include('../popupheader.php');
include_once('../function.php');

$id = $_GET['id'];
$image = $_GET['w_image'];
$msg = '';
?>
<section class="content-header">
    <h1>
        Delete wife image
    </h1>
</section>

<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <?php
            if (isset($_POST['w_image'])) {
                $w_image = $_POST['w_image'];
                $file = $base_dir . "/image/member/" . $w_image;
                //echo $file;
                if (!unlink($file)) {
                    echo "Error in deleting file";
                } else {
                    $sql = "UPDATE `$tbl_family` SET `w_image`='' where `id`=$id";

                    if (!mysqli_query($con, $sql)) {
                        die('Error: ' . mysqli_error($con));
                    }
                    $msg .= "Successfully Deleted! ";

                }
            }
            if ($msg != '') {
                ?>

                <h4><?php echo $msg ?></h4>
                <center> <button type="button" class="btn btn-outline-primary"  onclick="window.close()">Ok</button></center>
            <?php } else {
                ?>
                <label>Are you sure want to delete this image?</label>
                <br>
                <br>
                <form action="" method="POST">
                    <input type="hidden" name="w_image" value="<?php echo $image ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" class="btn btn-outline-primary" >Yes</button>
                    <button type="submit" class="btn btn-outline-primary"  onclick="window.close()">No</button>
                </form>
            <?php } ?>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>