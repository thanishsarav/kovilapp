<?php include('../header.php');
$event = $_GET['event_id'];
$row = get_donation($event);
$result = list_donetion1($event);

?>



<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Donation list</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn waves-effect waves-light btn-primary" onclick="adddo()">Add</button>
            </div>
        </div>
    </div>
</div>
<script>
    function adddo() {
        url = "addo_1.php?event_id=<?php echo$event ?>";
        title = "popup";
        var newWindow = window.open(url, title, 'scrollbars=yes, width=1000 height=500');
    }
</script>
<div class="container-fluid">



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="border-bottom: 1px outset green;">
                    <h2 class="card-title"> Donetion details for <?php echo $row['name']; ?> in
                        <?php echo $row['year']; ?> </h2>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="complex_head_col" class="table table-striped table-bordered display"
                            style="width:100%">
                            <thead class="bg-success text-white">

                                <tr>
                                    <th>S.no</th>
                                    <th>Member Name</th>
                                    <th>Date</th>
                                    <th>Recept number </th>
                                    <th>Book number</th>
                                    <th>Amount</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td class="col-md-2"><?php echo $row['id'] ?></td>
                                        <td class="col-md-1"><?php echo $row['member_no'] ?></td>
                                        <td class="col-md-1"><?php echo $row['date'] ?></td>
                                        <td class="col-md-1"><?php echo $row['recept_no'] ?></td>
                                        <td class="col-md-2"><?php echo $row['book_no'] ?> </td>
                                        <td class="col-md-2"><?php echo $row['amount'] ?></td>
                                        <td width="10%">
                                           <a href="#" id="a"
                                                onclick="updatedo(<?php echo $row['id'] ?>)"><span
                                                    class="far fa-edit"></span></a>-<a href="#" id="a"
                                                onclick="deletedo(<?php echo $row['id'] ?>)"> <span
                                                    class=" fas fa-trash-alt"></span></a>
                                    </tr>
                                    <script>
                                        function deletedo(id) {
                                            //alert("Do you want to upload husband photo?");
                                            url = "dltdo_1.php?id=" + id;
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
    </div>


</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php include('../footer.php') ?>