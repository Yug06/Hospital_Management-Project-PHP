<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $adminid=$_SESSION['admin_id'];
  if (isset($_GET['del_id'])) {
    $sid = $_GET['del_id'];
    $sql = "DELETE FROM `tbl_staff` WHERE `sid`='$sid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = "doctor deleted";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Staff</a></li>
                                            <li class="breadcrumb-item active">Manage Staff Members</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Employees Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title"></h4>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>StaffID</th>
                                                <th data-toggle="true">Name</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Phone</th>
                                                <th data-hide="phone">Designation</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            $sql1 = "SELECT * FROM `tbl_staff` ";
                                            $result1 = mysqli_query($con, $sql1);
                                            while ($data = mysqli_fetch_array($result1)) {
                                                $designation=$data['stid'];
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $data['sid']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['name']; ?> <?php echo $data['lname']; ?>
                                            </td>
                                            <td>
                                                        <?php echo $data['email']; ?>
                                            </td>
                                            <td>
                                                        <?php echo $data['phone']; ?>
                                            </td>
                                            <td>
                                                        <?php
                                                        
                                                        $sql1 = "select designation from tbl_staff_type where `stid`='$designation'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <?php echo $r['designation']; ?>
                                                        <?php
                                                            }
                                                        }
                                                         ?>
                                            </td>
                                            <td>
                                                        <a href="manage_staff.php?del_id=<?php echo $data['sid']; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                        <a href="view_single_employee.php?s_id=<?php echo $data['sid']; ?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                        <a href="update_staff.php?upd_id=<?php echo $data['sid']; ?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                 <?php include('assets/inc/footer.php');?>
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

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>