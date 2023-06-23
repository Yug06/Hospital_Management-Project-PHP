<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['upd_id'])) {
    $did = $_GET['upd_id'];

    $sql = "SELECT * FROM `tbl_department` WHERE `departmentid`='$did'";
    $result = mysqli_query($con, $sql);
    if($result){
        while($r=mysqli_fetch_assoc($result)){
            $id=$r['departmentid'];
            $name=$r['name'];
        }
    }
}

if (isset($_POST['upd_dept'])) {
    $did = $_GET['upd_id'];
    $name = $_POST['add_department'];
   
    $sql = "UPDATE `tbl_department` SET `name`='$name' WHERE `departmentid`='$did'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "Department Updated";
        //header('Location:add_department.php');
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

if(isset($_POST['back'])){
    header('Location:add_department.php');
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
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
                                            <input required="required" type="text" class="form-control" name="add_department" id="inputDepartment" value=<?php echo $name; ?>>

                                        </div>

                                        <button type="submit" name="upd_dept" class="ladda-button btn btn-success" data-style="expand-right">Update Department</button>
                                        <button type="submit" name="back" class="ladda-button btn btn-success" data-style="expand-right">Back</button>
                                    </form><br>
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