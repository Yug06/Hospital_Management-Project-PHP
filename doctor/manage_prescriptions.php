<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$did = $_SESSION['did'];
// echo $pid;
?>

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Appointment</a></li>
                                        <li class="breadcrumb-item active">Appointment History</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Appointment History</h4>
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
                                        <div class="col-12 text-sm-center form-inline">
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
                                                <th>Prescription Id</th>
                                               
                                                <th data-toggle="true">Patient Name</th>
                                                <th data-hide="phone">Patient Type</th>
                                                <th data-hide="phone">Disease</th>

                                    
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql1 = "SELECT * FROM `tbl_prescription` where doctorid='$did'";
                                        $result1 = mysqli_query($con, $sql1);
                                        while ($data = mysqli_fetch_array($result1)) {
                                            $doctorid = $data['doctorid'];
                                            $patientid = $data['patientid'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $data['prescriptionid']; ?>
                                                </td>
                                               
                                                <td>
                                                    <?php
                                                    $sql1 = "select * from `tbl_patient` where `patientid`='$patientid'";
                                                    $res1 = mysqli_query($con, $sql1);
                                                    if (mysqli_num_rows($res1)) {
                                                        while ($r = mysqli_fetch_assoc($res1)) {
                                                            $eptype = $r['ptid'];
                                                    ?>
                                                            <?php echo $r['name']; ?> <?php echo $r['lname']; ?>
                                                            
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <?php
                                                        
                                                        $sql1 = "select ptype from tbl_patient_type where `ptid`='$eptype'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <?php echo $r['ptype']; ?>
                                                        <?php
                                                            }
                                                        }
                                                         ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['disease']; ?>
                                                </td>
                                               
                                              
                                                <td>
                                                    <!-- <a href="#" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="badge badge-danger"><i class="mdi mdi-close"></i> Cancel</a> -->
                                                    <a href="view_prescription.php?pr_id=<?php echo $data['prescriptionid'];?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                    <a href="update_prescription.php?pr_id=<?php echo $data['prescriptionid'];?>" class="badge badge-warning"><i class="fas fa-highlighter"></i>Update</a>
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

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>