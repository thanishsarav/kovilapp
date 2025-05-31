<?php
include('../popupheader.php');

$id = $_GET['id'];
$s = $id . "_photo.jpg";
$upload_dir = $base_dir . "/image/horo/";
//echo $upload_dir;
$msg = '';

if (isset($_FILES["photo"])) {
    if ($_FILES["photo"]["error"] > 0) {
        echo "Return Code: " . $_FILES["photo"]["error"] . "<br />";
    } else {
        if ($_FILES["photo"]["type"] != 'image/jpeg') {
            echo "Image should be in jpeg format";
            die;
        } else {

            if (file_exists("../image/horo/" . $s)) {
                //$msg .= $s . " already exists. ";
                unlink("../image/horo/" . $s);
            }
            //else {

            move_uploaded_file($_FILES["photo"]["tmp_name"], "../image/horo/" . $s);
            chmod("../image/horo/" . $s, 0664);

            $sql = "UPDATE `$tbl_matrimony` SET `photo`='$s' where `id`=$id";

            if (!mysqli_query( $con,$sql)) {
                die('Error: ' . mysql_error());
            }

            $msg .= "Successfully uploaded! ";
            //"Stored in:" . "images/" . $s; 
            //  }
        }
    }
}
?>
<section class="content-header">
    <h1>
        Upload Your Profile photo
    </h1>
</section>
<section class="content">       
    <div class="box box-default">
        <div class="box-body">

            <?php
            if (!(is_dir($upload_dir) && is_writable($upload_dir))) {
                echo 'Upload directory is not writable, or does not exist.';
            } else {
                if ($msg != '') {
                    ?>
                    <h3><?php echo $msg ?></h3>
                    <center> <button type="button" class="btn btn-outline-primary"  onclick="window.close()">Ok</button> </center>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="image">select your image:</label>
                        <input type="file" name="photo" id="image" />
                        <br>
                        <br>
                        <input type="submit"  class="btn btn-outline-primary" name="submit" value="Submit" />
                        <button type="button" class="btn btn-outline-primary"  onclick="window.close()">Cancel</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>