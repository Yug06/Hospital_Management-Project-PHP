<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['pid'])&&isset($_GET['lid'])) {
    $pid = $_GET['pid'];
    $lid = $_GET['lid'];
    $sql = "SELECT * FROM `tbl_prescription` WHERE `patientid`='$pid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($r = mysqli_fetch_assoc($result)) {
            $prid = $r['prescriptionid'];
            $disease = $r['disease'];
            $desc = $r['description'];
        }
    }

    $sql1 = "SELECT * FROM `tbl_patient` WHERE `patientid`='$pid'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        while ($r = mysqli_fetch_assoc($result1)) {
            $name = $r['name'];
            $lname = $r['lname'];
        }
    }

    $sql1 = "SELECT * FROM `tbl_labreport` WHERE `patientid`='$pid' and `lid`='$lid'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        while ($r = mysqli_fetch_assoc($result1)) {
            $test = $r['test'];
            
        }
    }
}

if(isset($_POST['add_patient_labresult']))
{
	$fee = $_POST['fee'];
    $test = $_POST['labtest'];
   // $sid = $_POST['sid'];
    $labtest = $_POST['labtest'];
    $labresult=$_POST['labresult'];
   $sql="UPDATE `tbl_labreport` SET `test`='$labtest',`result`='$labresult' WHERE `patientid`='$pid' and `lid`='$lid'";
   $res=mysqli_query($con,$sql);
	/*
	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
	*/ 
	//declare a varible which will be passed to alert function
	if($res)
	{
		$success = "Patient Laboratory Result Addded";
	}
	else {
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Laboratory</a></li>
                                        <li class="breadcrumb-item active">Add Lab Test</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Lab Test</h4>
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
                                                <input type="text" required="required" readonly name="name" class="form-control" id="name" value="<?php echo $name; ?> <?php echo $lname ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Disease</label>
                                                <input required="required" type="text" readonly name="disease" class="form-control" id="disease" value=<?php echo $disease; ?>>
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Fees</label>
                                                <input type="text" required="required" readonly name="fee" class="form-control" id="fee" value="500">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Pathologist</label>
                                                <select id="sid" required="required" name="sid" class="form-control">
                                                    <optgroup label="select category">
                                                        <?php

                                                        $sql1 = "select * from tbl_staff where stid=(select stid from tbl_staff_type where designation='Pathologist')";//stid=3 is from staff type which is pathologist
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['sid']; ?>"><?php echo $r['name']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>


                                        </div>


                                        <hr>


                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Laboratory Tests</label>
                                            <textarea required="required" type="text" class="form-control" name="labtest" id="editor"><?php echo $test;?></textarea>
                                        </div>

                                        <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Laboratory Result</label>
                                                        <textarea required="required" type="text" class="form-control" name="labresult" id="editor1"></textarea>
                                                </div>

                                        <button type="submit" name="add_patient_labresult" class="ladda-button btn btn-success" data-style="expand-right">Add Laboratory Result</button>

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
    <script type="text/javascript">
         CKEDITOR.replace('editor1')
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