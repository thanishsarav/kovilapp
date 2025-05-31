<?php
include('../popupheader.php');

$id = $_GET['id'];
if (!isset($_GET['id'])) {
    echo "ERROR THE PAGE CANNOT BE LOADED";
    die;
}

$result = mysqli_query($con,"SELECT * FROM `$tbl_family` WHERE `id`='$id'");
$row = mysqli_fetch_array($result);
?>

<div style="float:left; width:50%"><img  class="img-thumbnail" src="../image/member/<?php echo $row['app_front'] ?>" width="600" , height="400" class="img-responsive"/></div>
<div style="float:right; width:50%"><img  class="img-thumbnail" src="../image/member/<?php echo $row['app_back'] ?>" width="600", height="400" class="img-responsive"></div>
<div style="clear:both"></div>
<br>


    <div class="col-sm-12" style="background-color:#3c8dbc;">         
        <?php if ($row['app_front'] && $row['app_back'] !== '') { ?>
            <center>
            <input type="button" onclick="applicdelete(<?php echo $id ?>,'<?php echo $row['app_front'] ?>','<?php echo $row['app_back'] ?>')" value="Delete" />
            </center>
        <?php } 
        ?>
    </div>


<script>
    function applicdelete(id,image,image1)
    {
        url = "applicdelete.php?id="+id+"&image="+image+"&image1="+image1;
        title = "popup";
        var newWindow = window.open(url, title, 'scrollbars=yes, width=400, height=400');
    }
</script>