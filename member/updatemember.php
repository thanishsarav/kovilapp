<?php
include('../popupheader.php');

$id = $_GET['id'];
echo $id;


$error_msg = '';
$success_msg = '';
if (count($_POST) > 0) {
    $res = update_family($id, $_POST);
    if ($res) {
        $success_msg = "Updated Successfully ";
        
    } else {
        $error_msg = 'Error: ' . mysql_error();
    }
}
/* $result = mysql_query("SELECT * FROM $tbl_family WHERE`id`=$id");
  $row = mysql_fetch_array($result); */
$row = get_member($id);
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Update members </h4>
        </div>

    </div>
</div>

<div class="container-fluid">
    <?php if ($success_msg) { ?>
        <div class="alert alert-success col-sm-10  col-sm-offset-1" style="margin-top:5px;margin-bottom: 5px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
            <?php echo $success_msg ?>
        </div>
    <?php } ?>

    <?php if ($error_msg) { ?>
        <div class="alert alert-danger alert-dismissable col-sm-10  col-sm-offset-1" style="margin-bottom:0px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <?php echo $error_msg ?>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">

                        <form class="form-horizontal p-t-20" method="post" style="max-width:900px;">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Husband Details</h2>


                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="name"
                                                    value="<?php echo $row['name'] ?>">
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
                                                    value="<?php echo $row['father_name'] ?>">
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
                                                    value="<?php echo $row['mother_name'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Date of
                                            Birth</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <?php display_date("dob[date]", $row['dob']) ?>
                                                        </td>
                                                        <td>
                                                            <?php display_month("dob[month]", $row['dob']) ?>
                                                        </td>
                                                        <td>
                                                            <?php display_year("dob[year]", $row['dob']) ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Blood
                                            group</label>
                                        <div class="col-sm-8">

                                            <?php display_blood_group_list("blood_group", $row['blood_group']); ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-8">
                                            <?php display_qualification("qualification", $row['qualification']) ?>
                                        </div>
                                    </div>
                                    <script>
                                        $("#qualification").select2();
                                    </script>


                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Education
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="education_details"
                                                    value="<?php echo $row['education_details'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Occupation</label>
                                        <div class="col-sm-8">
                                            <?php display_occupation("occupation", $row['occupation']); ?>
                                        </div>
                                    </div>
                                    <script>
                                        $("#occupation").select2();
                                    </script>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Occupation
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="occupation_details"
                                                    value="<?php echo $row['occupation_details'] ?>">
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
                                                    name="email" value="<?php echo $row['email'] ?>">
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
                                                    value="<?php echo $row['mobile_no'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">Wife Details</h2>




                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="w_name"
                                                    value="<?php echo $row['w_name'] ?>">
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
                                            <div class="input-group">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <?php display_date("w_dob", $row['w_dob']) ?>
                                                        </td>
                                                        <td>
                                                            <?php display_month("w_dob", $row['w_dob']) ?>
                                                        </td>
                                                        <td>
                                                            <?php display_year("w_dob", $row['w_dob']) ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Blood
                                            group</label>
                                        <div class="col-sm-8">
                                            <?php display_blood_group_list("w_blood_group", $row['w_blood_group']) ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Education</label>
                                        <div class="col-sm-8">
                                            <?php display_qualification("w_qualification", $row['w_qualification']) ?>
                                        </div>
                                    </div>
                                    <script>
                                        $("#w_qualification").select2();
                                    </script>

                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Education
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="w_education_details"
                                                    value="<?php echo $row['w_education_details'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Occupation</label>
                                        <div class="col-sm-8">
                                            <?php display_occupation("w_occupation", $row['w_occupation']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Occupation
                                            details</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10"
                                                    name="w_occupation_details"
                                                    value="<?php echo $row['w_occupation_details'] ?>">
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
                                                    name="w_email" value="<?php echo $row['w_email'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-email"></i></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Kootam</label>
                                        <?php echo $row['w_kootam_old']; ?>
                                        <div class="col-sm-8">
                                            <?php display_kulam_list("w_kootam", $row['w_kootam']) ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="web10" class="col-sm-2 control-label">Temple</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="web10" name="w_temple"
                                                    value="<?php echo $row['w_temple'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-world"></i></span></div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">Permanent Address</h2>



                                    <div class="form-group row">
                                        <label>Perfect Address</label>
                                        <textarea class="form-control"
                                            rows="5"><?php echo $row['permanent_address'] ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">District</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="district"
                                                    value="<?php echo $row['district'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Taluka</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="taluk"
                                                    value="<?php echo $row['taluk'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="state"
                                                    value="<?php echo $row['state'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="country"
                                                    value="<?php echo $row['country'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Village</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="village"
                                                    value="<?php echo $row['village'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Pincode</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="pincode"
                                                    value="<?php echo $row['pincode'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>






                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">Current Address</h2>



                                    <div class="form-group row">
                                        <label>Perfect Address</label>
                                        <textarea class="form-control" rows="5"
                                            name="current_address"><?php echo $row['current_address'] ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">District</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_district"
                                                    value="<?php echo $row['c_district'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Taluka</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_taluk"
                                                    value="<?php echo $row['c_taluk'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_state"
                                                    value="<?php echo $row['c_state'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_country"
                                                    value="<?php echo $row['c_country'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Village</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_village"
                                                    value="<?php echo $row['c_village'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uname" class="col-sm-2 control-label">Pincode</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="c_pincode"
                                                    value="<?php echo $row['pincode'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>






                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">Other Details</h2>



                                    <div class="form-group row">
                                        <label>Remark</label>
                                        <textarea class="form-control" rows="4"
                                            name="remarks"><?php echo $row['remarks'] ?></textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">Kattalai</label>
                                        <div class="col-sm-8">
                                            <?php display_kattalai("kattalai", $row['kattalai']); ?>
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
                                                <input type="text" class="form-control" id="uname" name="k_village"
                                                    value="<?php echo $row['k_village'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">Pudavai</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="uname" name="pudavai"
                                                    value="<?php echo $row['pudavai'] ?>">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="ti-user"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="uname" class="col-sm-2 control-label">IC</label>
                                        <div class="col-sm-8">
                                            <select class="form-control custom-select"
                                                data-placeholder="Choose a Category" tabindex="1">
                                                <option selected="selected"> <?php echo $row['ic'] ?> </option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit"  class="btn btn-outline-primary" >Update</button>
                                        <button type="submit" class="btn btn-outline-primary" >Cancel</button>
                                    </div>

                                </div>

                            </div>
                        </form>
                        <script>
                            $("#w_occupation").select2();
                            $("#w_kootam").select2();


                        </script>
                        <script>


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
                    <hr>

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