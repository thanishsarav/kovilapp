<?php include('header.php');
global $con;
$sql = "SELECT COUNT(*) as total FROM `$tbl_family` where `deleted`=0";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT COUNT(*) as total FROM `$tbl_child`";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);

$sql2 = "SELECT COUNT(*) as total FROM `$tbl_child` where `c_marital_status`='No'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($result2);

$sql3 = "SELECT COUNT(*) as total FROM `$tbl_child` where `c_marital_status`='No' AND `c_gender`='male'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_array($result3);

$sql4 = "SELECT COUNT(*) as total FROM `$tbl_child` where `c_marital_status`='No' AND `c_gender`='female'";
$result4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_array($result4);


 ?>
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="col-sm-12">

        <div class="col-sm-5">
            <div id="box" class="box box-primary">
                <div class="box-body box-profile">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Families</b></h3>
                    </div><br>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b> Total Members: </b> <span class="pull-right" style="text-alaign:right" > <?php echo $row['total']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b> Total Children: </b> <span class="pull-right"><?php echo $row1['total']; ?> </span>
                        </li>
                        <li class="list-group-item">
                            <b> Total Unmarried :</b> <span class="pull-right"><?php echo $row2['total']; ?> </span>
                        </li>
                        <li class="list-group-item">
                            <b> Unmarried Male:</b> <span class="pull-right"><?php echo $row3['total']; ?> </span>
                        </li>
                        <li class="list-group-item">
                            <b> Unmarried Female:</b> <span class="pull-right"><?php echo $row4['total']; ?> </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<?php include('footer.php') ?>

