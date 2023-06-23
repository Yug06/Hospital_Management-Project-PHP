<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if(isset($_POST['add_apt']))
{   
    $doctorid = $_POST['doc'];
    $patientid=$_SESSION['pid'];
    $dat= date('Y-m-d',strtotime($_POST['dat']));
    $time=$_POST['time'];
    $fee = 500;
    $status= 1;
    $sql = "INSERT INTO `tbl_appointment`(`doctorid`, `patientid`, `appointmentDate`, `appointmentTime`, `fees`, `status`) VALUES ('$doctorid','$patientid','$dat','$time','$fee','$status')";
    $res=mysqli_query($con,$sql);

	if($res)
	{
		$success = "Appointment booked";
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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#dep").change(function() {
                    var departmentid = $(this).val();
                    $.ajax({
                        url: "get_doctor.php",
                        method: "post",
                        data: {
                            departmentID: departmentid
                        },
                        success: function(data) {
                            $("#doc").html(data);
                        }
                    });
                });
            });
        </script>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">Add Patient</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Patient Details</h4>
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

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="dep" class="col-form-label">Department</label>
                                                <select id="dep" required="required" name="dep" class="form-control" onChange="getdoctor(this.value);">
                                                    <optgroup label="select type">

                                                        <?php

                                                        $sql1 = "select * from tbl_department";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['departmentid']; ?>"><?php echo $r['name']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="doc" class="col-form-label">Doctor</label>
                                                <select id="doc" required="required" name="doc" class="form-control">
                                                    <optgroup label="select doctor">

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Date</label>
                                            <input required="required" type="date" name="dat" class="form-control" id="inputdat">
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputTime" class="col-form-label">Time</label>
                                                <input required="required" type="time" name="time" value="09:30" min="09:00" max="20:00" class="form-control" id="inputTime">
                                                <!-- <select id="inputTime" required="required" name="time" class="form-control">
                                                    <optgroup label="select time">
                                                        <option>9 AM</option>
                                                        <option>10 AM</option>
                                                        <option>11 AM</option>
                                                        <option>12 PM</option>
                                                        <option>5 PM</option>
                                                        <option>6 PM</option>
                                                        <option>7 PM</option>
                                                        <option>8 PM</option>
                                                    </optgroup>
                                                </select> -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputFees" class="col-form-label">Fees</label>
                                            <input required="required" disabled type="text" name="fee" class="form-control" id="inputfee" value="500">
                                        </div>


                                        <button type="submit" name="add_apt" class="ladda-button btn btn-success" data-style="expand-right">Book</button>

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