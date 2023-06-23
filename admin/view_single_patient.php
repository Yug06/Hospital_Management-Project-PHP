<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$adminid = $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">

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

        <!--Get Details Of A Single User And Display Them Here-->
        <?php
        $pid = $_GET['pid'];
        $sql = "SELECT  * FROM tbl_patient WHERE patientid=$pid";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) {
            $ptype = $data['ptid'];
            //$cnt=1;
            // $mysqlDateTime = $row->pat_date_joined;
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">View Patients</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo $data['name']; ?>'s Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">


                                    <div class="text-left mt-3">

                                        <p class="text mb-2 font-15"><strong>Name :</strong> <span class="ml-2"><?php echo $data['name']; ?> <?php echo $data['lname']; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Email :</strong><span class="ml-2"><?php echo $data['email']; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Mobile :</strong><span class="ml-2"><?php echo $data['phone']; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Address :</strong> <span class="ml-2"><?php echo $data['address'];; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Date Of Birth :</strong> <span class="ml-2"><?php echo date("d/m/Y", strtotime($data['dob']));; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Gender :</strong> <span class="ml-2"><?php echo $data['gender']; ?></span></p>
                                        <p class="text mb-2 font-15"><strong>Blood Group :</strong> <span class="ml-2"><?php echo $data['bloodgroup']; ?></span></p>
                                    </div>

                                </div> <!-- end card-box -->

                            </div> <!-- end col-->

                        <?php } ?>
                        <div class="col-lg-8 col-xl-8">
                            <div class="card-box">
                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Prescription
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            Vitals
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Lab Records
                                        </a>
                                    </li>
                                </ul>
                                <!--Medical History-->
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="aboutme">
                                        <ul class="list-unstyled timeline-sm">
                                            <?php
                                            $pid = $_GET['pid'];
                                            $sql = "SELECT  * FROM tbl_prescription WHERE patientid ='$pid'";
                                            $result = mysqli_query($con, $sql);
                                            while ($data = mysqli_fetch_array($result)) {
                                                // $ptype = $data['ptid'];
                                            ?>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date"><?php echo date("d/m/Y", strtotime($data['date'])); ?></span>
                                                    <h5 class="mt-0 mb-1"><?php echo $data['disease']; ?></h5>
                                                    <p class="text-muted mt-2">
                                                        <?php echo $data['description']; ?>
                                                    </p>

                                                </li>
                                            <?php } ?>
                                        </ul>

                                    </div> <!-- end tab-pane -->
                                    <!-- end Prescription section content -->

                                    <div class="tab-pane show " id="timeline">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Body Temperature</th>
                                                        <th>Heart Rate/Pulse</th>
                                                        <th>Blood Pressure</th>
                                                        <th>Date Recorded</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $pid = $_GET['pid'];
                                                $sql = "SELECT  * FROM tbl_vitals WHERE patientid ='$pid'";
                                                $result = mysqli_query($con, $sql);
                                                while ($data = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $data['bodytemp']; ?>°C</td>
                                                            <td><?php echo $data['heartrate']; ?>BPM</td>
                                                            <td><?php echo $data['bloodpress']; ?>mmHg</td>
                                                            <td><?php echo date("d/m/Y", strtotime($data['date'])); ?></td>
                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end vitals content-->

                                    <div class="tab-pane" id="settings">
                                        <ul class="list-unstyled timeline-sm">
                                            <?php
                                            $pid = $_GET['pid'];
                                            $sql = "SELECT  * FROM tbl_labreport WHERE patientid  = '$pid' order by date desc";
                                            $result = mysqli_query($con, $sql);
                                            while ($data = mysqli_fetch_array($result)) {
                                                $prid = $data['prescriptionid'];
                                                $test = $data['test'];
                                                $labresult = $data['result'];
                                                
                                            ?>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date"><?php echo date("d/m/Y", strtotime($data['date'])); ?></span>
                                                    <h3 class="mt-0 mb-1"><?php 
                                                    $sql = "SELECT  * FROM tbl_prescription WHERE patientid  = '$pid' and prescriptionid='$prid'";
                                                    $result = mysqli_query($con, $sql);
                                                    while ($data = mysqli_fetch_array($result)) {
                                                        echo $data['disease'];
                                                     } ?></h3>
                                                    <hr>
                                                    <h5>
                                                        Laboratory Tests
                                                    </h5>

                                                    <p class="text-muted mt-2">
                                                    <?php echo $test;?>
                                                </p>
                                                    <hr>
                                                    <h5>
                                                        Laboratory Results
                                                    </h5>

                                                    <p class="text-muted mt-2">
                                                        <?php echo $labresult; ?>
                                                    </p>
                                                    <hr>

                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end lab records content-->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card-box-->

                        </div> <!-- end col -->
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