<?php include('../header.php');
 $result = get_labels();
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Label List</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <div><?php echo "<h4><i><b>Total Records:" . count($result). "</b></i></h4>"; ?></div>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

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
                                    <th rowspan="2">Display name</th>
                                    <th rowspan="2">Slug</th>
                                    <th rowspan="2" >Type</th>
                                    <th rowspan="2" >Category</th>
                                    <th rowspan="2"  >ParentId</th>
                                    <th rowspan="2">Order</th>
                                    <th rowspan="2"  >Actions</th>

                                </tr>
                                <tr>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($result){
                                    
                              foreach($result as $k => $row){
                                    ?>
                                    <tr>          
                                        <td><?php echo $row['display_name'] ?></td>
                                        <td><?php echo $row['slug'] ?></td>
                                        <td><?php echo $row['type_name'] ?></td>
                                        <td><?php echo $row['category'] ?></td>
                                        <td ><?php echo $row['parent_id'] ?></td>
                                        <td><?php echo $row['order'] ?></td>
                                        <td>
                                       
                                        
                                         <a id="a" href="javascript:void(0);"   onclick="updatelabel(<?php echo $row['id'] ?>)" ><span class="m-r-10 mdi mdi-pencil-box-outline" ></span></a> 
                                         <a href="#" id="a" onclick="deletelabel(<?php echo $row['id'] ?>)"> <span class="fas fa-trash-alt" ></span></a>
                                        </td>
                                       
                                    </tr>
                               
                                <?php
                                }}
                            
                            ?>
 <script>
                                    function deletelabel(id)
                                    {
                                        url = "dltlabel.php?id="+id;
                                        title = "popup";
                                        var newWindow = window.open(url, title, 'scrollbars=yes, width=800 height=400');
                                    }
                                </script> 
                                <script>
                                    function addlabel()
                                    {
                                        url = "addlabel.php";
                                        title = "popup";
                                        var newWindow = window.open(url, title, 'scrollbars=yes, width=800 height=400');
                                    }
                                </script> 
                                <script>
                                    function updatelabel(id)
                                    {
                                        url = "updatelebel.php?id="+id;
                                        title = "popup";
                                        var newWindow = window.open(url, title, 'scrollbars=yes, width=800 height=400');
                                    }
                                </script> 


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