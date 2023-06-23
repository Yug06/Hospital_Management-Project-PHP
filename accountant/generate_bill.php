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
        <?php include('assets/inc/nav.php'); ?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bill</a></li>
                                        <li class="breadcrumb-item active">Generate Bill</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Generate Bill</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Show all</option>
                                                    <option value="Discharged">Discharged</option>
                                                    <option value="OutPatients">OutPatients</option>
                                                    <option value="InPatients">InPatients</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Patient Name</th>
                                                <th data-hide="phone">Patient id</th>
                                                <th data-hide="phone">Date</th>
                                                <th data-hide="phone">Patient Category</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */

                                        $sql1 = "select p.patientid,p.name,p.lname,i.date,p.ptid,i.invoiceid from tbl_patient p, tbl_invoice i where p.patientid = i.patientid";
                                        $result1 = mysqli_query($con, $sql1);
                                        $cnt = 1;
                                        while ($data = mysqli_fetch_array($result1)) {
                                            // $doctorid = $data['doctorid'];
                                            $patientid = $data['patientid'];
                                            $eptype = $data['ptid'];
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $data['name']; ?> <?php echo $data['lname']; ?></td>
                                                    <td><?php echo $patientid; ?></td>
                                                    <td><?php echo date("d/m/Y - h:m:s", strtotime($data['date'])); ?></td>
                                                    <td> <?php

                                                            $sql1 = "select ptype from tbl_patient_type where `ptid`='$eptype'";
                                                            $res1 = mysqli_query($con, $sql1);
                                                            if (mysqli_num_rows($res1)) {
                                                                while ($r = mysqli_fetch_assoc($res1)) {
                                                            ?>
                                                                <?php echo $r['ptype']; ?>
                                                        <?php
                                                                }
                                                            }
                                                        ?></td>

                                                    <td><a href="generate_individual_bill.php?pid=<?php echo $data['patientid'] ?>&&inid=<?php echo $data['invoiceid']?>" class="badge badge-success"><i class="mdi mdi-beaker "></i>Get Bill</a></td>
                                                </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
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

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>