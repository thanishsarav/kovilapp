<?php
include('../header.php');
global $con;
$sql="SELECT DISTINCT village, count(*) as cnt  FROM $tbl_family  WHERE village  <> ' ' group by village ORDER BY village ASC";
$result = mysqli_query($con,$sql);
$village='';
if (isset($_GET['village']))
        $village = $_GET['village'];
?>

<div class="page-breadcrumb">
    <div class="row">
        <!-- <div class="col-12 align-self-center">
                        <h4 class="page-title"> </h4>
                    </div> -->
        <div class="col-md-12 align-self-center" style="border-bottom: 2px double gray;">
            <div class="container-fluid">
                <h2 class=" text-center">List By Village</h2>
            </div>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->
<div id="list" class="col-sm-12">
    <div class="row" id="list">


        <div class="box" id="list">
            <div class="box-body">

                <div class="col-sm-10 ">
                    <div class="card ">
                        <div class="card-header bg-primary  " style="color: rgb(243, 244, 245);">
                            villages
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                       <?php
        if (!$result) {
            echo 'No records found';
        } else {
            echo '<ul id="listby" class="list-group list-group-unbordered">';
              ?>
            <li id="listby" class="list-group-item">			
                <b><a href="village.php">All</a></b>
            </li>
             <?php
                       $active = '';
                while ($row = mysqli_fetch_array($result)) {
                if($row['village'] == $village )
                    $active = ' cls_active ';
                else
                    $active ='';
                ?>
                <li  id="listby"class="list-group-item <?php echo $active ?>">		
                    <b><a href="village.php?village=<?php echo $row['village'] ?>"><?php echo $row['village'] ?> (<?php echo $row['cnt'] ?>)</b></a>
                </li>

                <?php
            }
            echo '</ul>';
        }
        ?>     		

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
       $counter = 0;
          if($village){
     $sql2 = "SELECT count(*) as cnt FROM $tbl_family WHERE  village='$village'";
            $count_res = mysqli_query($con,$sql2);
            $count = mysqli_fetch_array($count_res);
            $sql3="SELECT * FROM $tbl_family WHERE village='$village'";
        $result = mysqli_query($con,$sql3);
        ?>


            <div class=" col-sm-8 " style="margin-left: 0px;">
                <div class="card ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <caption>
                               <b>Search Results for  <?php echo $village; ?> (<?php echo $count['cnt']; ?>)</b>
                            </caption>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="4%">S.no</th>
                                        <th width="15%">Personal Details</th>
                                        <th width="20%">Address</th>
                                        <th width="15%">Other details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><a id="a" href="veiwmembers.php?id=<?php echo $row['id'] ?> ">
                                                    <?php echo $row['name'] ?> </a><br>S/O
                                                <?php echo $row['father_name'] . "<br>" . $row['mother_name'] . "<br>" . $row['mobile_no'] ?>
                                            </td>
                                            <td><?php echo $row['permanent_address'] ?></td>
                                            <td><?php echo get_qualification($row['qualification']) . "<br>" . get_blood_group($row['blood_group']) . "<br>" . $row['pudavai'] . "<br>" . $row['village'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                </div>
                <?php
        } else {
            $sql4 = "SELECT * FROM $tbl_family order by village";
            $result = mysqli_query($con, $sql4);
            ?>
                <div class=" col-sm-8 ">

                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="4%">S.no</th>
                                            <th width="15%">Personal Details</th>
                                            <th width="20%">Address</th>
                                            <th width="15%">Other details</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><a id="a" href="veiwmembers.php?id=<?php echo $row['id'] ?> ">
                                                        <?php echo $row['name'] ?> </a><br> S/O
                                                    <?php echo $row['father_name'] . "<br>" . $row['mother_name'] . "<br>" . $row['mobile_no'] ?>
                                                </td>
                                                <td><?php echo $row['permanent_address'] ?></td>
                                                <td><?php echo get_qualification($row['qualification']) . "<br>" . get_blood_group($row['blood_group']) . "<br>" . $row['pudavai'] . "<br>" . $row['village'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                    }
        }
        ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include('../footer.php') ?>