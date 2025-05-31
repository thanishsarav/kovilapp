<?php
include_once('../popupheader.php');
include_once('../vars.php');
global $con;

$created_date = date('Y-m-d H:i:s');
$created_by = ''; // Replace with actual logged-in user ID if available
$error_msg = '';
$success_msg = '';

$child_id = isset($_GET['child_id']) ? intval($_GET['child_id']) : 0;
$row = get_child($child_id);

// Initialize form field values
$name = $dob = $blood_group = $education = $education_details = '';
$occupation = $occupation_details = $email = $mobile_no = '';

if ($row) {
    $name = htmlspecialchars($row['c_name']);
    $dob = htmlspecialchars($row['c_dob']);
    $blood_group = htmlspecialchars($row['c_blood_group']);
    $education = htmlspecialchars($row['c_qualification']);
    $education_details = htmlspecialchars($row['c_education_details']);
    $occupation = htmlspecialchars($row['c_occupation']);
    $occupation_details = htmlspecialchars($row['c_occupation_details']);
    $email = htmlspecialchars($row['c_email']);
    $mobile_no = htmlspecialchars($row['c_mobile_no']);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
    // Optional: sanitize/validate input here if not already done inside add_member()
    $res = add_member($_POST);  // Make sure this function uses prepared statements

    if ($res) {
        $success_msg = "Member added successfully.";

        if ($child_id > 0) {
            $c_marital_status = 'Yes';
            $tbl_child = "child_table"; // Replace with actual child table name

            $sql = "UPDATE $tbl_child SET fam_id = ?, c_marital_status = ? WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'isi', $res, $c_marital_status, $child_id);
                if (!mysqli_stmt_execute($stmt)) {
                    $error_msg = 'Error updating child: ' . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                $error_msg = 'SQL Error: ' . mysqli_error($con);
            }
        }
    } else {
        $error_msg = 'Error while adding member.';
    }
}
?>


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Add members </h4>
        </div>

    </div>
</div>

