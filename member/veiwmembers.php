<?php
include('../header.php');

$id = (int) $_GET['id'] ?? null;
$where = '';
$rec_per_page = 20;
$curr_page = 1;


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'generate_id') {
        generate_member_id($id);
    }
}

$row = get_member($id);
// echo $row['id'];
$sql_total = "SELECT count(*) as total FROM $tbl_family where `deleted`=0 $where";
$result = mysqli_query($con, $sql_total);
$row1 = mysqli_fetch_assoc($result);
$total_records = $row1['total'];
//echo $total_records . "<br>";
$total_pages = ceil($total_records / $rec_per_page);
//echo $total_pages;
?>



<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <h2 class="page-title text-info "> <?php echo $row['name'] ?> குடும்பம்</h2>

            </div>
        </div>
        <div class="col-12 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <div class="btn-group btn-group-lg">
                    <button type="button" class="btn btn-outline-primary" onclick="print()"><span
                            class="fas fa-print"></span></button>
                    <button type="button" class="btn btn-outline-primary"
                        onclick="deletemember(<?php echo $row['id'] ?>)"><span class="fas fa-trash"></span></button>
                    <button type="button" class="btn btn-outline-primary"
                        onclick="updatemember(<?php echo $row['id'] ?>)"><span
                            class=" fas fa-pencil-alt"></span></button>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- ------------------------- content----------------- -->

