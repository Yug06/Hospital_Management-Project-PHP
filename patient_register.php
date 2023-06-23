<?php
include 'conn.php';
if(isset($_POST['add_pat']))
{
$name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = sha1(md5($_POST['password']));
    $gender=$_POST['gender'];
    $dob= date('Y-m-d',strtotime($_POST['dob']));
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $blood = $_POST['blood'];
    $ptype = '101';

    $sql = "INSERT INTO `tbl_patient`(`name`, `lname`, `email`, `password`, `gender`, `dob`, `address`, `phone`, `bloodgroup`, `ptid`) VALUES ('$name','$lname','$email','$password','$gender','$dob','$address','$phone','$blood','$ptype')";
    $res=mysqli_query($con,$sql);

	if($res)
	{
        echo '<script>alert("Patient details added!!")</script>';
        header('location:login.php');
	}
	else {
        echo '<script>alert("Please Try Again Or Try Later")</script>';
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


        /* background-image: url('img/gallery/gallery-7.jpg'); */
        /* Full height */
        /* height: 100%; */

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script type="text/javascript">
            function valid() {
               
                if (document.chngpwd.password.value != document.chngpwd.cpass.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.cpass.focus();
                    return false;
                }
                return true;
            }
        </script>

<body>

<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="text-center w-75 m-auto">
                                <a href="index.php">
                                    <span><img src="doctor/assets/images/careconnect4.png" alt="" height="50"><img src="doctor/assets/images/careconnect5.png" alt="" height="70"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Already have an account? <a href="login.php" style="color: #65c9cd;;
    text-decoration: underline;
    text-decoration-color: #65c9cd;;">Sign in</a></p>
                            </div>
</div>
<!-- end page title -->
<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Create a new account</h3>
                <!--Add Patient Form-->
                <form method="post" enctype="multipart/form-data" name="chngpwd" onSubmit="return valid();">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName" class="col-form-label">First Name</label>
                            <input type="text" required="required" name="name" class="form-control" id="inputName">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputName" class="col-form-label">Last Name</label>
                            <input type="text" required="required" name="lname" class="form-control" id="inputName">
                        </div>
                    </div>

                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail" class="col-form-label">Email</label>
                            <input type="email" required="required" name="email" class="form-control" id="inputEmail">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword" class="col-form-label">Password</label>
                            <input required="required" type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="inputCPassword" class="col-form-label">Confirm Password</label>
                            <input required="required" type="password" name="cpass" class="form-control" id="inputPassword">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGender" class="col-form-label">Gender</label><br>
                            <input required="required" type="radio" name="gender" id="inputGender" value="Male">Male
                            <input type="radio" name="gender" id="inputGender" class="ml-5" value="Female">Female
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="col-form-label">Date of Birth</label>
                        <input required="required" type="date" name="dob" class="form-control" id="inputDob">
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="col-form-label">Address</label>
                        <textarea name="address" class="form-control" id="inputAddress"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone" class="col-form-label">Phone</label>
                            <input required="required" type="text" pattern="^\d{10}$" name="phone" class="form-control" id="inputPhone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputBg" class="col-form-label">Blood Group</label>
                            <select id="inputBg" required="required" name="blood" class="form-control">
                                <optgroup label="select category">
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>                                                        
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="add_pat" class="ladda-button btn btn-success" data-style="expand-right">Register</button>

                </form>
                <!--End Patient Form-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

    <!-- Vendor js -->
    <script src="doctor/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="doctor/assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>