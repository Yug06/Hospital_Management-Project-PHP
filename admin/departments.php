<!--Server side code to handle  Patient Registration-->
<?php
session_start();
include('assets/inc/config.php');
if(isset($_POST['add']))
{    
    $title=$_POST['title'];

    $f_name=$_FILES['picture']['name'];
    $f_dir='../department/'.$f_name;
    move_uploaded_file($_FILES['picture']['tmp_name'],$f_dir);

    $des = $_POST['des'];
    $departmentid = $_POST['departmentid'];

    $sql = "UPDATE `tbl_department` SET `heading`='$title',`picture`='$f_name',`description`='$des' WHERE `departmentid`='$departmentid'";
    $res=mysqli_query($con,$sql);

	if($res)
	{
		$success = "Department details updated";
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
        <?php include("assets/inc/sidebar.php"); 
         session_start();
         include('assets/inc/config.php');
         include('assets/inc/checklogin.php');
         check_login();
         $adminid=$_SESSION['admin_id'];
         if (isset($_GET['del_id'])) {
           $did = $_GET['del_id'];
           $sql = "DELETE FROM `tbl_slideshow` WHERE `id`='$did'";
           $result = mysqli_query($con, $sql);
           if ($result) {
               $success = "image deleted";
           } else {
               $err = "Please Try Again Or Try Later";
           }
        }?>
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
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slideshow</a></li>
                                        <li class="breadcrumb-item active">Add Image</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Image</h4>
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
                                                <label for="inputDegree" class="col-form-label">Department</label>
                                                <select id="inputState" required="required" name="departmentid" class="form-control">
                                                    <optgroup label="select category">
                                                        
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

                                            <div class="form-group col-md-6">
                                                <label for="inputTitle" class="col-form-label">Title</label>
                                                <textarea required="required" type="text" class="form-control" name="title" id="title"></textarea>
                                            </div>
                                       

                                            <div class="form-group col-md-12">
                                                <label for="inputPhoto" class="col-form-label">Picture</label>
                                                <input type="file" name="picture" class="form-control" id="inputPhoto">
                                            </div>

                                            <div class="form-group  col-md-12">
                                            <label for="inputDesc" class="col-form-label">Description</label>
                                            <textarea required="required" type="text" class="form-control" name="des" id="editor"></textarea>
                                        </div>
                                        </div>

                                        <button type="submit" name="add" class="ladda-button btn btn-success" data-style="expand-right">Add</button>

                                    </form> <!--End Patient Form--><br>

                                    <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Department</th>
                                                <th data-toggle="true">Heading</th>
                                                <th data-toggle="true">Image</th>
                                                <th data-toggle="true">Description</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */

                                        $sql1 = "SELECT * FROM tbl_department";
                                        $result1 = mysqli_query($con, $sql1);
                                        $cnt = 1;
                                        while ($data = mysqli_fetch_array($result1)) {
                                            // $doctorid = $data['doctorid'];
                                            $picture = $data['picture'];
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>   
                                                    <td><?php echo $data['name']; ?></td>   
                                                    <td><?php echo $data['heading']; ?></td>
                                                    <td> <center><img src="../department/<?php echo $data['picture']; ?>" alt="picture" style  width="200px" height="150px"></center></td>
                                                    <td><?php echo $data['description']; ?></td>
                                                    </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        
                                    </table>
                                </div> <!-- end .table-responsive-->
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