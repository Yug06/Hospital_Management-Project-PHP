<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$sid = $_SESSION['sid'];
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
        <?php
        if (isset($_GET['pid']) && isset($_GET['lid'])) {
            $pid = $_GET['pid'];
            $lid = $_GET['lid'];
            $sql = "SELECT * FROM `tbl_labreport` WHERE `patientid`='$pid' and `lid`='$lid'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                while ($r = mysqli_fetch_assoc($result)) {
                    // $id=$r['departmentid'];
                    $prid = $r['prescriptionid'];
                    $test = $r['test'];
                    $date = $r['date'];
                    $resu = $r['result'];
                }
            }
        }
        ?>

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Laboratory Records</a></li>
                                        <li class="breadcrumb-item active">View Records</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">#<?php echo $lid; ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">

                                <div class="clearfix">
                                    <div class="float-left">
                                        <img src="assets/images/CareConnect4.png" alt="" height="100">
                                    </div>
                                    <div class="float-right">
                                        <img src="assets/images/CareConnect5.png" alt="" height="100">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-3">
                                            <p><b></b></p>
                                            <p class="text-muted"></p>
                                        </div>

                                    </div>

                                    <div class="col-md-4 offset-md-2">
                                        <div class="mt-3 float-right">
                                            <div class="float-right">
                                                <h3 class="m-0 d-print-none"> </h3>
                                            </div>
                                            <p class="m-b-10"><strong>Patient Id : </strong> <span class="float-right"><?php echo $pid; ?></span></p>
                                            <p class="m-b-10"><strong>Patient Name : </strong> <span class="float-right"><?php
                                                                                                                            $sql1 = "select * from `tbl_patient` where `patientid`='$pid'";
                                                                                                                            $res1 = mysqli_query($con, $sql1);
                                                                                                                            if (mysqli_num_rows($res1)) {
                                                                                                                                while ($r = mysqli_fetch_assoc($res1)) {
                                                                                                                                    //$eptype = $r['ptid'];
                                                                                                                            ?>
                                                            <?php echo $r['name']; ?> <?php echo $r['lname']; ?>

                                                    <?php
                                                                                                                                }
                                                                                                                            }
                                                    ?></span></p>
                                            <p class="m-b-10"><strong>Generated Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("d/m/Y", strtotime($date));; ?> </span></p>
                                            <p class="m-b-10"><strong>Disease : </strong> <span class="float-right"> <?php

                                                                                                                        $sql1 = "select disease from tbl_prescription where `patientid`='$pid' and `prescriptionid`='$prid'";
                                                                                                                        $res1 = mysqli_query($con, $sql1);
                                                                                                                        if (mysqli_num_rows($res1)) {
                                                                                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                                                                                        ?>
                                                            <?php echo $r['disease']; ?>
                                                    <?php
                                                                                                                            }
                                                                                                                        }
                                                    ?></span></p>

                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4 table-centered table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 10%"><h3>Test</h3></th>
                                                            <th style="width: 10%"><h3>Result</h3></th>
                                                           
                                                        </tr></thead>
                                                        <tbody>
                                                        <tr>
                                                           
                                                            <td><h3>
                                                            <?php echo $test; ?>
                                                                                                                        </h3>
                                                                </td>
                                                                <td><h3>
                                                                <?php echo $resu; ?></h3>
                                                                </td>
                                                         
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive -->
                                            </div> <!-- end col -->
                                            <div>
                                                <div>
                                                    <h2 class="text">Notes:</h2>
            
                                                    <p class="text-muted h3">
                                                         <?php echo "vhgvjhvjhbvjhvhjv <br> vhgvjhvjhbvjhvhjv <br> vhgvjhvjhbvjhvhjv <br> vhgvjhvjhbvjhvhjv";?>
                                                        
                                                                                                                    </p>
                                                </div>
                                            </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="mt-4 mb-1">
                                <div class="text-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                </div>
                            </div>

                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

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

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>