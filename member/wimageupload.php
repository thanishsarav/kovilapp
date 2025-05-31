<?php
include('../popupheader.php');
$id = $_GET['id'];
$upload_dir = $base_dir . "/image/member/";
//echo $upload_dir;

$msg = '';

if (isset($_FILES["w_image"])) {
    if ($_FILES["w_image"]["error"] > 0) {
        echo "Return Code: " . $_FILES["w_image"]["error"] . "<br />";
    } else {
        if ($_FILES["w_image"]["type"] != 'image/jpeg') {
            echo "Image should be in jpeg format";
            die;
        } else {
            $s = $id . "_wife.jpg";

            if (file_exists("../image/member/" . $s)) {
                //    $msg .= $s . " already exists.   ";
                unlink("../image/member/" . $s);
            }
            //else {

            move_uploaded_file($_FILES["w_image"]["tmp_name"], "../image/member/" . $s);
            chmod("../image/member/" . $s, 0664);

            $sql = "UPDATE `$tbl_family` SET `w_image`='$s' where `id`=$id";

            if (!mysqli_query( $con,$sql)) {
                die('Error: ' . mysqli_error($con));
            }
            $msg .= " Successfully uploaded!!";
            //"Stored in:" . "images/" . $s; 
            ?>

            <?php
            //}
        }
    }
}
?>
<section class="content-header">
    <h1>
        Upload Wife image 
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
                    <h4><?php echo $msg ?></h4>
                    <center> <button type="button" class="btn btn-outline-primary"  onclick="window.close()">Ok</button></center>

                    <?php
                } else {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="image">select wife image:</label>
                        <input type="file" class="btn btn-outline-primary"  name="w_image" id="w_image" />
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
