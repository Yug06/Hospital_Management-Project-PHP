<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // $sql = "SELECT * FROM `tbl_prescription` WHERE `patientid`='$pid'";
    // $result = mysqli_query($con, $sql);
    // if ($result) {
    //     while ($r = mysqli_fetch_assoc($result)) {
    //         $prid = $r['prescriptionid'];
    //         $disease = $r['disease'];
    //         $desc = $r['description'];
    //     }
    // }

    $sql1 = "SELECT * FROM `tbl_patient` WHERE `patientid`='$pid'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        while ($r = mysqli_fetch_assoc($result1)) {
            $name = $r['name'];
            $lname = $r['lname'];
        }
    }
}
if(isset($_POST['allocate_bed']))
{
	$bedid = $_POST['bed'];
   $sql="INSERT INTO `tbl_bed_allocation`(`bedid`, `patientid`, `allotmentTime`) VALUES ('$bedid','$pid',NOW())";
   $res=mysqli_query($con,$sql);
   $sql2="UPDATE `tbl_bed` SET `status`='1' WHERE `bedid`='$bedid'";
   $res2=mysqli_query($con,$sql2);
	/*
	*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
	*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
	*/ 
	//declare a varible which will be passed to alert function
	if($res && $res2)
	{
		$success = "Bed allocated successfully";
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
                $("#room").change(function() {
                    var roomid = $(this).val();
                    $.ajax({
                        url: "get_bed.php",
                        method: "post",
                        data: {
                            roomID: roomid
                        },
                        success: function(data) {
                            $("#bed").html(data);
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bed Allocation</a></li>
                                        <li class="breadcrumb-item active">Allocate Bed</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Allocate Bed</h4>
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

                                            <!-- <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Disease</label>
                                                <input required="required" type="text" readonly name="disease" class="form-control" id="disease" value=<?php echo $disease; ?>>
                                            </div> -->

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="room" class="col-form-label">Room</label>
                                                <select id="room" required="required" name="room" class="form-control" onChange="getbed(this.value);">
                                                <option value="-1">--Select Room--</option>
                                                        <?php

                                                        $sql1 = "select * from tbl_room";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['roomid']; ?>"><?php echo $r['number']; echo "-".$r['roomtype']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                        <!-- <option value="102">bike</option> -->
                                                  
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="bed" class="col-form-label">Bed</label>
                                                <select id="bed" required="required" name="bed" class="form-control">
                                                    <optgroup label="select bed">

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit" name="allocate_bed" class="ladda-button btn btn-success" data-style="expand-right">Allocate bed</button>

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