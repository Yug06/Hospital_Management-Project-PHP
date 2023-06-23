<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

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

    $sql2 = "SELECT count(*),fees FROM `tbl_appointment` WHERE `patientid`='$pid' and status=1";
    $result2 = mysqli_query($con, $sql2);
    if ($result2) {
        while ($r = mysqli_fetch_assoc($result2)) {
            $acount = $r['count(*)'];
            $afees = $r['fees'];
            $atotal = $acount * $afees;
        }
    }

    $sql3 = "SELECT count(*),fees FROM `tbl_labreport` WHERE `patientid`='$pid'";
    $result3 = mysqli_query($con, $sql3);
    if ($result3) {
        while ($r = mysqli_fetch_assoc($result3)) {
            $lcount = $r['count(*)'];
            $lfees = $r['fees'];
            $ltotal = $lcount * $lfees;
        }
    }

    $sql4 = "SELECT * FROM `tbl_invoice` WHERE `patientid`='$pid'";
    $result4 = mysqli_query($con, $sql4);
    if ($result4) {
        while ($r = mysqli_fetch_assoc($result4)) {
           $amt = $r['amount'];
           $tamt = $r['totalamount'];
           $st = $r['status'];
           $des = $r['description'];
        }
    }
}
if(isset($_POST['upd_bill']))
{
    $inid = $_GET['inid'];
    $des = $_POST['descr'];
    $status = $_POST['st'];
   $sql="UPDATE `tbl_invoice` SET `status`='$status',`description`='$des' WHERE `invoiceid`='$inid'";
   $res=mysqli_query($con,$sql);
	/*
	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
	*/ 
	//declare a varible which will be passed to alert function
	if($res)
	{
		$success = "Bill Updated";
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bill</a></li>
                                        <li class="breadcrumb-item active">Add Bill</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Bill</h4>
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

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Disease</label>
                                                <input required="required" type="text" readonly name="disease" class="form-control" id="disease" value=<?php echo $disease; ?>>
                                            </div>

</div>



                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Total Amount</label>
                                                <input type="text" required="required" readonly name="tfee" class="form-control" id="tfee" value="<?php echo $tamt; ?>">
                                            </div>

                                           
                                            <div class="form-group col-md-6">
                                                <label for="st" class="col-form-label">Status</label>
                                                <select id="inputStatus" name="st" class="form-control">
                                                <optgroup label="select category">
                                                <option <?php
                                                                if ($st == "0") {
                                                                    echo "selected";
                                                                } ?>>Unpaid</option>
                                                        <option <?php
                                                                if ($st == "1") {
                                                                    echo "selected";
                                                                } ?>>Paid</option>
                                                </optgroup>
                                                </select>
                                            </div>
                                        
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Description</label>
                                            <textarea required="required" type="text" class="form-control" name="descr" id="editor"><?php echo $des;?></textarea>
                                        </div>

                                        <button type="submit" name="upd_bill" class="ladda-button btn btn-success" data-style="expand-right">Update Bill</button>

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