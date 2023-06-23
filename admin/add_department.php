<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
//add department
if (isset($_POST['add_dept'])) {
    $name = $_POST['add_department'];
    // echo $name;
    $sql = "INSERT INTO `tbl_department`(`name`) VALUES ('$name')";
    $res = mysqli_query($con, $sql);
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($res) {
        $success = "Department added";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

//delete department
if (isset($_GET['del_id'])) {
    $did = $_GET['del_id'];
    $sql = "DELETE FROM `tbl_department` WHERE `departmentid`='$did'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "Department deleted";
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
                                        <li class="breadcrumb-item active">Add Department</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Department</h4>
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

                                        <div class="form-group">
                                            <label for="inputDepartment" class="col-form-label">Department</label>
                                            <input required="required" type="text" class="form-control" name="add_department" id="inputDepartment">

                                        </div>

                                        <button type="submit" name="add_dept" class="ladda-button btn btn-success" data-style="expand-right">Add Department</button>

                                    </form><br>
                                    <!--End Patient Form-->
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th data-toggle="true">Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $sql1 = "SELECT * FROM `tbl_department` ";
                                            $result1 = mysqli_query($con, $sql1);
                                            while ($data = mysqli_fetch_array($result1)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $data['departmentid']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['name']; ?>
                                            </td>
                                            <td>
                                                        <a href="add_department.php?del_id=<?php echo $data['departmentid']; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                        <a href="update_department.php?upd_id=<?php echo $data['departmentid']; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div> <!-- end .table-responsive-->
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