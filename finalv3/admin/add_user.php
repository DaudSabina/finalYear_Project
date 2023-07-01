<?php
// require_once('../app/connection.php');
require "./adduser_logic.php";
session_start();


$user_id = $_SESSION['id'];
if (empty($user_id)) {
    header('location:../index.php');
} else {

    $query = "select * from users where user_id =$user_id ";
    $send = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($send);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HWMS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/w3.css">


    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">

            <a class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">HWMS</span>
                <i class="bi bi-list toggle-sidebar-btn "></i>
            </a>

            <!-- <h1 class="d-none d-lg-block">HOUSE WASTE MANAGEMENT SYSTEM</h1> -->
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->






                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
                        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $rows['lname'] . " " . $rows['fname']; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6> <?php echo $rows['lname'] . " " . $rows['fname']; ?></h6>

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../app/log_out.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="adminDashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="add_user.php">
                    <i class="bi bi-person-plus"></i>
                    <span>Create Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users.php">
                    <i class="bi bi-table"></i>
                    <span>view Users</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="waste_request.php">
                    <i class="bi bi-grid"></i>
                    <span>Manage Waste Request</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="waste_request.php">
                    <i class="bi bi-grid"></i>
                    <span>Manage Payment</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="complaints.php">
                    <i class="bi bi-card-text"></i>
                    <span>View complaints</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="status.php">
                    <i class="bi bi-grid"></i>
                    <span>Manage Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="status_change.php">
                    <i class="bi bi-grid"></i>
                    <span>Change User information</span>
                </a>
            </li>


            <!-- End Dashboard Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Admin | Creaate New User</h1>
            <nav>
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section background-dark" style="height:80vh;">
            <div class="row">
                <div class="container">
                    <div class="row justify-content">
                        <div class="col-md-10">
                            <div class="ms-5">
                                <form action="" method="post">
                                    <div class="form-group col-md-12">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">First Name</label>
                                                <input type="text" name="fname" placeholder="Senior" class="form-control">
                                                <span class="text-danger "><?php echo $fnameErr; ?></span>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lname" placeholder="DC" class="form-control">
                                                <span class="text-danger "><?php echo $lnameErr; ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Email</label>
                                                <input type="text" name="email" placeholder="example@email.com" class="form-control">
                                                <span class="text-danger "><?php echo $emailErr; ?></span>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Phone number</label>
                                                <input type="text" name="pnumber" placeholder="255764063426" class="form-control">
                                                <span class="text-danger "><?php echo $pnumberErr; ?></span>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-12 mt-4">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Roles</label>
                                                <select name="roles" id="" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <?php

                                                    // selet roles to display in section box
                                                    $select_role = "select * from roles where id <> 1";
                                                    $result_role = mysqli_query($con, $select_role);

                                                    if ($row = mysqli_num_rows($result_role)) {
                                                        while ($rname = mysqli_fetch_assoc($result_role)) {
                                                            $rolename = $rname['name'];
                                                            $roleid = $rname['id'];
                                                    ?>
                                                            <!-- use roles id as value to store in table -->
                                                            <option value="<?= $roleid; ?> "><?php echo $rolename; ?></option>

                                                    <?php     }
                                                    }
                                                    ?>
                                                </select>

                                                <span class="text-danger "><?php echo  $roleErr; ?></span>
                                            </div>


                                            <div class="col-md-4">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Select status</option>
                                                    <option value="4">Active</option>
                                                    <option value="5">In Active</option>
                                                </select>

                                                <span class="text-danger "><?php echo $statusErr; ?></span>
                                            </div>



                                        </div>

                                        <div class="row mt-4  ">
                                            <label for="">Address</label>
                                            <div class="col-md-3">

                                                <?php
                                                // selet user street by using address id from user table
                                                $streetid =  $rows['address_id'];
                                                $waste_generatory_id =  $rows['user_id'];

                                                // echo $waste_generatory_id ;
                                                $selectstreet = "SELECT * FROM street where id = $streetid ";
                                                $querystreet = mysqli_query($con, $selectstreet);
                                                $numstreet = mysqli_num_rows($querystreet);

                                                $addressstreet1 = mysqli_fetch_assoc($querystreet);
                                                $ward_id = $addressstreet1['ward_id'];
                                                $street_name_karent = $addressstreet1['name'];

                                                // echo $ward_id;



                                                // selet user ward by using stree id from stree table
                                                $selectWard = "SELECT * FROM Ward where id = $ward_id";
                                                $queryWard = mysqli_query($con, $selectWard);
                                                $numWard = mysqli_num_rows($queryWard);

                                                $addressward1 = mysqli_fetch_assoc($queryWard);
                                                $district_id = $addressward1['district_id'];

                                                // echo $district_id;

                                                // selet user distrit by using wad  id from ward table
                                                $selectdistrict = "SELECT * FROM district where id = $district_id";
                                                $querydistrict = mysqli_query($con, $selectdistrict);
                                                $numdistrict = mysqli_num_rows($querydistrict);

                                                $addressdistrict1 = mysqli_fetch_assoc($querydistrict);
                                                $region_id = $addressdistrict1['region_id'];

                                                // echo  $region_id;
                                                // selet user region by using distri id from distrit table
                                                $selectRegion = "SELECT * FROM region where  $region_id";
                                                $queryRegion = mysqli_query($con, $selectRegion);
                                                $numRegion = mysqli_num_rows($queryRegion);

                                                $addressRegion1 = mysqli_fetch_assoc($queryRegion);


                                                ?>
                                                <label for="">Region</label>
                                                <select id="inputState" name="region" class="form-select">
                                                    <option value="">Select Reigon</option>
                                                    <!-- <option value="<?php echo $addressRegion1['id']; ?>"><?php echo $addressRegion1['name']; ?> </option> -->

                                                    <?php
                                                    $selectRegion = "SELECT * FROM region ";
                                                    $queryRegion = mysqli_query($con, $selectRegion);
                                                    $numRegion = mysqli_num_rows($queryRegion);

                                                    while ($addressRegion = mysqli_fetch_assoc($queryRegion)) { ?>

                                                        <option value="<?php echo $addressRegion['id']; ?>"><?php echo $addressRegion['name']; ?> </option>

                                                    <?php } ?>

                                                </select>
                                            </div>


                                            <div class="col-md-3">
                                                <label for="">District</label>
                                                <?php


                                                ?>
                                                <select id="inputState" name="district" class="form-select">
                                                    <option value="">Select District</option>
                                                    <!-- <option value="<?php echo $addressdistrict1['id']; ?>"><?php echo $addressdistrict1['name']; ?></option> -->

                                                    <?php
                                                    $selectdistrict = "SELECT * FROM district ";
                                                    $querydistrict = mysqli_query($con, $selectdistrict);
                                                    $numdistrict = mysqli_num_rows($querydistrict);
                                                    while ($addressdistrict = mysqli_fetch_assoc($querydistrict)) { ?>

                                                        <option value="<?php echo $addressdistrict['id']; ?>"><?php echo $addressdistrict['name']; ?> </option>

                                                    <?php } ?>

                                                </select>
                                            </div>


                                            <div class="col-md-3">
                                                <label for="">Ward</label>
                                                <?php


                                                ?>
                                                <select id="inputState" name="ward" class="form-select">
                                                    <option value="">Select Ward</option>
                                                    <!-- <option value="<?php echo $addressward1['id']; ?>"><?php echo $addressward1['name']; ?></option> -->

                                                    <?php
                                                    $selectWard = "SELECT * FROM Ward ";
                                                    $queryWard = mysqli_query($con, $selectWard);
                                                    $numWard = mysqli_num_rows($queryWard);
                                                    while ($addressWard = mysqli_fetch_assoc($queryWard)) { ?>

                                                        <option value="<?php echo $addressWard['id']; ?>"><?php echo $addressWard['name']; ?> </option>

                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Street</label>
                                                <?php


                                                ?>
                                                <select id="inputState" name="street" class="form-select">
                                                    <option value="">Select Street</option>
                                                    <!-- <option value="<?php echo $addressstreet1['id']; ?>"><?php echo $addressstreet1['name']; ?></option> -->

                                                    <?php
                                                    $selectstreet = "SELECT * FROM street";
                                                    $querystreet = mysqli_query($con, $selectstreet);
                                                    $numstreet = mysqli_num_rows($querystreet);
                                                    while ($addressstreet = mysqli_fetch_assoc($querystreet)) { ?>

                                                        <option value="<?php echo $addressstreet['id']; ?>"><?php echo $addressstreet['name']; ?> </option>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>


                                        

                                        <div class="form-group col-md-12 mt-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>







                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>








            </div>
        </section>

        <?php
        if (isset($_SESSION['adduser'])) { ?>

            <div class="alert-danger">
                <?php echo $_SESSION['adduser']; ?>
            </div>

        <?php

            unset($_SESSION['adduser']);
        }



        ?>


        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>SabbyDavis</span></strong>. All Rights Reserved
            </div>

        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/chart.js/chart.umd.js"></script>
        <script src="../assets/vendor/echarts/echarts.min.js"></script>
        <script src="../assets/vendor/quill/quill.min.js"></script>
        <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>

</body>

</html>