<div class="container-fluid">
    <script>
        function updatemember(id) {
            url = "updatemember.php?id=" + id;
            title = "popup";
            var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=500');
        }

    </script>
    <script>
        function deletemember(id) {
            url = "deletemember.php?id=" + id;
            title = "popup";
            var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=500');
        }

    </script>

    <div class="row ">
        <!-- -------------------- card--------------- -->

        <div class=" col-xlg-900 col-md-12 col-sm-12">
            <a href="javascript:void(0)" class="service-panel-toggle"></a>
            <div class="card">
                <!-- ----------------------tabs--------------------- -->
                <ul class="nav customizer-tab" id="pills-tab" role="tablist"
                    style="border-bottom:1px solid forestgreen">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#profile" role="tab"
                            aria-controls="pills-timeline" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#horoscope" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Horoscope</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#donation" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Donetion</a>
                    </li>

                </ul>
                <!-- ---------------------------tab content-------------- -->
                <div class="tab-content" id="userContent">
                    <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <div class="row">
                                <!-- ---------------------husband-------------- -->
                                <div class="col-md-7 col-sm-12">
                                    <div class="card " style="border:1px inset #1c3a6f">
                                        <div class="card-header bg-primary">
                                            <h4 class="m-b-0 text-white"><b>குடும்ப தலைவர் </b></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h3 class="card-title">Photo</h3>
                                                        <img src="../image/member/<?php echo $row['image'] ?>"
                                                            width="150" height="150" class=" profile-user-img "
                                                            style="border:1px solid darkblue;border-radius:5%"><br><br>
                                                        <div class="btn-group btn-group" width="150px">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                onclick="husband()">Upload+</button>
                                                            <button type="button" class="btn btn-outline-primary"
                                                                onclick="himagedelete()">Delete-</button>
                                                        </div>
                                                        <script>
                                                            function husband() {
                                                                //alert("Do you want to upload husband photo?");
                                                                url = "himageupload.php?id=<?php echo $id ?>";
                                                                title = "popup";
                                                                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
                                                            }
                                                        </script>
                                                        <script>
                                                            function himagedelete() {
                                                                url = "himagedelete.php?id=<?php echo $row['id'] ?> &h_image=<?php echo $row['image'] ?>";
                                                                title = "popup";
                                                                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
                                                            }
                                                        </script>
                                                    </div>


                                                    <div class="col-sm-8">

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Name</td>
                                                                        <td><?php display("name", $row) ? "name" : " " ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Father name</td>
                                                                        <td><?php display("father_name", $row) ? "father_name" : " " ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Mother name</td>
                                                                        <td><?php display("mother_name", $row) ? "mother_name" : " " ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Education</td>
                                                                        <td><?php echo get_qualification($row['qualification']) ?>
                                                        </div>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Education details</td>
                                                            <td><?php display("education_details", $row) ? "education_details" : " " ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Occupation</td>
                                                            <td><?php echo get_occupation($row['occupation']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Occupation details</td>
                                                            <td><?php display("occupation_details", $row) ? "occupation_details" : " " ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <td><?php display("mobile_no", $row) ? "mobile_no" : " " ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>E-mail</td>
                                                            <td><?php display("email", $row) ? "email" : " " ?> </td>
                                                        </tr>


                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- -------------------------------address------------- -->
                            <div class="col-md-5 col-sm-12">
                                <div class="card " style="border:1px inset #1c3a6f">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white"><b> முகவரி </b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Permanent address</td>
                                                                <td><?php display("permanent_address", $row) ? "permanent_address" : " " ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Current address</td>
                                                                <td><?php display("current_address", $row) ? "current_address" : " " ?>
                                                                </td>
                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function wife() {
                                //alert("Do you want to upload wife photo?");
                                url = "wimageupload.php?id=<?php echo $id ?>";
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
                            }
                        </script>
                        <script>
                            function wdelete() {
                                url = "wimagedelete.php?id=<?php echo $row['id'] ?> &w_image=<?php echo $row['w_image'] ?>";
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=400');
                            }
                        </script>
                        <div class="row">
                            <!-- -------------wife-------- -->
                            <div class="col-md-7 col-sm-12">
                                <div class="card " style="border:1px inset #1c3a6f">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white"><b>குடும்ப தலைவி </b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h3 class="card-title">Photo</h3>
                                                    <img src="../image/member/<?php echo $row['w_image'] ?>" width="150"
                                                        height="150" class=" profile-user-img "
                                                        style="border:1px solid darkblue;border-radius:5%"><br><br>
                                                    <div class="btn-group btn-group" width="150px">
                                                        <button type="button" class="btn btn-outline-primary"
                                                            onclick="wife()">Upload+</button>
                                                        <button type="button" class="btn btn-outline-primary"
                                                            onclick="wdelete()">Delete-</button>
                                                    </div>
                                                </div>
                                                <div class=" col-sm-8">

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name</td>
                                                                    <td><?php display("w_name", $row) ? "w_name" : " " ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kovil</td>
                                                                    <td><?php display("w_temple", $row) ? "w_temple" : " " ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>koolam</td>
                                                                    <td><?php echo get_kulam($row['w_kootam']) ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Education</td>
                                                                    <td><?php echo get_qualification($row['w_qualification']) ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Education details</td>
                                                                    <td><?php display("w_education_details", $row) ? "w_education_details" : " " ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Occupation</td>
                                                                    <td><?php echo get_occupation($row['w_occupation']) ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Occupation details</td>
                                                                    <td><?php display("w_occupation_details", $row) ? "w_occupation_details" : " " ?>
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ----------------member--------------- -->
                            <div class="col-md-5 col-sm-12">
                                <div class="card  " style="border:1px inset #1c3a6f">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white">Members</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>MemberID</td>
                                                                <td><?php echo $row['member_id']; ?></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------children----------------- -->
                        <?php
                        $num_rows = count_child($id);
                        //echo "<b>No of children=$num_rows</b>";
                        ?>
                        <script>
                            function addchildphoto(id, father_id) {
                                //alert("Do you want to upload photo?"+father_id+id);
                                url = "cimageupload.php?id=" + id + "&father_id=" + father_id;
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=700, height=400');
                            }

                            function cimagedelete(id, c_image) {
                                url = "cimagedelete.php?id=" + id + "&c_image=" + c_image;
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=700, height=400');
                            }

                            function cupdate(id) {
                                url = "childupdate.php?id=" + id;
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=1000, height=500');
                            }
                            function childdelete(id) {
                                url = "childdelete.php?id=" + id;
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
                            }

                            function linkfamily(id) {
                                url = "linkfamily.php?child_id=" + id;
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes,width=1050, height=550');
                            }

                        </script>
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="card " style="border:1px inset #1c3a6f">
                                    <div class="card-header bg-primary bg-gradient">
                                        <h4 class="m-b-0 text-white"><b>குழந்தைகள் { <?php echo $num_rows ?> }</b></h4>

                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $children = get_children($id);

                                        //var_dump($children);
                                        
                                        if ($children != '' && isset($children[$id])) {
                                            foreach ($children[$id] as $k => $v) {
                                                ?>

                                                <div class="container-fluid">

                                                    <div class=" col-sm-12">
                                                        <div class="card " style="border: 1px solid #1c3a6f;">

                                                            <div class="card-header bg-primary  " style="max-width: 100%;">
                                                                <div class="row">
                                                                    <div class="col-9">
                                                                        <h4 class=" text-white">
                                                                            <b>Name:<?php echo $v['c_name'] ?></b>
                                                                        </h4>
                                                                    </div>
                                                                    <div class=" col-3">
                                                                        <button
                                                                            onclick="cupdate(<?php echo $v['id'] ?>)">Edit</button>
                                                                        <button
                                                                            onclick="childdelete(<?php echo $v['id'] ?>)">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card body">

                                                                <div class="container-fluid">

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h3 class="card-title">Photo</h3>
                                                                            <img src="../image/member/<?php echo $v['c_image'] ?>"
                                                                                width="150" height="150"
                                                                                class=" profile-user-img "
                                                                                style="border:1px solid darkblue;border-radius:5%"><br><br>
                                                                            <div class="btn-group btn-group" width="150px">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-primary"
                                                                                    onclick="addchildphoto(<?php echo $v['id'] ?>,<?php echo $v['father_id'] ?>)">Upload+</button>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-primary"
                                                                                    onclick="cimagedelete(<?php echo $v['id'] ?>, '<?php echo $v['c_image'] ?>')">Delete-</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" col-sm-8">

                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Name</td>
                                                                                            <td> <?php display("c_name", $v) ? "c_name" : " " ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>DOB</td>
                                                                                            <td><?php display("c_dob", $v) ? "c_dob" : " " ?>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>Education</td>
                                                                                            <td><?php echo get_qualification($v['c_qualification']) ?>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>Occupation</td>
                                                                                            <td><?php echo get_occupation($v['c_occupation']) ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Marital Status
                                                                                            </td>
                                                                                            <td><?php display("c_marital_status", $v) ? "c_marital_status" : " " ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Mobile</td>
                                                                                            <td> <?php display("c_mobile_no", $v) ? "c_mobile_no" : " " ?>
                                                                                            </td>
                                                                                        </tr>


                                                                                    </tbody>
                                                                                </table>

                                                                            </div>
                                                                        </div>
                                                                        <?php $c_id = $children[$id] ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo 'நீங்கள் குழந்தைகளைச் சேர்க்க விரும்பினால், கீழே உள்ள இந்த பொத்தானைக் கிளிக் செய்யவும்.';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- -------------------------family tree----------------- -->
                            <div class="col-md-5 col-sm-12">
                                <div class="card " style="border:1px inset #1c3a6f;border-radius:5%">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white">Family tree</h4>
                                    </div>
                                    <div class="card-body">






                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- -------------------------others------------------ -->
                            <div class="col-md-7 col-sm-12" style="border-radius:10px">
                                <div class="card " style="border:1px inset #1c3a6f;border-radius:10px">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white"> <b>மற்றவை </b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Created by</td>
                                                                <td><?php display("created_by", $row) ? "created_by" : " " ?>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>Created date</td>
                                                                <td><?php display("created_date", $row) ? "created_date" : " " ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Family name</td>
                                                                <td><?php display("family_name", $row) ? "family_name" : " " ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Remark</td>
                                                                <td><?php display("remarks", $row) ? "remarks" : " " ?>
                                                                </td>
                                                            </tr>



                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->

                                </div>

                            </div>
                            <div class="col-md-5 col-sm-12" style="border-radius:10px">
                                <div class="card " style="border:1px inset #1c3a6f;border-radius:10px">
                                    <div class="card-header bg-primary">
                                        <h4 class="m-b-0 text-white"> <b>Admin notes</b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Notes</td>
                                                                <td></td>

                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->

                                </div>

                            </div>
                        </div>
                        <!-- ----------------add field----------------- -->

                    </div>
                    <center>
                        <div class="col-sm-12 " style="background-color:#1c3a6f">

                            <?php
                            if ($row['app_front'] && $row['app_back'] !== '') {
                                ?>
                                <button onclick="applicationview(<?php echo $id ?>)"> View application </button>
                            <?php } else { ?>
                                <button onclick="applicupload(<?php echo $id ?>)">Upload application </button>
                            <?php } ?>

                            <?php // <button onclick="applicationview()">View application</button>  ?>

                            <button onclick="addson()">Add Son</button>
                            <button onclick="adddaughter()">Add Daughter</button>
                            <button onclick="addhoro()">Add horoscope</button>
                            <script>
    /* function addchild()
     {
     url = "addchild.php?id=<?php echo $id ?>";
                                title = "popup";
                                var newWindow = window.open(url, title, 'scrollbars=yes,width=1000 height=500');
     }*/
                                function applicupload(id) {
                                    url = "applicationupload.php?id=" + id;
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes, width=500 height=500');
                                }
                                function updatehoro(id) {
                                    url = "updatehoroscope.php?id=" + id;
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes, width=500 height=500');
                                }
                                function addson() {
                                    url = "addson.php?id=<?php echo $id ?>";
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes,width=1000, height=550');
                                }
                                function adddaughter() {
                                    url = "adddaughter.php?id=<?php echo $id ?>";
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes,width=1000, height=550');
                                }
                                function applicationview() {
                                    url = "applicview.php?id=<?php echo $id ?>";
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes,width=1000 height=500 ');
                                }

                                function addhoro() {
                                    url = "addhoroscope.php?ref_id=<?php echo $id ?>& mbl_no=<?php echo $row['mobile_no'] ?>&ref_name=<?php echo $row['name'] ?>&ref_address=<?php echo $row['village'] ?>";
                                    title = "popup";
                                    var width = 90 / 100 * screen.width;
                                    var newWindow = window.open(url, title, 'scrollbars=yes,width=' + width + ' height=500 ');
                                }

                                function deletehoroscope(id) {
                                    url = "deletehoroscope.php?id=" + id;
                                    title = "popup";
                                    var newWindow = window.open(url, title, 'scrollbars=yes, width=600, height=500');
                                }

                            </script>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="horoscope" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class="col-sm-12" style="margin-top:20px;">
                            <div id="ppd" class="panel panel-default">
                                <div id="ph" class="panel-heading">
                                    <b>Horoscopes uploaded by this member</b>
                                </div>
                                <div id="bb" class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-sm-1">Photo</th>
                                                <th class="col-sm-2">Personal details</th>
                                                <th class="col-sm-2">Horo details</th>
                                                <th class="col-sm-1">status</th>
                                                <th class="col-sm-2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $horo_list = get_horo_by_member($id);

                                            foreach ($horo_list as $k => $v) {
                                                ?>
                                                <tr>
                                                    <td><img src="../image/<?php echo $v['photo'] ?>" class="img-thumbnail"
                                                            width="70"></td>
                                                    <td><?php echo $v['name'] . "<br>" . $v['qualification'] . "<br>" . $v['occupation'] ?>
                                                    </td>
                                                    <td> <?php
                                                    echo get_raasi($v['raasi']);
                                                    echo "<br>";
                                                    echo get_star($v['star']);
                                                    echo "<br>";
                                                    echo ($v['raaghu_kaedhu'] > 0) ? "Yes" : "No";
                                                    echo "<br>";
                                                    echo ($v['sevvai'] > 0) ? "Yes" : "No";
                                                    ?></td>
                                                    <td><?php echo $v['status'] ?></td>
                                                    <td>
                                                        <a id="a" href="viewhoroscope.php?id=<?php echo $k ?>"><span
                                                                class="fas fa-eye"></span></a>

                                                        <a id="a" onclick="updatehoro(<?php echo $k ?>)"><span
                                                                class="m-r-10 mdi mdi-pencil-box-outline"></span></a>
                                                        <a id="a" onclick="deletehoroscope(<?php echo $v['id'] ?>)"><span
                                                                class="fas fa-trash-alt"></span></a>
                                                    </td>

                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="donation" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="complex_head_col" class="table table-striped table-bordered display"
                                style="width:100%">
                                <thead>

                                    <tr>
                                        <th>MemberID</th>
                                        <th>Donetion</th>
                                        <th>Doneted by</th>
                                        <th>Doneted date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1234</td>
                                        <td>$4500</td>
                                        <td>கவின்</td>
                                        <td>12.12.2012</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- </div> -->
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