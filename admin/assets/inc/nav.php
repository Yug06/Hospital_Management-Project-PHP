<?php
    $aid=$_SESSION['admin_id'];
    $ret="select * from admin where admin_id=?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('i',$aid);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
?>
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/doc-icon.png" alt="dpic" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <?php echo $row->uname;?><i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <!-- <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div> -->

                    <!-- item-->
                    <!-- <a href="his_admin_account.php" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a> -->


                    <!-- <div class="dropdown-divider"></div> -->

                    <!-- item-->
                    <a href="his_admin_logout_partial.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

           

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="#" class="logo text-center">
                <span class="logo-lg">
                    <img src="assets/images/careconnect4.png" alt="" height="50">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="assets/images/CareConnect4.png" alt="" height="24">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Manage
                    <i class="mdi mdi-chevron-down"></i> 
                </a>
                <div class="dropdown-menu">
                    <!-- item-->
                    <a href="add_department.php" class="dropdown-item">
                        <i class="fe-users mr-1"></i>
                        <span>Department</span>
                    </a>

                    <!-- item-->
                    <a href="add_doctor.php" class="dropdown-item">
                    <i class="mdi mdi-doctor mr-1"></i>
                        <span>Doctor</span>
                    </a>

                    <!-- item-->
                    <a href="add_staff.php" class="dropdown-item">
                    <i class="fe-users mr-1"></i>
                        <span>Staff</span>
                    </a>

                    <!-- item-->
                    <a href="manage_prescriptions.php" class="dropdown-item">
                    <i class="mdi mdi-pill"></i>
                        <span>Prescriptions</span>
                    </a>


                    <!-- item-->
                    <!-- <a href="his_admin_add_medical_record" class="dropdown-item">
                        <i class="fe-list mr-1"></i>
                        <span>Medical Report</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="his_admin_lab_report" class="dropdown-item">
                        <i class="fe-hard-drive mr-1"></i>
                        <span>Laboratory Report</span>
                    </a> -->

                    <!-- item-->
                    <!-- <a href="his_admin_surgery_records" class="dropdown-item">
                        <i class="fe-anchor mr-1"></i>
                        <span>Surgical/Theatre Report</span>
                    </a> -->

                    
                    <div class="dropdown-divider"></div>

                    
                </div>
            </li>

        </ul>
    </div>
<?php }?>