<?php include('../header.php');
$result = get_users();?>
<div class="page-breadcrumb">
    <div class="row">

        <div class="col-2 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <h2 class="page-title">User List</h2>
            </div>
            
        </div>
        <div class="col-10 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <button type="button" class="btn btn-outline-primary" onclick="adduser()"><span
                            class="fas fa-upload"></span></button>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
        <hr>
    </div>
</div>
<script>
    function adduser() {
        url = "adduser.php";
        title = "popup";
        var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=500');
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
                            <thead>
                                <tr>
                                    <th rowspan="2">Username</th>
                                    <th rowspan="2">Role</th>
                                    <th rowspan="2">Mobile no</th>
                                    <th rowspan="2">Email</th>
                                    <th rowspan="2">Profile_id</th>
                                    <th rowspan="2">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['role'] ?></td>
                                        <td><?php echo $row['mobile_no'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['profile_id'] ?></td>
                                        <td>
                                            <a id="a" href="viewuser.php?id=<?php echo $row['id'] ?>"><span
                                                    class="fas fa-eye"></span></a>

                                            <a id="a" href="updateuser.php?id=<?php echo $row['id'] ?>"><span
                                                    class="m-r-10 mdi mdi-pencil-box-outline"></span></a>
                                            <a id="a" onclick="deleteuser()"><span class="fas fa-trash-alt"></span></a>
                                        </td>
                                    </tr>
                                    <script>
                                        function deleteuser() {
                                            url = "usrdelete.php?id=<?php echo $row['id'] ?>";
                                            title = "popup";
                                            var newWindow = window.open(url, title, 'scrollbars=yes, width=500 height=500');
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


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include('../footer.php') ?>