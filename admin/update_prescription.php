<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
//echo NOW();

if (isset($_GET['pr_id'])) {
    $prid = $_GET['pr_id'];

    $sql = "SELECT * FROM `tbl_prescription` WHERE `prescriptionid`='$prid'";
    $result = mysqli_query($con, $sql);
    if($result){
        while($r=mysqli_fetch_assoc($result)){
           // $id=$r['departmentid'];
            $doctorid=$r['doctorid'];
            $patientid=$r['patientid'];
            $disease=$r['disease'];
            $desc=$r['description'];
        }
    }

    $sql1 = "SELECT * FROM `tbl_patient` WHERE `patientid`='$patientid'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        while ($r = mysqli_fetch_assoc($result1)) {
            $eptype = $r['ptid'];
        }
    }

  
}


if(isset($_POST['upd_pre']))
{   
    $prid = $_GET['pr_id'];
    //$dat= date('Y-m-d',strtotime($_POST['dat']));
    $disease=$_POST['disease'];
    $pres = $_POST['pres'];
    
    $sql = "UPDATE `tbl_prescription` SET `disease`='$disease',`description`='$pres',`date`=NOW() WHERE `prescriptionid`='$prid'";
    $res=mysqli_query($con,$sql);

	

    $ptype = $_POST['ptid'];
    $sql1 = "UPDATE `tbl_patient` SET `ptid`='$ptype' WHERE `patientid`='$patientid'";
    $res1=mysqli_query($con,$sql1);

    if($res && $res1)
	{
		$success = "Prescription added";
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
        <!-- <script type="text/javascript">
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
        </script> -->
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
                                                <label for="patientid" class="col-form-label">Name</label>
                                                <input disabled type="text" name="patid" class="form-control" id="patid" value="<?php 
                                                $sql = "select * from tbl_patient where patientid=$patientid";
                                                $result = mysqli_query($con, $sql);
                                                if($result){
                                                    while($r=mysqli_fetch_assoc($result)){
                                                        $id=$r['patientid'];
                                                        echo $r['name'];
                                                        
                                                    }
                                                }

                                                ?> <?php 
                                                $sql = "select * from tbl_patient where patientid=$patientid";
                                                $result = mysqli_query($con, $sql);
                                                if($result){
                                                    while($r=mysqli_fetch_assoc($result)){
                                                        $id=$r['patientid'];
                                                        echo $r['lname'];
                                                        
                                                    }
                                                }

                                                ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDegree" class="col-form-label">Designation</label>
                                                <select id="inputState" required="required" name="ptid" class="form-control" value=<?php echo $eptype; ?>>
                                                    <optgroup label="select category">

                                                        <?php

                                                        $sql1 = "select * from tbl_patient_type where ptid='$eptype'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $eptype; ?>"><?php echo $r['ptype']; ?></option>

                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                        <?php

                                                        $sql1 = "select * from tbl_patient_type where not ptid='$eptype'";
                                                        $res1 = mysqli_query($con, $sql1);
                                                        if (mysqli_num_rows($res1)) {
                                                            while ($r = mysqli_fetch_assoc($res1)) {
                                                        ?>
                                                                <option value="<?php echo $r['ptid']; ?>"><?php echo $r['ptype']; ?></option>
                                                        <?php
                                                            }
                                                        }

                                                        ?>

                                                        <!-- <option value="102">bike</option> -->
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDisease" class="col-form-label">Disease</label>
                                            <input required="required" type="text" name="disease" class="form-control" id="disease" value=<?php echo $disease;?>>
                                        </div>

                                        <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Prescription</label>
                                                        <textarea required="required"  type="text" class="form-control" name="pres" id="editor"><?php echo $desc;?></textarea>
                                                </div>

                                        <button type="submit" name="upd_pre" class="ladda-button btn btn-success" data-style="expand-right">Update Prescription</button>

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

    <div class="rightbar-overlay"></div>
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
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