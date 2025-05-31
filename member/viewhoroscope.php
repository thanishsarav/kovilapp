<?php
include('../header.php');

$username = $_SESSION['username'];
$id = $_GET['id'];
$row = get_horoscope($id);
$row1 = get_attachments($id);
$row2 = get_member($row['ref_id']);
global $kattam;
$kattam = array();
$kattam = get_kattam($id);
$rasi = $kattam['rasi'] ?? null;
$amsam = $kattam['amsam'] ?? null;
?>
<div class="container-fluid">
    <div class="row">
        <script>
            function closeprofile() {
                url = "closeprofile.php?id=<?php echo $id ?>";
                title = "Close Horoscope ";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=800px, height=400px');
            }
        </script>
        <script>
            function deletehoroscope(rowid) {
                url = "deletehoroscope.php?id=" + rowid;
                title = "popup";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
            }
        </script>
        <script>
            function updatehoroscope(rowid) {
                url = "updatehoroscope.php?id=" + rowid;
                title = "popup";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
            }
        </script>
        <script>
            function reopen(rowid) {
                url = "viewhoroscope.php?id=" + rowid;
                title = "popup";
                var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
            }
        </script>
        <h2 class="container text-center" style="border-bottom:1px double #3c8dbc">Profile Details </h2>
        <hr>
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-primary" onclick="print()"><span
                    class="fas fa-print"></span></button>
            <button type="button" class="btn btn-outline-primary"
                onclick="deletehoroscope(<?php echo $row['id'] ?>)"><span class="fas fa-trash"></span></button>
            <button type="button" class="btn btn-outline-primary"
                onclick="updatehoroscope(<?php echo $row['id'] ?>)"><span class=" fas fa-pencil-alt"></span></button>
            <?php if ($row['status'] != 'closed') { ?>
                <button onclick="closeprofile()" class="btn btn-outline-primary"><span
                        class="fas fa-window-close"></span></button></h2>
            <?php } ?>
            <?php if ($row['status'] == 'closed') { ?>
               
                    <button class="btn btn-outline-primary" onclick="reopen(<?php echo $row['id'] ?>'&action=reopen')" ><span class="fas fa-box-open"></span></button>

            <?php } ?>
        </div>


    </div>


    <div class="box box-primary">
        <div class="box-body box-profile">
            <div id="roww" class="row">
                <div class="col-md-12">
                    <h3><span id="spanalbum"
                            style="margin-left: 30px;">Name:<?php echo $row['name'] . "<hr><hr>" ?></span></h3>
                    <img class=" profile-user-img rounded-circle" src="../image/horo/<?php echo $row['photo']  ?>" width="250" height="250"
                        style="border:1px solid darkblue">
                    <br>
                    <br>
                    <div class="btn-group" style="margin-left:60px">
                        <button type="button" class="btn btn-outline-primary" onclick="uploadphoto()">Upload</button>
                        <button type="button" class="btn btn-outline-primary" onclick="deletephoto()">Delete</button>

                    </div>

                </div>


            </div>
            <script>
                function uploadphoto() {
                    url = "ppupload.php?id=<?php echo $id ?>";
                    title = "popup";
                    var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
                }
            </script>
            <script>
                function deletephoto() {
                    url = "ppdelete.php?id=<?php echo $row['id'] ?> &photo=<?php echo $row['photo'] ?>";
                    title = "popup";
                    var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
                }
            </script>
            <br>
            <br>

            <div id="mgn" class="col-sm-12 pull-right">
                <div class="box-header ">
                    <h1><b> Personal Details</b></h1>
                </div>

                <hr>
                <div class="col-sm-8">

                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Name</b> </div>
                            <div class="col-sm-7"><?php echo $row['name'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Gender</b> </div>
                            <div class="col-sm-7"><?php echo $row['gender'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Age</b> </div>
                            <div class="col-sm-7"><?php echo $row['age'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Height</b> </div>
                            <div class="col-sm-7"><?php echo $row['height'] ?> Cms</div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Weight</b> </div>
                            <div class="col-sm-7"><?php echo $row['weight'] ?> Kgs</div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Colour</b> </div>
                            <div class="col-sm-7"><?php echo $row['colour'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Blood Group</b> </div>
                            <div class="col-sm-7"><?php echo get_blood_group($row['blood_group']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Kulam</b> </div>
                            <div class="col-sm-7"><?php echo get_kulam($row['kulam']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Temple</b> </div>
                            <div class="col-sm-7"><?php echo $row['temple'] ?></div>
                        </div>
                    </li>
                </div>

                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Education</b> </div>
                            <div class="col-sm-7"><?php echo get_qualification($row['qualification']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Education Details</b> </div>
                            <div class="col-sm-7"><?php echo $row['education_details'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>College Details</b> </div>
                            <div class="col-sm-7"><?php echo $row['college_details'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Occupation</b> </div>
                            <div class="col-sm-7"><?php echo get_occupation($row['occupation']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Occupation Details</b> </div>
                            <div class="col-sm-7"><?php echo $row['occupation_details'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Income</b> </div>
                            <div class="col-sm-7"><?php echo $row['income'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Workplace</b> </div>
                            <div class="col-sm-7"><?php echo get_workplace($row['country']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Address</b> </div>
                            <div class="col-sm-7"><?php echo $row['address'] ?></div>
                        </div>
                    </li>

                </div>
            </div>
            <br>
            <div id="mgn" class="col-sm-12 pull-right">
                <div class="box-header ">
                    <h1><b> Horoscope Details</b></h1>
                </div>

                <hr>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Marital Status</b> </div>
                            <div class="col-sm-7"><?php echo get_marital_status($row['marital_status']) ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Birth Date</b> </div>
                            <div class="col-sm-7"><?php echo $row['birth_date'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Birth Time</b> </div>
                            <div class="col-sm-7"><?php echo $row['birth_time'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Birth Place</b> </div>
                            <div class="col-sm-7"><?php echo $row['birth_place'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Sevvai</b> </div>
                            <div class="col-sm-7"><?php echo ($row['sevvai'] > 0) ? "Yes" : "No" ?></div>
                        </div>

                    </li>


                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Raasi</b> </div>
                            <div class="col-sm-7"><?php echo get_raasi($row['raasi']) ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Laknam</b> </div>
                            <div class="col-sm-7"><?php echo get_lagnam($row['laknam']) ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Star</b> </div>
                            <div class="col-sm-7"><?php echo get_star($row['star']) ?></div>
                        </div>

                    </li>

                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Padham</b> </div>
                            <div class="col-sm-7"><?php echo ($row['padham'] > 0) ? "Yes" : "No" ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Raghu/ Kedhu</b> </div>
                            <div class="col-sm-7"><?php echo ($row['raaghu_kaedhu'] > 0) ? "Yes" : "No" ?></div>
                        </div>

                    </li>

                    </ul>
                </div>
            </div>
            <br>
            <div id="mgn" class="col-sm-12 pull-right">
                <div class="box-header ">
                    <h1><b> Contact Details</b></h1>
                </div>
                <hr>
                <div class="col-sm-8">

                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Mobile No</b> </div>
                            <div class="col-sm-7"><?php echo $row['mobile_no'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Email</b> </div>
                            <div class="col-sm-7"><?php echo $row['email'] ?></div>
                        </div>
                    </li>
                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Contact person</b> </div>
                            <div class="col-sm-7"><?php echo $row['contact_person'] ?></div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Relationship</b> </div>
                            <div class="col-sm-7"><?php echo $row['relationship'] ?></div>
                        </div>
                    </li>
                </div>
            </div>
            <br>

            <div id="mgn" class="col-sm-12 pull-right">
                <div class="box-header ">
                    <h1><b> Family Details</b></h1>
                </div>
                <hr>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Father Name</b> </div>
                            <div class="col-sm-7"><?php echo $row['father_name'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Mother Name</b> </div>
                            <div class="col-sm-7"><?php echo $row['mother_name'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Sibling</b> </div>
                            <div class="col-sm-7"><?php echo $row['sibling'] ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Father Occupation </b></div>
                            <div class="col-sm-7"><?php echo $row['f_occupation'] ?></div>
                        </div>

                    </li>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Mother Occupation </b></div>
                            <div class="col-sm-7"><?php echo $row['m_occupation'] ?></div>
                        </div>

                    </li>

                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Maternal Kulam</b> </div>
                            <div class="col-sm-7"><?php echo get_kulam($row['m_kulam']) ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Maternal Mother Kulam</b> </div>
                            <div class="col-sm-7"><?php echo get_kulam($row['mm_kulam']) ?></div>
                        </div>

                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Paternal Mother Kulam</b> </div>
                            <div class="col-sm-7"><?php echo get_kulam($row['pm_kulam']) ?></div>
                        </div>

                    </li>
                    <br>
                </div>
            </div>
            <br>
            <div id="mgn" class="col-sm-12 pull-right">
                <div class="box-header r">
                    <h1><b> Other Details</b></h1>
                </div>
                <hr>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Registered Date</b> </div>
                            <div class="col-sm-7"><?php echo $row['registered_date'] ?></div>
                        </div>


                    </li>
                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">

                        <div class="row">
                            <div class="col-sm-5"><b>Status</b> </div>
                            <div class="col-sm-7"><?php echo $row['status'] ?></div>
                        </div>

                    </li>
                </div>
            </div>
            <br>
            <div id="mgn" class="col-sm-12 pull-right">
                <br>
                <div class="box-header ">
                    <h1><b> Referrer Details</b></h1>
                </div>
                <hr>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Referrer name </b> </div>
                            <div class="col-sm-7"> <?php echo $row2['name'] ?> </div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Ref Mobile no </b> </div>
                            <div class="col-sm-7"> <?php echo $row2['mobile_no'] ?> </div>
                        </div>
                    </li>

                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Ref Address </b> </div>
                            <div class="col-sm-7"> <?php echo $row2['current_address'] ?> </div>
                        </div>
                    </li>
                </div>
            </div>
            <br>
            <div id="mgn" class="col-sm-12 pull-right">
                <br>
                <div class="box-header">
                    <h1><b>Expectation</b></h1>
                </div>
                <hr>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Education </b> </div>
                            <div class="col-sm-7"> <?php echo $row['pp_education'] ?> </div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Occupation </b> </div>
                            <div class="col-sm-7"> <?php echo $row['pp_occupation'] ?> </div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Work Location </b> </div>
                            <div class="col-sm-7"> <?php echo get_workplace($row['pp_work_location']) ?> </div>
                        </div>
                    </li>


                </div>
                <div class="col-sm-8">
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Salary </b> </div>
                            <div class="col-sm-7"> <?php echo $row['pp_salary'] ?> </div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Asset details </b> </div>
                            <div class="col-sm-7"> <?php echo $row['pp_asset_details'] ?> </div>
                        </div>
                    </li>
                    <li id="border" class="list-group-item">
                        <div class="row">
                            <div class="col-sm-5"><b>Other Expectations </b> </div>
                            <div class="col-sm-7"> <?php echo $row['pp_expectation'] ?> </div>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<center>

    <div class="d-grid">

        <?php
        if ($row['horo'] !== '') {
            ?>
            <button onclick="horoview(<?php echo $id ?>)" class="btn btn-primary btn-block"> View Horoscope </button>
        <?php } else { ?>
            <button onclick="horoupload(<?php echo $id ?>)" class="btn btn-primary btn-block">Upload Horoscope </button>
        <?php } ?>
    </div>

    <script>
        function horoview(id) {
            url = "horoview.php?id=" + id;
            title = "popup";
            var newWindow = window.open(url, title, 'scrollbars=yes,width=500, height=400');
        }

        function horoupload(id) {
            url = "horoupload.php?id=" + id;
            title = "popup";
            var newWindow = window.open(url, title, 'scrollbars=yes, width=500, height=400');
        }
    </script>

    <?php /*  <button onclick="certiview()">View Certificate</button>
<script>
function certiview()
{
url = "certiview.php?id=<?php echo $id ?>";
title = "popup";
var newWindow = window.open(url, title, 'scrollbars=yes,width=1300 height=600 ');
}
</script>
* */
    ?>
    </div>
</center>
<div style="clear:both"></div>
<?php
include('../footer.php');
?>