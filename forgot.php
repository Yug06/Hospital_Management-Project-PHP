<?php
include 'conn.php';
if (isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];


    // $sql1 = "select * from patient where email='$uname' and password='$pass'";
    // $res1=mysqli_query($con,$sql1);
    // $r1=mysqli_fetch_assoc($res1);



    if (empty($uname)) {
        echo "<script>alert('Username Required!!')</script>";
    } else if (empty($pass)) {
        echo "<script>alert('Password Required!!')</script>";
    } else if (!empty($uname) && !empty($pass)) {
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
            header('location:patient/book_appointment.php');
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
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to book an appointment.</p>
                            </div>

                            <form method='post'>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email</label>
                                    <input class="form-control" name="uname" type="text" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="pass" type="password" required="" id="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Confirm Password</label>
                                    <input class="form-control" name="cpass" type="password" required="" id="cpassword" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-success btn-block" name="submit" type="submit"> Log In </button>
                                </div><br>
                                <div class="form-group mb-2 text-center">
                                    <p>Don't have an account yet? <a href="patient_register.php" style="color: #65c9cd;;
    text-decoration: underline;
    text-decoration-color: #65c9cd;;">Create Account</a></p>
                                </div><br>
                                <div class="form-group mb-2 text-center">
                                    <p>Forgot Password? <a href="patient_register.php" style="color: #65c9cd;;
    text-decoration: underline;
    text-decoration-color: #65c9cd;;">Click here</a></p>
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