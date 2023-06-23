<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
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
        <?php include("assets/inc/sidebar.php"); 
         session_start();
         include('assets/inc/config.php');
         include('assets/inc/checklogin.php');
         check_login();
        //  $adminid=$_SESSION['admin_id'];
        //  if (isset($_GET['del_id'])) {
        //    $did = $_GET['del_id'];
        //    $sql = "DELETE FROM `tbl_slideshow` WHERE `id`='$did'";
        //    $result = mysqli_query($con, $sql);
        //    if ($result) {
        //        $success = "image deleted";
        //    } else {
        //        $err = "Please Try Again Or Try Later";
        //    }
        // }?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slideshow</a></li>
                                        <li class="breadcrumb-item active">Add Image</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Image</h4>
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
                                    

                                    <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Name</th>
                                                <th data-toggle="true">Email</th>
                                                <th data-toggle="true">Subject</th>
                                                <!-- <th data-toggle="true">Message</th> -->
                                                <th data-toggle="true">Date</th>
                                                <th data-toggle="true">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */

                                        $sql1 = "SELECT * FROM tbl_contact";
                                        $result1 = mysqli_query($con, $sql1);
                                        $cnt = 1;
                                        while ($data = mysqli_fetch_array($result1)) {
                                            // $doctorid = $data['doctorid'];
                                            // $picture = $data['picture'];
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>   
                                                    <td><?php echo $data['name']; ?></td>   
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo $data['subject']; ?></td>
                                                    <!-- <td><?php echo $data['message']; ?></td> -->
                                                    <td><?php echo date("d/m/Y", strtotime($data['date']));; ?></td>
                                                    <td>  <a href="gallery.php?del_id=<?php echo $data['id']; ?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a></td>
                                                    </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        
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
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor')
    </script>

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