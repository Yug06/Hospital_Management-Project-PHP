<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$pid = $_SESSION['pid'];


$sql1 = "SELECT * FROM `tbl_patient` WHERE `patientid`='$pid'";
$result1 = mysqli_query($con, $sql1);
if ($result1) {
    while ($r = mysqli_fetch_assoc($result1)) {
        $name = $r['name'];
        $lname = $r['lname'];
    }
}
if(isset($_POST['add']))
{
	// $patientid = $_POST['fee'];
    $review = $_POST['rev'];
    $status = '0';
   $sql="INSERT INTO `tbl_testimonial`(`patientid`, `review`,`status`) VALUES ('$pid','$review','$status')";
   $res=mysqli_query($con,$sql);
	/*
	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
	*/ 
	//declare a varible which will be passed to alert function
	if($res)
	{
		$success = "Review Addded";
	}
	else {
		$err = "Please Try Again Or Try Later";
	}


}

?>

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website</a></li>
                                        <li class="breadcrumb-item active">Add Review</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Review</h4>
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
                                    <form method="post">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Patient Name</label>
                                                <input type="text" required="required" readonly name="name" class="form-control" id="name" value="<?php echo $name; ?> <?php echo $lname; ?>">
                                            </div>

                                        </div>

                                      
                                          

                                        <hr>


                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Write a review</label>
                                            <textarea required="required" type="text" class="form-control" name="rev" id="editor"></textarea>
                                        </div>

                                        <button type="submit" name="add" class="ladda-button btn btn-success" data-style="expand-right">Add Review</button>

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