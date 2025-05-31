<?php

include('header.php');

if (($_SESSION['username'])!='admin')
{
 echo "<br>"."<br>"."<br>".'You are not authorized to visit this page!';
 die;
}

if (!isset($_SESSION['username']))
{
 echo 'You are not logged in<a href="index.php">Visit Login Page</a>';
 die; 
}
$con=connectdb();

//$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM `$tbl_family` WHERE `deleted`=1"; 
$result = mysqli_query ($con,$sql);
$family1 = array();
//$i=0;
while($row = mysqli_fetch_array($result))
{	
$fam ['name'] =($row['name']);	
$fam ['mobile_no']  =($row['mobile_no']);
$fam ['w_name'] =($row['w_name']);
$fam ['father_name']=($row['father_name']);
$fam ['mother_name']=($row['mother_name']);
$fam ['permanent_address']=($row['permanent_address']);
$family1[$row['id']]=$fam;
	//$i++;
	//echo count($fam);
}
//var_dump($family1[10]);
$sql1 = "SELECT * from `$tbl_child` "; 
$result1 = mysqli_query ($con,$sql1);
while($row = mysqli_fetch_array($result1))
{
$children['c_name']=$row['c_name'];	
$children['c_mobile_no']=$row['c_mobile_no'];	
$children1[$row['father_id']][]=$children;
//$children[$row['father_id']][] ['c_name']=$row['c_name'];	
//$children[$row['father_id']][] ['c_mobile_no']=$row['c_mobile_no'];	
}
//echo count($children);
//var_dump($children1[11]);
?>	
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Trash members </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">trash</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <?php
$query = "SELECT count(*) AS total FROM  `$tbl_family`"; 
$count = mysqli_query($con,$query); 
$values = mysqli_fetch_assoc($count); 
$num_rows = $values['total']; 
//echo "<b>Families=$num_rows</b>";
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover">
                <thead>
                <tr>
                 <th width="5%">S.No</th>
				 <th width="20%">Name,Wife name& mobile </th>
				<th width="15%">Parent name</th>
				 <th width="25%">Permanent address</th>
				 <th width="18%">Child name</th>
				<th width="17%">Action</th>					
                </tr>
                </thead>
                <tbody id="tbody">
        <tr>
		<?php
		$counter = 0;
		foreach($family1 as $k=>$v)
		{
			
		echo"<td>";
		echo ++$counter; 
		echo"</td>";
		echo "<td>";
        echo $v['name'];
		echo "<br>";
        echo $v['w_name'] ;
        echo "<br>";
        echo $v['mobile_no'] ;
        echo "</td>";
        echo "<td>";
        echo $v['father_name'];
		echo " <br>";
        echo $v['mother_name']  ;
        echo "</td>";
		echo "<td>";
        echo $v['permanent_address']  ;
        echo "</td>";
		if (isset($children1[$k]))
		{
		$c=$children1[$k];		
		echo "<td>";
		foreach($c as $k1=>$v1)
		{
        echo $v1['c_name']  ; 
		echo "<br>";
		}
        echo "</td>";	
		}
		else
		{
        echo "<td>";	
		echo"-";
		}
        echo "</td>";	
		?>
	
	<td> <a id="a" onclick="deletemember()">  <i class="fas fa-trash"></i></a>	</td>
		</tr>
		 <script>
                function deletemember()
                {
                    url = "member/deletemember.php?id=<?php echo $k?>";
                    title = "popup";
                    var newWindow = window.open(url, title, 'scrollbars=yes, width=1000 height=500');
                }
            </script> 
		<?php
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

<?php include('footer.php') ?>