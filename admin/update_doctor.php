<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['upd_id'])) {
    $did = $_GET['upd_id'];

    $sql = "SELECT * FROM `tbl_doctor` WHERE `doctorid`='$did'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($r = mysqli_fetch_assoc($result)) {
            $id = $r['doctorid'];
            $name = $r['name'];
            $lname = $r['lname'];
            $email = $r['email'];
            $password = $r['password'];
            $address = $r['address'];
            $phone = $r['phone'];
            $picture = $r['picture'];
            $degree = $r['degree'];
            $edepartment = $r['departmentid'];
        }
    }
}


if (isset($_POST['upd_doc'])) {
    $id= $_GET['upd_id'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = sha1(md5($_POST['password']));
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    $f_name = $_FILES['picture']['name'];
    $f_dir = '../doctor/assets/images/users/' . $f_name;
    move_uploaded_file($_FILES['picture']['tmp_name'], $f_dir);

    $degree = $_POST['degree'];
    $department = $_POST['departmentid'];

    $sql = "UPDATE `tbl_doctor` SET `name`='$name',`lname`='$lname',`email`='$email',`password`='$password',`address`='$address',`phone`='$phone',`picture`='$f_name',`degree`='$degree',`departmentid`='$department' WHERE `doctorid`='$id'";
    $res = mysqli_query($con, $sql);

    if ($res) {
        $success = "Doctor Details Updated";
    } else {
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Doctors</a></li>
                                        <li class="breadcrumb-item active">Add doctor</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Employee Details</h4>
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


                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Address</label>
                                            <textarea name="address" type="text" class="form-control" id="inputAddress"><?php echo $address; ?></textarea>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPhone" class="col-form-label">Phone</label>
                                                <input required="required" type="text" pattern="^\d{10}$" name="phone" class="form-control" id="inputPhone" value=<?php echo $phone; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPhoto" class="col-form-label">Picture</label>
                                                <input type="file" name="picture" class="form-control" id="inputPhoto" value=<?php echo $picture; ?>>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDegree" class="col-form-label">Degree</label>
                                                <input required="required" type="text" name="degree" class="form-control" id="inputDegree" value=<?php echo $degree; ?>>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDegree" class="col-form-label">Department</label>
                                                <select id="inputState" required="required" name="departmentid" class="form-control" value=<?php echo $edepartment; ?>>
                                                    <optgroup label="select category">

                                                        <?php

                                                        $sql1 = "select * from tbl_department where departmentid='$edepartment'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $edepartment; ?>"><?php echo $r['name']; ?></option>

                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                        <?php

                                                        $sql1 = "select * from tbl_department where not departmentid='$edepartment'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['departmentid']; ?>"><?php echo $r['name']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" name="upd_doc" class="ladda-button btn btn-success" data-style="expand-right">Update Doctor</button>

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