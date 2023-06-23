<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$pid = $_SESSION['pid'];
//$pid = $_GET['pid'];
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

$sql2 = "SELECT * FROM `tbl_patient` WHERE `patientid`='$pid'";
$result2 = mysqli_query($con, $sql2);
while ($data = mysqli_fetch_array($result2)) {
    $name = $data['name'];
    $lname = $data['lname'];
    $email = $data['email'];
    $phone = $data['phone'];
    // $tamt = $data['totalamount'];
}

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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Payrolls</a></li>
                                        <li class="breadcrumb-item active">Generate Payrolls</li>
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
                                <form method="post" enctype="multipart/form-data">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <img src="assets/images/CareConnect4.png" alt="" height="70">
                                        </div>
                                        <div class="float-right">
                                            <input type="hidden" id="name" value="<?php echo $name; ?> <?php echo $lname; ?>">
                                            <input type="hidden" id="email" value="<?php echo $email; ?>">
                                            <input type="hidden" id="phone" value="<?php echo $phone; ?>">
                                            <h4 class="m-0 d-print-none"><?php echo $name; ?> <?php echo $lname; ?>'s Bill</h4>
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
                                                                                                                                                                        echo "Unpaid";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "Paid";
                                                                                                                                                                    } ?></span></span></p>
                                                <p class="m-b-10"><strong>Invoice id : </strong> <span class="float-right"> <input type="hidden" id="invoice" value="<?php echo $invoiceid; ?>"><?php echo $invoiceid; ?></span></p>
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
                                                            <td class="text-right"> <i class="mdi mdi-currency-inr mr-1"></i>
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
                                                <p><b>Sub-total:</b> <span class="float-right">
                                                        <h3><i class="mdi mdi-currency-inr mr-1"></i> <?php echo $tamt; ?></h3>
                                                        <input type="hidden" id="tamt" value="<?php echo $tamt; ?>">

                                                    </span></p>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="mt-4 mb-1">

                                        <div class="text-right d-print-none">
                                            <button type="button" <?php if($status==1) {?> disabled="disabled" <?php } ?> class="btn btn-primary waves-effect waves-light" id="rzp-button1" onclick="pay_now()"><i class="mdi mdi-credit-card"></i> Pay</button>
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                        </div>
                                    </div>
                                </form>
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
<!---Payment-->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function pay_now() {
        var invoiceid = $("#invoice").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var tamt = $("#tamt").val();
        var ramt = tamt * 100;
        //alert(invoiceid);
        var options = {
            "key": "rzp_test_zSWOntrwAIVp92", // Enter the Key ID generated from the Dashboard
            "amount": ramt, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": name,
            "description": "Transaction",
            "image": "../img/CareConnect4.png",
            //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                console.log(response);
                $.ajax({
                    url: 'process_payment.php',
                    type: 'post',
                    data: {
                        'payment_id': response.razorpay_payment_id,
                        'invoiceid': invoiceid
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.href = 'generate_bill.php';
                    }
                });
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
            },
            "prefill": {
                "name": name,
                "email": email,
                "contact": phone
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    }
</script>