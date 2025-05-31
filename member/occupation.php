<?php include('../header.php');
global $con;
$sql = "SELECT DISTINCT occupation, count(*) as cnt FROM $tbl_family  WHERE occupation <> ' ' group by occupation ORDER BY occupation ASC";
$result_occ = mysqli_query($con, $sql);

$counter = 0;
$occupation = '';
if (isset($_GET['occupation'])) {
    $occupation = $_GET['occupation'];

    $sql1 = "SELECT count(*) as cnt FROM $tbl_family WHERE  occupation='$occupation'";
    $count_res = mysqli_query($con, $sql1);
    $count = mysqli_fetch_array($count_res);
    $sql2 = "SELECT * FROM $tbl_family WHERE  occupation='$occupation'";
    $result = mysqli_query($con, $sql2);
}
?>


<div class="page-breadcrumb">
    <div class="row">
        <!-- <div class="col-12 align-self-center">
                        <h4 class="page-title"> </h4>
                    </div> -->
        <div class="col-md-12 align-self-center" style="border-bottom: 2px double gray;">
            <div class="container-fluid">
                <h2 class=" text-center">List By Occupation</h2>
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

                <div class="col-sm-19 ">
                    <div class="card ">
                        <div class="card-header bg-primary  " style="color: rgb(243, 244, 245);">
                            Occupation
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php
                                        if (!$result_occ) {
                                            echo 'No records found';
                                        } else {
                                            echo '<ul id="listby" class="list-group list-group-unbordered">';
                                            ?>
                                            <li id="listby" class="list-group-item">
                                                <b><a href="occupation.php">All</a></b>
                                            </li>
                                            <?php
                                            $active = '';
                                            while ($row = mysqli_fetch_array($result_occ)) {
                                                if ($row['occupation'] == $occupation) {
                                                    $active = ' cls_active ';
                                                } else {
                                                    $active = '';
                                                } ?>
                                                <li id="listby" class="list-group-item <?php echo $active ?>">
                                                    <b><a href="occupation.php?occupation=<?php echo $row['occupation'] ?>"><?php echo get_occupation($row['occupation']) ?>
                                                            (<?php echo $row['cnt'] ?>)</a></b>
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
        <?php if ($occupation) {
            ?>
           
              
                <div class=" col-sm-10 ">
                    <div class="card ">



                        <div class="card-body">

                            
                                <div class="table-responsive">
                                     <caption>
                    <b>Search Results for <?php echo get_occupation($occupation); ?>
                        (<?php echo $count['cnt']; ?>)</b>
                </caption>
                                    <table class="table table-hover">
                                       
                                        <thead>
                                            <tr>
                                                <th width="40%">S.no</th>
                                                <th width="40%">Personal Details</th>
                                                <th width="80%">Address</th>
                                                <th width="40%">Occupation </th>
                                                <th width="40%">Other details</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo ++$counter; ?></td>
                                                    <td>
                                                        <a id="a" href="veiwmembers.php?id=<?= $row['id'] ?? '' ?>">
                                                            <?= $row['name'] ?? '' ?>
                                                        </a><br>
                                                        S/O
                                                        <?= ($row['father_name'] ?? '') . "<br>" . ($row['mother_name'] ?? '') . "<br>" . ($row['mobile_no'] ?? '') ?>
                                                    </td>
                                                    <td class="data">
                                                        <?php echo str_replace(",", ", <br>", $row['permanent_address'] ?? ''); ?>
                                                    </td>
                                                    <td><?php echo $row['occupation'] ?? ''; ?></td>
                                                    <td>
                                                        <?php
                                                        echo ($row['education_details'] ?? '') . "<br>";
                                                        echo isset($row['blood_group']) ? get_blood_group($row['blood_group']) : '' . "<br>";
                                                        echo $row['pudavai'] ?? '';
                                                        ?>
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
                    <?php
        } else {
            $sql3 = "SELECT * FROM $tbl_family order by occupation";
            $result = mysqli_query($con, $sql3);
            ?>

                    <div class=" col-sm-10 ">

                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="4%">S.no</th>
                                                <th width="15%">Personal Details</th>
                                                <th width="20%">Address</th>
                                                <th width="13%">Occupation </th>
                                                <th width="17%">Other details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$counter; ?></td>
                                                    <td><a id="a" href="veiwmembers.php?id=<?php echo $row['id'] ?> ">
                                                            <?php echo $row['name'] ?> </a><br> S/O
                                                        <?php echo $row['father_name'] . "<br>" . $row['mother_name'] . "<br>" . $row['mobile_no'] ?>
                                                    </td>
                                                    <td class="data">
                                                        <?php echo str_replace(",", ", <br>", $row['permanent_address'] ?? ''); ?>
                                                    </td>
                                                    <td><?php echo $row['occupation'] ?? ''; ?></td>
                                                    <td>
                                                        <?php
                                                        echo ($row['education_details'] ?? '') . "<br>";
                                                        echo isset($row['blood_group']) ? get_blood_group($row['blood_group']) : '' . "<br>";
                                                        echo $row['pudavai'] ?? '';
                                                        ?>
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