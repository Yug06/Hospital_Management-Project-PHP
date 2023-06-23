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
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('assets/inc/sidebar.php'); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        $pid = $_GET['pid'];
        $inid = $_GET['inid'];
        $sql = "SELECT * FROM `tbl_invoice` WHERE `patientid`='$pid' and `invoiceid`='$inid'";
        $result = mysqli_query($con, $sql);
        $cnt = 1;
        while ($data = mysqli_fetch_array($result)) {
            $status = $data['status'];
            $date = date("d/m/Y - h:m:s", strtotime($data['date']));
            $invoiceid = $data['invoiceid'];
            $amount = $data['amount'];
            $desc = $data['description'];
            $tamt = $data['totalamount'];
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bills</a></li>
                                            <li class="breadcrumb-item active">Generate Bill</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Payroll</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!-- Logo & title -->
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <img src="assets/images/CareConnect4.png" alt="" height="70">
                                        </div>
                                        <div class="float-right">
                                            <h4 class="m-0 d-print-none"><?php
                                                                            $sql = "select * from tbl_patient where patientid='$pid'";
                                                                            $result = mysqli_query($con, $sql);
                                                                            while ($data = mysqli_fetch_array($result)) {
                                                                                echo $data['name']; ?> <?php echo $data['lname'];
                                                                                                    }
                                                                                                        ?>'s Bill</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <p><b></b></p>
                                                <p class="text-muted"></p>
                                            </div>

                                        </div><!-- end col -->
                                        <div class="col-md-4 offset-md-2">
                                            <div class="mt-3 float-right">
                                                <p class="m-b-10"><strong>Generated Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date; ?> </span></p>
                                                <p class="m-b-10"><strong>Payroll Status : </strong> <span class="float-right"><span class="badge badge-success"><?php if ($status == 0) {
                                                                                                                                                                        echo "unpaid";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "paid";
                                                                                                                                                                    } ?></span></span></p>
                                                <p class="m-b-10"><strong>Invoice id : </strong> <span class="float-right"><?php echo $invoiceid; ?></span></p>
                                                <p class="m-b-10"><strong>Patient id : </strong> <span class="float-right"><?php echo $pid; ?></span></p>

                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->


                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4 table-centered table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Services</th>
                                                            <th style="width: 10%" class="text-right">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo 1; ?></td>
                                                            <td><?php echo "Appointment fees" ?></td>
                                                            <td class="text-right">
                                                            <i class="mdi mdi-currency-inr mr-1"></i> 
                                                                <?php

                                                                $sql2 = "SELECT count(*),fees FROM `tbl_appointment` WHERE `patientid`='$pid' and status=1";
                                                                $result2 = mysqli_query($con, $sql2);
                                                                if ($result2) {
                                                                    while ($r = mysqli_fetch_assoc($result2)) {
                                                                        $acount = $r['count(*)'];
                                                                        $afees = $r['fees'];
                                                                        echo $atotal = $acount * $afees;
                                                                    }
                                                                } ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo 2; ?></td>
                                                            <td><?php echo "Lab Fees" ?></td>
                                                            <td class="text-right">
                                                            <i class="mdi mdi-currency-inr mr-1"></i> 
                                                                <?php

                                                                $sql3 = "SELECT count(*),fees FROM `tbl_labreport` WHERE `patientid`='$pid'";
                                                                $result3 = mysqli_query($con, $sql3);
                                                                if ($result3) {
                                                                    while ($r = mysqli_fetch_assoc($result3)) {
                                                                        $lcount = $r['count(*)'];
                                                                        $lfees = $r['fees'];
                                                                     echo   $ltotal = $lcount * $lfees;
                                                                    }
                                                                } ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo 3; ?></td>
                                                            <td><?php echo "Room Charges" ?></td>
                                                            <td class="text-right">  <i class="mdi mdi-currency-inr mr-1"></i> 
                                                                <?php
                                                                   echo $amount;                 
                                                             ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive -->
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="clearfix pt-5">
                                                <h6 class="text-muted">Notes:</h6>

                                                <small class="text-muted">
                                                    <?php echo $desc; ?>
                                                </small>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="float-right">
                                                <p><b>Sub-total:</b> <span class="float-right"><h3><i class="mdi mdi-currency-inr mr-1"></i> <?php echo $tamt; ?></h3></span></p>
                                                
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="mt-4 mb-1">
                                        <div class="text-right d-print-none">
                                            
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include("assets/inc/footer.php"); ?>
                <!-- end Footer -->

            </div>
       
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>


