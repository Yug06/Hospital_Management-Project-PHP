<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['update_profile'])) {
    $pid = $_SESSION['pid'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dob= date('Y-m-d',strtotime($_POST['dob']));

    $sql = "UPDATE `tbl_patient` SET `name`='$name',`lname`='$lname',`email`='$email',`dob`='$dob',`address`='$address',`phone`='$phone' WHERE `patientid`='$pid'";
    $res = mysqli_query($con, $sql);

    if ($res) {
        $success = "Patient Details Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
//Change Password
if (isset($_POST['update_pwd'])) {
    $pid = $_SESSION['pid'];
    $pwd = sha1(md5($_POST['pwd'])); //double encrypt 

    //sql to insert captured values
    $query = "UPDATE tbl_patient SET password =? WHERE patientid = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('si', $pwd, $pid);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Password Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
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
        <?php include('assets/inc/sidebar.php'); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.cpass.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.cpass.focus();
                    return false;
                } else if (document.chngpwd.pwd.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.pwd.focus();
                    return false;
                } else if (document.chngpwd.cfpass.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.cfpass.focus();
                    return false;
                } else if (document.chngpwd.pwd.value != document.chngpwd.cfpass.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.cfpass.focus();
                    return false;
                }
                return true;
            }
        </script>
        <?php
        $pid = $_SESSION['pid'];
        $sql = "SELECT  * FROM tbl_patient WHERE patientid='$pid'";
        $result = mysqli_query($con, $sql);


        if ($result) {
            //  $number=$_GET['number'];
            //$cnt=1;
            while ($row = mysqli_fetch_assoc($result)) {
                // $departmentid = $row['departmentid'];
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
                                                <li class="breadcrumb-item active">Profile</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"><?php echo $row['name']; ?> <?php echo $row['lname']; ?>'s Profile</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-lg-4 col-xl-4">
                                    <div class="card-box text-center">
                                        <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">


                                        <div class="text-left mt-3">

                                            <p class="mb-2 font-15"><strong>Id :</strong> <span class="ml-2"><?php echo $pid; ?></span></p>
                                            <p class="mb-2 font-15"><strong>Name :</strong> <span class="ml-2"><?php echo $row['name']; ?> <?php echo $row['lname']; ?></span></p>
                                            <p class="mb-2 font-15"><strong>Email :</strong> <span class="ml-2"><?php echo $row['email']; ?></span></p>
                                            <p class="mb-2 font-15"><strong>Address :</strong> <span class="ml-2"><?php echo $row['address']; ?></span></p>
                                            <p class="mb-2 font-15"><strong>Mobile Number :</strong> <span class="ml-2"><?php echo $row['phone']; ?></span></p>
                                            <!-- <p class="mb-2 font-15"><strong>Gender :</strong> <span class="ml-2"></span></p> -->
                                            <p class="mb-2 font-15"><strong>Date of Birth :</strong> <span class="ml-2">
                                                    <?php echo date("d/m/Y", strtotime($row['dob']));; ?>
                                                </span></p>
                                                <!-- <p class="mb-2 font-15"><strong>Blood Group :</strong> <span class="ml-2"></span></p> -->

                                        </div>

                                    </div> <!-- end card-box -->

                                </div> <!-- end col-->

                                <div class="col-lg-8 col-xl-8">
                                    <div class="card-box">
                                        <ul class="nav nav-pills navtab-bg nav-justified">
                                            <li class="nav-item">
                                                <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Update Profile
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    Change Password
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="aboutme">

                                                <form method="post" enctype="multipart/form-data">
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $row['name']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastname">Last Name</label>
                                                                <input type="text" name="lname" class="form-control" id="inputlastName" value="<?php echo $row['lname']; ?>">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Email Address</label>
                                                                <input type="text" name="email" class="form-control" id="inputEmail" value="<?php echo $row['email']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Address</label>
                                                                <textarea name="address" type="text" class="form-control" id="inputAddress"><?php echo $row['address']; ?></textarea>

                                                            </div>
                                                        </div>

                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Phone</label>
                                                                <input type="text" name="phone" pattern="^\d{10}$" class="form-control" id="inputPhone" value="<?php echo $row['phone']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Date of Birth</label>
                                                                <input type="date" name="dob" class="form-control" id="inputDob" value=<?php echo $row['dob']; ?>>
                                                            </div>
                                                        </div>

                                                    </div> <!-- end row -->

                                                    <!--
                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="companyname">Company Name</label>
                                                                <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="cwebsite">Website</label>
                                                                <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                                            </div>
                                                        </div> 
                                                    </div> 

                                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-fb">Facebook</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-tw">Twitter</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-insta">Instagram</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-lin">Linkedin</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div> 

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-sky">Skype</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="social-gh">Github</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-github"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>  -->

                                                    <div class="text-right">
                                                        <button type="submit" name="update_profile" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                </form>


                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->



                                            <div class="tab-pane" id="settings">
                                                <form method="post" name="chngpwd" onSubmit="return valid();">
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstname">Old Password</label>
                                                                <input type="password" class="form-control" name="cpass" id="firstname" placeholder="Enter Old Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastname">New Password</label>
                                                                <input type="password" class="form-control" name="pwd" id="lastname" placeholder="Enter New Password">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="form-group">
                                                        <label for="useremail">Confirm Password</label>
                                                        <input type="password" class="form-control" name="cfpass" id="useremail" placeholder="Confirm New Password">
                                                    </div>

                                                    <div class="text-right">
                                                        <button type="submit" name="update_pwd" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end settings content-->

                                        </div> <!-- end tab-content -->
                                    </div> <!-- end card-box-->

                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->

                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <?php include("assets/inc/footer.php"); ?>
                    <!-- end Footer -->

                </div>
        <?php }
        } ?>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>


</html>