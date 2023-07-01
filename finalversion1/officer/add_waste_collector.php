<?php
// require_once('../app/connection.php');
require "./add_waste_collector_logic.php";
// session_start();


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

        <div>


            <?php

            if (isset($_SESSION['create_denied'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php

                echo $_SESSION['create_denied'];

                unset($_SESSION['create_denied']);
            }

                ?>
                </div>


        </div>

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
                            <a class="dropdown-item d-flex align-items-center" href="../log_out.php">
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
                <a class="nav-link collapsed" href="officerDashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="waste_collector.php">
                    <i class="bi bi-person-plus"></i>
                    <span>Manage Waste Collector</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="waste_request.php">
                    <i class="bi bi-grid"></i>
                    <span>Manage Waste Request</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="status.php">
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

            <!-- End Dashboard Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Officer | Creaate New waste collector</h1>
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
                                                <input type="text" name="fname" placeholder="Senior" class="from-control">
                                                <span class="text-danger "><?php echo $fnameErr; ?></span>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lname" placeholder="DC" class="from-control">
                                                <span class="text-danger "><?php echo $lnameErr; ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 mt-4">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label for="">Email</label>
                                                <input type="text" name="email" placeholder="example@email.com" class="from-control">
                                                <span class="text-danger "><?php echo $emailErr; ?></span>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Phone number</label>
                                                <input type="text" name="pnumber" placeholder="255764063426" class="from-control">
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
                                                    $select_role = "select * from roles where id=2";
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
                                                    <option value="">Select Status</option>
                                                    <?php

                                                    // selet roles to display in section box
                                                    $select_status = "select * from status where id <> 1 and id <> 2 and id <> 3";
                                                    $result_status = mysqli_query($con, $select_status);

                                                    if ($row = mysqli_num_rows($result_status)) {
                                                        while ($rname = mysqli_fetch_assoc($result_status)) {
                                                            $statusname = $rname['name'];
                                                            $statusid = $rname['id'];
                                                    ?>
                                                            <!-- use roles id as value to store in table -->
                                                            <option value="<?= $statusid; ?> "><?php echo $statusname; ?></option>

                                                    <?php     }
                                                    }
                                                    ?>
                                                </select>

                                                <span class="text-danger "><?php echo  $statusErr; ?></span>
                                            </div>



                                        </div>


                                        <div class="form-group col-md-12 mt-4">
                                            <div class="row">

                                                <label for="">Address</label>


                                                <div class="col-md-4">
                                                    <label for="">District</label>
                                                    <select name="district" id="" class="form-control">
                                                        <option value="">Select District</option>
                                                        <?php

                                                        // selet distrit to display in section box
                                                        $select_district = "select * from district";
                                                        $result_district = mysqli_query($con, $select_district);

                                                        if ($row = mysqli_num_rows($result_district)) {
                                                            while ($dname = mysqli_fetch_assoc($result_district)) {
                                                                $districtname = $dname['name'];
                                                                $districtid = $dname['id'];
                                                        ?>
                                                                <!-- use distrit id as value to store in table -->
                                                                <option value="<?= $districtid; ?> "><?php echo $districtname; ?></option>

                                                        <?php     }
                                                        }
                                                        ?>
                                                    </select>

                                                    <span class="text-danger "><?php echo  $districtErr; ?></span>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="">Ward</label>
                                                    <select name="ward" id="" class="form-control">
                                                        <option value="">Select Ward</option>
                                                        <?php

                                                        // selet ward to display in section box
                                                        $select_ward = "select * from ward";
                                                        $result_ward = mysqli_query($con, $select_ward);

                                                        if ($row = mysqli_num_rows($result_ward)) {
                                                            while ($wname = mysqli_fetch_assoc($result_ward)) {
                                                                $wardname = $wname['name'];
                                                                $wardid = $wname['id'];
                                                        ?>
                                                                <!-- use ward id as value to store in table -->
                                                                <option value="<?= $wardid; ?> "><?php echo $wardname; ?></option>

                                                        <?php     }
                                                        }
                                                        ?>
                                                    </select>

                                                    <span class="text-danger "><?php echo  $wardErr; ?></span>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="">Street</label>
                                                    <select name="street" id="" class="form-control">
                                                        <option value="">Select Street</option>
                                                        <?php

                                                        // selet street to display in section box
                                                        $select_street = "select * from street";
                                                        $result_street = mysqli_query($con, $select_street);

                                                        if ($row = mysqli_num_rows($result_street)) {
                                                            while ($stname = mysqli_fetch_assoc($result_street)) {
                                                                $streetname = $stname['name'];
                                                                $streetid = $stname['id'];
                                                        ?>
                                                                <!-- use street id as value to store in table -->
                                                                <option value="<?= $streetid; ?> "><?php echo $streetname; ?></option>

                                                        <?php     }
                                                        }
                                                        ?>
                                                    </select>

                                                    <span class="text-danger "><?php echo  $streetErr; ?></span>
                                                </div>
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