<?php include('../header.php');
global $rec_per_page;
$rec_per_page = 50;
$curr_page = 1;
$offset = ($curr_page - 1) * ($rec_per_page);


$where = '';
if (isset($_POST['filter'])) {

    if ($_POST['member_id'] != '') {
        $where .= " and member_id = " . $_POST['member_id'];
    }
    if ($_POST['keyword'] != '') {
        $where .= " and (name like '%" . $_POST['keyword'] . "%' OR mobile_no like '%" . $_POST['keyword'] . "%' ) ";
    }
}

$family = get_families($where);
$children = get_children();

$sql_total = "SELECT count(*) as total FROM $tbl_family  where `deleted`=0 $where ";
$result = mysqli_query($con, $sql_total);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];


//echo $total_pages; ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Family members <div class="btn-group btn-group-lg">
                    <button type="button" class="btn btn-outline-primary" onclick="print()"><span
                            class="fas fa-print"></span></button>
                    <button type="button" class="btn btn-outline-primary" onclick="addmember()"><span
                            class="fas fa-upload"></span></button>


                </div>
            </h4>

        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <div><?php echo "<h4>Total members:" . $total_records . "</h4>"; ?></div>


                        </li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
    function addmember() {
        url = "addmembers.php";
        title = "popup";
        var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=500');
    }

</script>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-sm-6">

            <form method='POST'>
                <div class="row">
                    <div class="col-sm-4"><input type="text" name="member_id" class="form-control"
                            placeholder="member_id">
                    </div>
                    <div class="col-sm-5"><input type="text" name='keyword' class="form-control"
                            placeholder="Name/Mobile No"></div>

                    <input type="hidden" name="filter">
                    <div class="col-sm-3"> <button type="submit" name="submit" class="btn btn-info"><span
                                class="fas fa-search"></span>Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="complex_head_col" class="table table-striped table-bordered display"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Id</th>
                                        <th rowspan="2">Photo</th>
                                        <th rowspan="2">Name&Mobile&Parent</th>

                                        <th rowspan="2">Address</th>
                                        <th rowspan="2">childrens</th>


                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    if ($family) {
                                        foreach ($family as $k => $v) {
                                            echo '<tr>';
                                            echo "<td>";
                                            echo ++$counter;
                                            echo "</td>";
                                            ?>


                                            <td><br>
                                                <img src="../image/member/<?php echo $v['image'] ?>" id="img" width="100"
                                                    height="100" class=" profile-user-img "
                                                    style="border:1px solid darkblue;border-radius:5%" />
                                            </td>

                                            <td><a id="a"
                                                    href="veiwmembers.php?id=<?php echo $k ?>"><?php echo $v['name'] . "<br>" . $v['mobile_no'] . "<br>" . $v['member_id'] . "<br>" . $v['father_name'] . " <br>" . $v['mother_name'] ?></a>
                                            </td>



                                            <?php

                                            echo "<td>" . str_replace("\n", "<br />", $v['permanent_address'] . '<br/>' . $v['current_address']) . "</td>";
                                            echo "<td>";
                                            if (isset($children[$k])) {
                                                $c = $children[$k];
                                                foreach ($c as $k1 => $v1) {
                                                    echo $v1['c_name'] . " ( " . $v1['c_age'] . " ) ";
                                                    echo "<br>";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            echo "</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Sales chart -->
        <!-- ============================================================== -->

        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Email campaign chart -->

        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->

<?php include('../footer.php') ?>