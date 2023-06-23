<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];


    // $sql1 = "select * from patient where email='$uname' and password='$pass'";
    // $res1=mysqli_query($con,$sql1);
    // $r1=mysqli_fetch_assoc($res1);



    if (empty($uname)) {
        echo "<script>alert('Username Required!!')</script>";
    } else if (empty($pass)) {
        echo "<script>alert('Password Required!!')</script>";
    } else if ($type == "Admin") {


        $sql = "select * from admin where uname='$uname' and pass='$pass'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        //print_r($res);
        if ($r) {
            session_start();
            $_SESSION['uname'] = $r['uname'];
            $_SESSION['pass'] = $r['pass'];
            $_SESSION['admin_id'] = $r['admin_id'];
            //print_r($_SESSION);
            header('location:admin/his_admin_dashboard.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    } else if ($type == "Doctor") {
        session_start();
        $doc_pwd = sha1(md5($_POST['pass']));
        $sql = "select * from tbl_doctor where email='$uname' and password='$doc_pwd'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        if ($r) {
            $_SESSION['did'] = $r['doctorid'];
            $_SESSION['uname'] = $r['name'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['pass'] = $r['password'];
            //print_r($_SESSION);
            header('location:doctor/index.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    } else if ($type == "Patient") {
        session_start();
        $pwd = sha1(md5($_POST['pass']));
        $sql = "select * from tbl_patient where email='$uname' and password='$pwd'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        if ($r) {
            $_SESSION['pid'] = $r['patientid'];
            $_SESSION['uname'] = $r['name'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['pass'] = $r['password'];
            header('location:patient/index.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    } else if ($type == "Nurse") {
        session_start();
        $pwd = sha1(md5($_POST['pass']));
        $sql = "select * from tbl_staff where email='$uname' and password='$pwd'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        if ($r) {
            $_SESSION['sid'] = $r['sid'];
            $_SESSION['uname'] = $r['name'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['pass'] = $r['pass'];
            header('location:nurse/index.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    // } else if ($type == "Pharmacist") {
    //     session_start();
    //     $sql = "select * from tbl_staff where email='$uname' and password='$pass'";
    //     $res = mysqli_query($con, $sql);
    //     $r = mysqli_fetch_assoc($res);
    //     if ($r) {
    //         $_SESSION['uname'] = $r['name'];
    //         $_SESSION['pass'] = $r['pass'];
    //         header('location:nurse/index.php');
    //     } else {
    //         echo "<script>alert('Wrong Credentials!!')</script>";
    //     }
    } else if ($type == "Pathologist") {
        session_start();
        $pwd = sha1(md5($_POST['pass']));
        $sql = "select * from tbl_staff where email='$uname' and password='$pwd'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        if ($r) {
            $_SESSION['sid'] = $r['sid'];
            $_SESSION['uname'] = $r['name'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['pass'] = $r['pass'];
            header('location:pathologist/index.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    } else if ($type == "Accountant") {
        session_start();
        $pwd = sha1(md5($_POST['pass']));
        $sql = "select * from tbl_staff where email='$uname' and password='$pwd'";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        if ($r) {
            $_SESSION['sid'] = $r['sid'];
            $_SESSION['uname'] = $r['name'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['pass'] = $r['pass'];
            header('location:accountant/index.php');
        } else {
            echo "<script>alert('Wrong Credentials!!')</script>";
        }
    } else {
        echo "<script>alert('Please select role')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hospital Management System -A Super Responsive Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="MartDevelopers" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="img/CareConnect4.png">

    <!-- App css -->
    <link href="doctor/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="doctor/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="doctor/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!--Load Sweet Alert Javascript-->

    <script src="doctor/assets/js/swal.js"></script>
</head>

<style>
    body {


        background-image: url('img/gallery/gallery-7.jpg');
        /* Full height */
        /* height: 100%; */

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="index.php">
                                    <span><img src="doctor/assets/images/careconnect4.png" alt="" height="50"><img src="doctor/assets/images/careconnect5.png" alt="" height="70"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access your dashboard.</p>
                            </div>

                            <form method='post'>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="emailaddress">Select role</label><br>
                                        <select class="form-control" name="type">
                                            <option value="-1">--Select--</option>
                                            <option value="Patient">Patient</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Nurse">Nurse</option>
                                            <!-- <option value="Pharmacist">Pharmacist</option> -->
                                            <option value="Pathologist">Pathologist</option>
                                            <option value="Accountant">Accountant</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email</label>
                                    <input class="form-control" name="uname" type="text" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="pass" type="password" required="" id="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" name="submit" type="submit"> Log In </button>
                                </div><br>
                                <div class="form-group mb-2 text-center">
                                    <p>Don't have an account yet? <a href="patient_register.php" style="color: #65c9cd;;
    text-decoration: underline;
    text-decoration-color: #65c9cd;;">Create Account</a></p>
                                </div>
                            </form>

                            <!--
                                For Now Lets Disable This 
                                This feature will be implemented on later versions
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> 
                                -->

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- <div class="row mt-3">
                       
                        <div class="text-center col-12">
                                    <a href="#" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-login-variant"></i>Sign Up</a>
                                </div>
                        </div> 
                    </div> -->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- Vendor js -->
    <script src="doctor/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="doctor/assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>