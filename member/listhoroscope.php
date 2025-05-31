<?php
include('../header.php');
//var_dump($_POST);
$id = (int) $_SESSION['id'] ?? null;
$rec_per_page = 25;
$curr_page = 1;
$offset = ($curr_page - 1) * ($rec_per_page);

$where = '';
if (isset($_POST['filter'])) {
    if ($_POST['reg_no'] != '') {
        $where .= " AND reg_no = " . $_POST['reg_no'];
    }
    if ($_POST['keyword'] != '') {
        $where .= " AND (name = '" . $_POST['keyword'] . "' OR mobile_no = '" . $_POST['keyword'] . "')";
    }
}

$sql_total = "SELECT count(*) as total FROM $tbl_matrimony where `deleted`=0 $where";
$result = mysqli_query($con, $sql_total);
$row = mysqli_fetch_array($result);
$total_records = $row['total'];
//echo $total_records . "<br>";
$total_pages = ceil($total_records / $rec_per_page);
//echo $total_pages;
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Horoscope list
               
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

<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-sm-6">

            <form method='POST'>
                <div class="row">
                    <div class="col-sm-4"><input type="text" name="reg_no" class="form-control" placeholder="Reg no">
                    </div>
                    <div class="col-sm-5"><input type="text" name='keyword' class="form-control"
                            placeholder="Name/Mobile No"></div>

                    <input type="hidden" name="filter">
                    <div class="col-sm-3"> <button type="submit" name="submit" class="btn btn-info">Search</button>
                    </div>
                </div>
            </form>
        </div>


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
                                    <th width="3%">S.No</th>
                                    <th width="7%">Photo</th>
                                    <th width="13%">Name & Reg.No</th>
                                    <th width="13%">Personal details</th>
                                    <th width="11%">Horo details</th>
                                    <th class="col-sm-1">status</th>
                                    <th class="col-sm-2">Address</th>
                                    <th class="col-sm-2">Other Details</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $result = get_horo_list($where);
                                $counter = 0;
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><img src="../image/horo/<?php echo $row['photo'] ?>" width="300" height="300"
                                                    alt=''  class="img-thumbnail"/></td>
                                            <td><a id="a"
                                                    href="viewhoroscope.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>&<?php echo $row['reg_no']; ?>
                                            </td>
                                            <td><?php echo $row['qualification'] . "<br>" . $row['occupation'] ?></td>
                                            <td><?php
                                            //var_dump($row); 
                                            //echo 'test';
                                            echo get_raasi($row['raasi']);
                                            echo "<br>";
                                            echo get_star($row['star']);
                                            echo "<br>";
                                            echo ($row['raaghu_kaedhu'] > 0) ? "Yes" : "No";
                                            echo "<br>";
                                            echo ($row['sevvai'] > 0) ? "Yes" : "No";
                                            ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><?php echo $row['mobile_no'] . "<br>" . $row['email'] . "<br>" . $row['address'] ?>
                                            </td>
                                            <td><?php echo get_kulam($row['kulam']) . "<br>" . $row['temple'] . "<br>" . $row['height'] ?>
                                                Cms<br><?php echo $row['weight'] ?> Kgs</td>
                                        </tr>

                                        <?php
                                    }
                                }
                                mysqli_close($con);
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Sales chart -->
    <script>
        function addhoro() {
            url = "addhoroscope.php?ref_id=<?php echo $id ?>& mbl_no=<?php echo $row['mobile_no'] ?>&ref_name=<?php echo $row['name'] ?>&ref_address=<?php echo $row['village'] ?>";
            title = "popup";
            var width = 90 / 100 * screen.width;
            var newWindow = window.open(url, title, 'scrollbars=yes,width=' + width + ' height=500 ');
        }



    </script>
   
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
 
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- customizer Panel -->
<!-- ============================================================== -->

<?php include('../footer.php') ?>