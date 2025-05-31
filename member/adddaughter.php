<?php include('../popupheader.php');
$c_created_date = date('Y-m-d H:i:s');
// $c_created_by = $_SESSION['username'];


$father_id = $_GET['id'];

$error_msg = '';
$success_msg = '';
if (count($_POST) && $_POST['c_name'] != '') {
    $res = add_child($_POST);
    if ($res) {
        $success_msg = "Added Successfully ";
    } else {
        $error_msg = 'Error: ' . mysql_error();
    }
}
?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="container-fluid">
            <h2 class="container text-center">Add Daughter </h2>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">CHILD</h2>


                            <form class="form-horizontal p-t-20 " style="border-top: 2px double rgb(97, 95, 95);"
                                method="post">
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="uname"
                                                placeholder="Enter your Name" name="c_name">
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
                                                    <?php display_date($name = "dob[date]") ?>
                                                </td>
                                                <td>
                                                    <?php display_month($name = "dob[month]") ?>
                                                </td>
                                                <td>
                                                    <?php display_year($name = "dob[year]") ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-2 control-label">Blood
                                        group</label>
                                    <div class="col-sm-8">
                                        <?php display_blood_group_list($name = "c_blood_group"); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-2 control-label">Education</label>
                                    <div class="col-sm-8">
                                        <?php display_qualification($name = "c_qualification"); ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="web10" class="col-sm-2 control-label">Education
                                        details</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="web10"
                                                placeholder="Education details" name="c_education_details">
                                            <div class="input-group-append"><span class="input-group-text"><i
                                                        class="ti-world"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-2 control-label">Occupation</label>
                                    <div class="col-sm-8">
                                        <?php display_occupation($name = "c_occupation"); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-2 control-label">Occupation
                                        details</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="web10"
                                                placeholder="Occupation details" name="c_occupation_details">
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
                                                placeholder="Enter email" name="c_email" >
                                            <div class="input-group-append"><span class="input-group-text"><i
                                                        class="ti-email"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-2 control-label">Mobile.no</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="web10"
                                                placeholder="Enter Mobile.no" name="c_mobile_no">
                                            <div class="input-group-append"><span class="input-group-text"><i
                                                        class="ti-world"></i></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="button" onclick="window.close()"
                                        class="btn btn-info pull-right">Cancel</button>
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </div>

                                <input type="hidden" name="c_gender" value="female">
                                <input type="hidden" name="c_marital_status" value="No">
                                <input type="hidden" name="father_id" value="<?php echo $father_id; ?>">


                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php include('../footer.php') ?>