<div class="container-fluid">
    <!-- Optional: Show messages -->
    <?php if ($error_msg): ?>
        <div style="color: red;"><?php echo htmlspecialchars($error_msg); ?></div>
    <?php endif; ?>

  <?php if ($success_msg) { ?>
        <div class="alert alert-success col-sm-10  col-sm-offset-1" style="margin-bottom:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo "<h1>".$success_msg."</h1>" ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <form class="form-horizontal p-t-20" style="max-width:850px;" method="post">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"
                                        style="border-bottom: 1px double gainsboro;margin-bottom:20px;">Husband Details
                                        <hr>
                                    </h2>



                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="name"
                                                    placeholder="Enter your Name">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Father's
                                            name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="father_name"
                                                    placeholder="Enter your Father Name">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">mother's
                                            name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="mother_name"
                                                    placeholder="Enter your mother Name">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Date of
                                            Birth</label>
                                        <div class="col-sm-8">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php display_date("dob[date]", $row['c_dob'] ?? '') ?>
                                                    </td>
                                                    <td>
                                                        <?php display_month("dob[month]", $row['c_dob'] ?? '') ?>
                                                    </td>
                                                    <td>
                                                        <?php display_year("dob[year]", $row['c_dob'] ?? '') ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Blood
                                            group</label>
                                        <div class="col-sm-8">
                                            <?php display_blood_group_list("blood_group", $row['c_blood_group'] ?? ''); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-8">
                                            <?php display_qualification("qualification", $row['c_qualification'] ?? '') ?>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Education
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="education_details" placeholder="Education details">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Occupation</label>
                                        <div class="col-sm-8">
                                            <?php display_occupation("occupation", $row['c_occupation'] ?? ''); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Occupation
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="occupation_details" placeholder="Occupation details">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email2" class="col-sm-2 control-label">Email*</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="email" placeholder="Enter email">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-email"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Mobile.no</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10" name="mobile_no"
                                                    placeholder="Enter Mobile.no">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"
                                        style="border-bottom: 1px double gainsboro;margin-bottom:20px;">Wife Details
                                    </h2>


                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="w_name"
                                                    placeholder="Enter your Name">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Date of
                                            Birth</label>
                                        <div class="col-sm-8">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php display_date("w_dob") ?>
                                                    </td>
                                                    <td>
                                                        <?php display_month("w_dob") ?>
                                                    </td>
                                                    <td>
                                                        <?php display_year("w_dob") ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Blood
                                            group</label>
                                        <div class="col-sm-8">
                                            <?php display_blood_group_list("w_blood_group") ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-8">
                                            <?php display_qualification("w_qualification") ?>
                                        </div>
                                    </div>
                                    <script>
                                        $("#w_qualification").select2();                                       //custom select javascript
                                    </script>

                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Education
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="w_education_details" placeholder="Education details">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Occupation</label>
                                        <div class="col-sm-8">
                                            <?php display_occupation("w_occupation"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Occupation
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="w_occupation_details" placeholder="Occupation details">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email2" class="col-sm-2 control-label">Email@</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="w_email" placeholder="Enter email">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-email"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Kootam</label>
                                        <div class="col-sm-8">
                                            <?php display_kulam_list("w_kootam") ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Temple</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10" placeholder="Temple"
                                                    name="w_temple">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"
                                        style="border-bottom: 1px double gainsboro;margin-bottom:20px;">Permanent
                                        Address</h2>


                                    <div class="form-group row">
                                        <label>Perfect Address</label>
                                        <textarea class="form-control" rows="5" name="permanent_address"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">District</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="district">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Taluka</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="taluk">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="state">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="country">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Village</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="village">>
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Pincode</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="pincode">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"
                                        style="border-bottom: 1px double gainsboro;margin-bottom:20px;">Current Address
                                    </h2>



                                    <div class="form-group row">
                                        <label>Perfect Address</label>
                                        <textarea class="form-control" rows="5" name="current_address"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">District</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_district">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Taluka</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_taluk">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_state">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_country">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Village</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_village">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Pincode</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_pincode">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>





                                </div>

                                <div class="card-body">
                                    <h2 class="card-title"
                                        style="border-bottom: 1px double gainsboro;margin-bottom:20px;">Other Details
                                    </h2>


                                    <div class="form-group row">
                                        <label>Remark</label>
                                        <textarea class="form-control" rows="4" name="remarks"></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">Kattalai</label>
                                        <div class="col-sm-8">
                                            <?php display_kattalai("kattalai"); ?>
                                        </div>
                                    </div>
                                    <script>
                                        $("#kattalai").select2();
                                    </script>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">Kattalai
                                            village</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="k_village">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">Pudavai</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="pudavai">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">IC</label>
                                        <div class="col-sm-8">
                                            <select class="form-control custom-select" name="ic"
                                                data-placeholder="Choose a Category" tabindex="1">
                                                <option selected="selected"> -Select- </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                    <button type="submit" onclick="window.close()"
                                        class="btn btn-info pull-left">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        $("#blood_group").select2();
                        $("#w_blood_group").select2();
                        $("#w_occupation").select2();
                        $("#w_kootam").select2();




                        var district = [
                            <?php
                            $loc = get_location('district');
                            echo '"' . implode('","', $loc) . '"';
                            ?>
                        ];

                        $("#c_district").autocomplete({
                            source: district

                        });
                        $("#p_district").autocomplete({
                            source: district

                        });


                        var village = [
                            <?php
                            $loc_p = get_location('village');
                            $loc_c = get_location('c_village');

                            $loc = array_unique(array_merge($loc_p, $loc_c));

                            echo '"' . implode('","', $loc) . '"';
                            ?>
                        ];

                        $("#c_village").autocomplete({
                            source: village

                        });

                        $("#p_village").autocomplete({
                            source: village

                        });


                        var k_village = [
                            <?php
                            $loc = get_location('k_village');


                            echo '"' . implode('","', $loc) . '"';
                            ?>
                        ];

                        $("#k_village").autocomplete({
                            source: k_village

                        });

                        var pudavai = [
                            <?php
                            $loc = get_autosuggest('pudavai');


                            echo '"' . implode('","', $loc) . '"';
                            ?>
                        ];

                        $("#pudavai").autocomplete({
                            source: pudavai

                        });
                    </script>


                </div>
            </div>
        </div>
    </div>


    </form>
</div>
</div>
</div>
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