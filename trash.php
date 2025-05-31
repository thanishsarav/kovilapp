<?php

include('header.php');
global $con;
if (($_SESSION['username']) != 'admin') {
  echo "<br>" . "<br>" . "<br>" . 'You are not authorized to visit this page!';
  die;
}

if (!isset($_SESSION['username'])) {
  echo 'You are not logged in<a href="index.php">Visit Login Page</a>';
  die;
}
global $tbl_family;
$con = connectdb();
if (!empty($tbl_family)) {
    $sql = "SELECT * FROM `$tbl_family` WHERE `deleted`=1";
    $result = mysqli_query($con, $sql);
} else {
    die("Table name is not defined.");
}
$family1 = array();
//$i=0;
while ($row = mysqli_fetch_array($result)) {
  $fam['name'] = ($row['name']);
  $fam['mobile_no'] = ($row['mobile_no']);
  $fam['w_name'] = ($row['w_name']);
  $fam['father_name'] = ($row['father_name']);
  $fam['mother_name'] = ($row['mother_name']);
  $fam['permanent_address'] = ($row['permanent_address']);
  $family1[$row['id']] = $fam;
  //$i++;
  //echo count($fam);
}
//var_dump($family1[10]);
$sql1 = "SELECT * from `$tbl_child` ";
$result1 = mysqli_query($con,$sql1);
while ($row = mysqli_fetch_array($result1)) {
  $children['c_name'] = $row['c_name'];
  $children['c_mobile_no'] = $row['c_mobile_no'];
  $children1[$row['father_id']][] = $children;
  //$children[$row['father_id']][] ['c_name']=$row['c_name'];	
//$children[$row['father_id']][] ['c_mobile_no']=$row['c_mobile_no'];	
}
//echo count($children);
//var_dump($children1[11]);
?>

<div class="container-fluid">
    <?php
  $query = "SELECT count(*) AS total FROM  `$tbl_family`";
  $count = mysqli_query($con,$query);
  $values = mysqli_fetch_assoc($count);
  $num_rows = $values['total'];
  //echo "<b>Families=$num_rows</b>";
  ?>
    <div class="col-md-6 col-sm-12">
        <div class="card  card-hover">
            <div class="card-header bg-success">
                <h4 class="m-b-0 text-white">Trash</h4>
            </div>
            <div class="card-body">
                <ul class="list-style-none">

                    <li class="card-text">
                        <a href="memtrash.php">
                            <i class="ti-trash"></i> <span>Member</span>
                        </a>
                    </li>
                    
                </ul>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->

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