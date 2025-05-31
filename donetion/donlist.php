<?php include('../header.php');
$id = $_SESSION['id'];
//$start_from = ($page-1) * $num_rec_per_page; 
$result = list_donetion(); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Event list</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn waves-effect waves-light btn-primary" onclick="addevent()">Add</button>
            </div>
        </div>
    </div>
</div>
<script>
    function addevent() {
        url = "adddo.php";
        title = "popup";
        var newWindow = window.open(url, title, 'scrollbars=yes, width=1000 height=500');
    }
</script>
<div class="container-fluid">
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="complex_head_col" class="table table-striped table-bordered display"
                            style="width:100%">
                            <thead class="bg-success text-white">

                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Total amount</th>
                                    <th>Remaining amount</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td class="col-md-2"><?php echo $row['id'] ?></td>
                                        <td class="col-md-1"><?php echo $row['name'] ?></td>
                                        <td class="col-md-1"><?php echo $row['year'] ?></td>
                                        <td class="col-md-1"><?php echo $row['total_amount'] ?></td>
                                        <td class="col-md-2"><?php echo $row['remaining_amount'] ?></td>
                                        <td class="col-md-2"><?php echo $row['status'] ?></td>
                                        <td width="10%">
                                            <a id="a" href="dondetails.php?event_id=<?php echo $row['id'] ?>"><span
                                                    class="fas fa-eye"></span></a>-<a href="#" id="a"
                                                onclick="updatedo(<?php echo $row['id'] ?>)"><span
                                                    class="far fa-edit"></span></a>-<a href="#" id="a"
                                                onclick="deletedo(<?php echo $row['id'] ?>)"> <span
                                                    class=" fas fa-trash-alt"></span></a>
                                    </tr>
                                    <script>
                                        function deletedo(id) {
                                            //alert("Do you want to upload husband photo?");
                                            url = "dltdo.php?id=" + id;
                                            title = "popup";
                                            var newWindow = window.open(url, title, 'scrollbars=yes, width=1000 height=500');
                                        }
                                    </script>
                                    <script>
                                        function updatedo(id) {
                                            url = "updatedo.php?id=" + id;
                                            title = "popup";
                                            var newWindow = window.open(url, title, 'scrollbars=yes, width=1000 height=500');
                                        }
                                    </script>
                                    <?php
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