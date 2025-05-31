<?php include('../header.php');
global $con;
$sql = "SELECT DISTINCT qualification, count(*) as cnt  FROM $tbl_family WHERE qualification <> ' ' group by qualification ORDER BY qualification ASC"
;
$result = mysqli_query($con, $sql);
$qualification = '';
if (isset($_GET['qualification']))
    $qualification = $_GET['qualification'];
$counter = 0; ?>


<div class="page-breadcrumb">
    <div class="row">
        <!-- <div class="col-12 align-self-center">
                        <h4 class="page-title"> </h4>
                    </div> -->
        <div class="col-md-12 align-self-center" style="border-bottom: 2px double gray;">
            <div class="container-fluid">
                <h2 class=" text-center">List By Qualification</h2>
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
                            Qualification
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
                                                <b><a href="qualification.php">All</a></b>
                                            </li>
                                            <?php
                                            $active = '';
                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['qualification'] == $qualification)
                                                    $active = ' cls_active ';
                                                else
                                                    $active = '';
                                                ?>
                                                <li id="listby" class="list-group-item <?php echo $active ?>">
                                                    <b><a
                                                            href="qualification.php?qualification=<?php echo $row['qualification'] ?>"><?php echo get_qualification($row['qualification']) ?>
                                                            (<?php echo $row['cnt'] ?>)</b></a>
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
        if ($qualification) {
            $sql1 = "SELECT count(*) as cnt FROM $tbl_family WHERE  qualification='$qualification'";
            $count_res = mysqli_query($con, $sql1);
            $count = mysqli_fetch_array($count_res);
            $sql2 = "SELECT * FROM $tbl_family WHERE qualification='$qualification'";
            $result = mysqli_query($con, $sql2);
            ?>


            <div class=" col-sm-10 ">
                <div class="card ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <caption>
                                <b>Search Results for <?php echo get_qualification($qualification); ?>
                                    (<?php echo $count['cnt']; ?>)</b>
                            </caption>
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th width="4%">S.no</th>
                                        <th width="15%">Personal Details</th>
                                        <th width="20%">Address</th>
                                        <th width="15%">Education </th>
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
                                            <td><?php echo $row['education_details'] ?></td>

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
                <?php
        } else {
            $sql3 = "SELECT * FROM $tbl_family order by qualification";
            $result = mysqli_query($con, $sql3);
            ?>

                <div class=" col-sm-10 ">

                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th width="4%">S.no</th>
                                                <th width="15%">Personal Details</th>
                                                <th width="20%">Address</th>
                                                <th width="15%">Education </th>
                                                <th width="15%">Other details</th>
                                            </tr>
                                        </thead>
                                    <tbody><?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><a id="a" href="veiwmembers.php?id=<?php echo $row['id'] ?> ">
                                                    <?php echo $row['name']??'' ?> </a><br>S/O
                                                    <?php
                                                    echo htmlspecialchars($row['father_name'] ?? '') . "<br>" .
                                                        htmlspecialchars($row['mother_name'] ?? '') . "<br>" .
                                                        htmlspecialchars($row['mobile_no'] ?? '');
                                                    ?>
</td>
                                                <td><?php echo $row['permanent_address'] ?? '' ?></td>
                                                <td><?php echo $row['education_details'] ?? '' ?></td>
                                                <td>
                                                    <?php
                                                    echo get_qualification($row['qualification']) . "<br>" .
                                                        get_blood_group($row['blood_group'] ?? '') . "<br>" .
                                                        htmlspecialchars($row['pudavai'] ?? '') . "<br>" .
                                                        htmlspecialchars($row['village'] ?? '');
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