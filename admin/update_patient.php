<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['upd_id'])) {
    $pid = $_GET['upd_id'];

    $sql = "SELECT * FROM `tbl_patient` WHERE `patientid`='$pid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($r = mysqli_fetch_assoc($result)) {
            $id = $r['patientid'];
            $name = $r['name'];
            $lname = $r['lname'];
            $email = $r['email'];
            $password = $r['password'];
            $gender = $r['gender'];
            $dob = $r['dob'];
            $address = $r['address'];
            $phone = $r['phone'];
            $bloodgroup = $r['bloodgroup'];
            $eptype = $r['ptid'];
        }
    }
}

if(isset($_POST['upd_pat']))
{
    $id= $_GET['upd_id'];
	$name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = sha1(md5($_POST['password']));
    $gender=$_POST['gender'];
    $dob= date('Y-m-d',strtotime($_POST['dob']));
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $blood = $_POST['blood'];
    $ptype = $_POST['ptid'];

    $sql = "UPDATE `tbl_patient` SET `name`='$name',`lname`='$lname',`email`='$email',`password`='$password',`gender`='$gender',`dob`='$dob',`address`='$address',`phone`='$phone',`bloodgroup`='$blood',`ptid`='$ptype' WHERE `patientid`='$id'";
    $res=mysqli_query($con,$sql);

	if($res)
	{
		$success = "Patient Details Updated";
	}
	else {
		$err = "Please Try Again Or Try Later";
	}
}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">Update Patient</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fill all fields</h4>
                                    <!--Add Patient Form-->
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">First Name</label>
                                                <input type="text" required="required" name="name" class="form-control" id="inputName" value=<?php echo $name; ?>>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">Last Name</label>
                                                <input type="text" required="required" name="lname" class="form-control" id="inputName" value=<?php echo $lname; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail" class="col-form-label">Email</label>
                                                <input type="email" required="required" name="email" class="form-control" id="inputEmail" value=<?php echo $email; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword" class="col-form-label">Password</label>
                                                <input required="required" type="password" name="password" class="form-control" id="inputPassword" value=<?php echo $password; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputGender" class="col-form-label">Gender</label><br>
                                                <input required="required" type="radio" name="gender" id="inputGender" value="Male" <?php
                                                                                                                                    if ($gender == "Male") {
                                                                                                                                        echo "checked";
                                                                                                                                    }
                                                                                                                                    ?>>Male
                                                <input type="radio" name="gender" id="inputGender" class="ml-5" value="Female" <?php
                                                                                                                                if ($gender == "Female") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?>>Female
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Date of Birth</label>
                                            <input required="required" type="date" name="dob" class="form-control" id="inputDob" value=<?php echo $dob; ?>>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Address</label>
                                            <textarea name="address" class="form-control" id="inputAddress" value=<?php echo $address; ?>></textarea>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPhone" class="col-form-label">Phone</label>
                                                <input required="required" type="text" name="phone" pattern="^\d{10}$" class="form-control" id="inputPhone" value=<?php echo $phone; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputBg" class="col-form-label">Blood Group</label>
                                                <select id="inputBg" required="required" name="blood" class="form-control">
                                                    <optgroup label="select category">
                                                        <option <?php
                                                                if ($bloodgroup == "A+") {
                                                                    echo "selected";
                                                                } ?>>A+</option>
                                                        <option <?php
                                                                if ($bloodgroup == "A-") {
                                                                    echo "selected";
                                                                } ?>>A-</option>
                                                        <option <?php
                                                                if ($bloodgroup == "B+") {
                                                                    echo "selected";
                                                                } ?>>B+</option>
                                                        <option <?php
                                                                if ($bloodgroup == "B-") {
                                                                    echo "selected";
                                                                } ?>>B-</option>
                                                        <option <?php
                                                                if ($bloodgroup == "AB+") {
                                                                    echo "selected";
                                                                } ?>>AB+</option>
                                                        <option <?php
                                                                if ($bloodgroup == "AB-") {
                                                                    echo "selected";
                                                                } ?>>AB-</option>
                                                        <option <?php
                                                                if ($bloodgroup == "O+") {
                                                                    echo "selected";
                                                                } ?>>O+</option>
                                                        <option <?php
                                                                if ($bloodgroup == "O-") {
                                                                    echo "selected";
                                                                } ?>>O-</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDegree" class="col-form-label">Designation</label>
                                                <select id="inputState" required="required" name="ptid" class="form-control" value=<?php echo $eptype; ?>>
                                                    <optgroup label="select category">

                                                        <?php

                                                        $sql1 = "select * from tbl_patient_type where ptid='$eptype'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $eptype; ?>"><?php echo $r['ptype']; ?></option>

                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                        <?php

                                                        $sql1 = "select * from tbl_patient_type where not ptid='$eptype'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['ptid']; ?>"><?php echo $r['ptype']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>


                                        <button type="submit" name="upd_pat" class="ladda-button btn btn-success" data-style="expand-right">Update Patient</button>

                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php'); ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>