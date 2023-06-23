<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['admin_id'];
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
        $s_id = $_GET['s_id'];
        $sql = "SELECT  * FROM tbl_staff WHERE sid='$s_id'";
        $result = mysqli_query($con, $sql);
        

        if ($result) {
            //  $doc_number=$_GET['doc_number'];
            //$cnt=1;
            while ($row = mysqli_fetch_assoc($result)) {
                $stid = $row['stid'];
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employees</a></li>
                                                <li class="breadcrumb-item active">View Employees</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><?php echo $row['name']; ?> 's Profile</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                               
                                    <div class="card-box text-center" style="width: 100%; display: flex; justify-content: space-between;">
                                        <div class="image">
                                            
                                            <img src="../staff/<?php echo $row['picture']; ?>" class="avatar-lg img-fluid" alt="profile-image" style="height: 55%; width: 65%; border-radius: 6px; margin-top: 80px; margin-left: 100px;">
                                        </div>
                                        

                                        <div class="text-centre mt-5" style="margin-right: 200px; text-align: center;">
                                            <p class="mb-2 font-20"><strong>Id :</strong> <span class="ml-2"><?php echo $s_id; ?></span></p>
                                            <p class="mb-2 font-20"><strong>Name :</strong> <span class="ml-2"><?php echo $row['name']; ?> <?php echo $row['lname']; ?></span></p>
                                            <p class="mb-2 font-20"><strong>Email :</strong> <span class="ml-2"><?php echo $row['email']; ?></span></p>
                                            <p class="mb-2 font-20"><strong>Address :</strong> <span class="ml-2"><?php echo $row['address']; ?></span></p>
                                            <p class="mb-2 font-20"><strong>Mobile Number :</strong> <span class="ml-2"><?php echo $row['phone']; ?></span></p>
                                            <p class="mb-2 font-20"><strong>Designation :</strong> <span class="ml-2">
                                                    <?php

                                                    $sql1 = "select designation from tbl_staff_type where `stid`='$stid'";
                                                    $res1 = mysqli_query($con, $sql1);
                                                    if (mysqli_num_rows($res1)) {
                                                        while ($r = mysqli_fetch_assoc($res1)) {
                                                    ?>
                                                            <?php echo $r['designation']; ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </span></p>
                                        </div>

                                    </div> <!-- end card-box -->

                               

                                <!-- end row-->

                            </div> <!-- container -->

                        </div> <!-- content -->

                        <!-- Footer Start -->
                        <?php include('assets/inc/footer.php'); ?>
                        <!-- end Footer -->

                    </div>
            <?php }
        } ?>

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