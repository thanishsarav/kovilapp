<?php
include('../popupheader.php');

$id = $_GET['id'];
$s = $id . "_husband.jpg";
$upload_dir = $base_dir . "/image/member/";
//echo $upload_dir;
$msg = '';

if (isset($_FILES["h_image"])) {
    if ($_FILES["h_image"]["error"] > 0) {
        echo "Return Code: " . $_FILES["h_image"]["error"] . "<br />";
    } else {
        if ($_FILES["h_image"]["type"] != 'image/jpeg' && $_FILES["h_image"]["type"] != 'image/png') {
            echo "Image should be in jpeg format";
            die;
        } else {
 $msg .= $s . " already exists. ";
            if (file_exists("../image/member/" . $s)) {
               
                unlink("../image/member/" . $s);
            }
            //else {

            move_uploaded_file($_FILES["h_image"]["tmp_name"], "../image/member/" . $s);
            chmod("../image/member/" . $s, 0664);

            $sql = "UPDATE `$tbl_family` SET `image`='$s' where `id`=$id";

             if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
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
        Upload Husband image 
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
                    <center>    <button type="button"  class="btn btn-outline-primary" onclick="window.close()">Ok</button></center>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="image">select husband image:</label>
                        <input type="file" name="h_image" id="h_image"  />
                        <br>
                        <br>
                        <input type="submit"  class="btn btn-outline-primary" name="submit" value="Submit" />
                        <button type="button"  class="btn btn-outline-primary" onclick="window.close()">Cancel</button>
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
