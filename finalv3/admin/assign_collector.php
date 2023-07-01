<?php
session_start();
require_once('../app/connection.php');
// require('./update_assign_collector.php');
require "../app/sanitalization.php";

$user_id = $_SESSION['id'];
if (empty($user_id)) {
    header('location:../index.php');
} else {

    $query = "select * from users where user_id =$user_id ";
    $send = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($send);
}


$requestError = $paymentError = " ";

$request = $payment = " ";

if (isset($_POST['update_status'])) {
    $request_status_id = $_POST['request_statusid'];
    $request = mysqli_real_escape_string($con, dataSanitizations($_POST['request_status']));
    $payment = mysqli_real_escape_string($con, dataSanitizations($_POST['payment_status']));

    // dispaly errors message if input is empty

    if (empty($request)) {
        $requestError = "Request required";
    }

    //  if (!empty($payment)) {
    //     $paymentError = "Payment required";
    //  }

    elseif ($request && $payment && $request_status_id) {
        // UPDATE `users` SET `lname` = 'niway' WHERE `users`.`user_id` = 29;

        $update_request = "UPDATE waste_request SET request_status_id = $request where id = $request_status_id";

        $result_update = mysqli_query($con, $update_request);

        if ($result_update) {
            session_start();
            header("location: waste_request.php");

            $_SESSION['update_waste_request'] = "Waste request status update successfull";
        } else {
            session_start();

            $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

            //   header("location: add_waste_collector.php");
        }
    }
}

$waste_colletor_nameError = " "; 
$waste_colletor_name = " ";

if (isset($_POST['assign_collector'])) {
    $request_status_id = $_POST['request_statusid'];
    $waste_colletor_name = mysqli_real_escape_string($con, dataSanitizations($_POST['waste_colletor_name']));
    

    // dispaly errors message if input is empty


    if (empty($waste_colletor_name)) {
        $waste_colletor_nameError = "waste colletor name required";
    }

    //  if (!empty($payment)) {
    //     $paymentError = "Payment required";
    //  }

    elseif ($waste_colletor_name  && $request_status_id) {
        // UPDATE `users` SET `lname` = 'niway' WHERE `users`.`user_id` = 29;

        // die($waste_colletor_name);

      

        $update_request = "UPDATE waste_request SET waste_colletor_id = $waste_colletor_name where id = $request_status_id";

        $result_update = mysqli_query($con, $update_request);

        if ($result_update) {
            session_start();
            header("location: waste_request.php");

            $_SESSION['update_waste_request'] = "Waste request colletor successfull";
        } else {
            session_start();

            $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

            //   header("location: add_waste_collector.php");
        }
    }
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
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">HWMS</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
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
            <h1>Officer | Waste request management</h1>

        </div><!-- End Page Title -->

        <section class="section profile" style="height: 80vh;">


            <?php
            $request_status = $_GET['update_request'];

            $select = "SELECT * FROM waste_request where id =  $request_status";
            $result = mysqli_query($con, $select);

            $waste = mysqli_fetch_assoc($result);

            $waste_name = $waste['waste_name'];
            $waste_category_id = $waste['waste_category_id'];
            $waste_generetor_id = $waste['waste_generetor_id'];
            $request_status_id = $waste['request_status_id'];
            $waste_colletor_id = $waste['waste_colletor_id'];
            $payment_status_id = $waste['payment_status_id'];



            // selet category to display in ADDRESS 	 box
            $select_category = "select * from waste_category where id = $waste_category_id";
            $result_waste_category_id = mysqli_query($con, $select_category);

            $waste_category_names = mysqli_fetch_assoc($result_waste_category_id);

            $waste_category_name = $waste_category_names['name'];


            // selet generator to display in waste generatr 	 box
            $select_waste_generator = "select * from users where user_id = $waste_generetor_id";
            $result_waste_waste_generator_id = mysqli_query($con, $select_waste_generator);

            $waste_waste_generator_names = mysqli_fetch_assoc($result_waste_waste_generator_id);

            $waste_waste_generator_fname = $waste_waste_generator_names['fname'];
            $waste_waste_generator_lname = $waste_waste_generator_names['lname'];
            $streetid  = $waste_waste_generator_names['address_id'];

            // selet colletor to display in waste generatr 	 box
            $select_waste_colletor = "select * from users where user_id = $waste_colletor_id";
            $result_waste_waste_colletor_id = mysqli_query($con, $select_waste_colletor);

            $waste_waste_collector_names = mysqli_fetch_assoc($result_waste_waste_colletor_id);

            $waste_waste_collector_fname = $waste_waste_collector_names['fname'];
            $waste_waste_collector_lname = $waste_waste_collector_names['lname'];
            ?>
            <div class="row">


                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Request and Payment</button>
                                </li>



                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Assign collector</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">

                                <!-- <div class="row"></div> -->

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Request Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Waste Name</div>
                                        <div class="col-lg-9 col-md-8"> <?php echo  $waste_name;; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Waste category</div>
                                        <div class="col-lg-9 col-md-8"> <?php echo $waste_category_name  ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Waste generetor</div>
                                        <div class="col-lg-9 col-md-8"> <?php echo $waste_waste_generator_fname . " " . $waste_waste_generator_lname; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Waste colletor</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $waste_waste_collector_fname . " " . $waste_waste_collector_lname;  ?></div>
                                    </div>

                                                             
                  <?php                
                                 
                                 $selectstreet = "SELECT * FROM street where id = $streetid ";
                                 $querystreet = mysqli_query($con, $selectstreet);
                                 $numstreet = mysqli_num_rows($querystreet);
                                 
                                 $addressstreet1 = mysqli_fetch_assoc($querystreet);
                                 $ward_id = $addressstreet1['ward_id'];
                                 $street_name_karent = $addressstreet1['name'];

                                  
                 // selet user ward by using stree id from stree table
                   $selectWard = "SELECT * FROM Ward where id = $ward_id";
                   $queryWard = mysqli_query($con, $selectWard);
                   $numWard = mysqli_num_rows($queryWard);
                 
                   $addressward1 = mysqli_fetch_assoc($queryWard);
                   $district_id = $addressward1['district_id'];
                   $ward_name_karent  = $addressward1['name'];
                   
                 
                   $selectdistrict = "SELECT * FROM district where id = $district_id";
                   $querydistrict = mysqli_query($con, $selectdistrict);
                   $numdistrict = mysqli_num_rows($querydistrict);
                   
                   $addressdistrict1 = mysqli_fetch_assoc($querydistrict);
                   $region_id = $addressdistrict1['region_id'];
                   $district_name_karent = $addressdistrict1['name'];
                 
                   // selet user region by using distri id from distrit table
                   $selectRegion = "SELECT * FROM region where  $region_id";
                   $queryRegion = mysqli_query($con, $selectRegion);
                   $numRegion = mysqli_num_rows($queryRegion);
                   $addressRegion1 = mysqli_fetch_assoc($queryRegion); 
                   $region_name_karent = $addressRegion1['name'];
                 
                 
                   
             ?>
          
             <div class="row">
               <div class="col-lg-3 col-md-4 label">Address</div>
               <div class="col-lg-9 col-md-8"><?php echo $addressstreet1['name'].", ".$addressward1['name'].", ".$addressdistrict1['name'].", ".$addressRegion1['name'] ?></div>
             </div>


                                    <h5 class="card-title mt-4"> Status</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Request status</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            if ($request_status_id == 1) { ?>


                                                <span class="badge m-1 bg-warning remove">Pedding</span>


                                            <?php } elseif ($waste['request_status_id'] == 2) { ?>

                                                <span class="badge m-1 bg-info remove">Approved</span>

                                            <?php  } else { ?>
                                                <span class="badge m-1 bg-success remove">Collected</span>

                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-lg-3 col-md-4 label">Payment status</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            if ($request_status_id == 1) { ?>


                                                <span class="badge m-1 bg-warning remove">Pedding</span>


                                            <?php } else { ?>
                                                <span class="badge m-1 bg-success remove">Paid</span>

                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    



                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="" method="post">


                                        <div class="row mb-3">
                                            <label for="request" class="col-md-4 col-lg-3 col-form-label">Request Status</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="request_status" id="yourwaste_category" class="form-control form-select">
                                                    <option value="">Select request status</option>


                                                    <?php



                                                    // seletwaste_category to display in section box
                                                    $select_waste_request = "select * from status where id <> 4 and id <> 5";
                                                    $result_waste_request = mysqli_query($con, $select_waste_request);

                                                    if ($row = mysqli_num_rows($result_waste_request)) {
                                                        while ($dname = mysqli_fetch_assoc($result_waste_request)) {
                                                            $waste_request_name = $dname['name'];
                                                            $waste_requestid = $dname['id'];
                                                    ?>
                                                            <!-- usewaste_category id as value to store in table -->
                                                            <option value="<?= $waste_requestid; ?> "><?php echo $waste_request_name; ?></option>

                                                    <?php     }
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <input type="text" name="request_statusid" value="<?php echo $request_status ?>" hidden>
                                            <label for="request" class="col-md-4 col-lg-3 col-form-label">Payment Status</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="payment_status" id="yourwaste_category" class="form-control form-select">
                                                    <option value="<?php echo $request_status_id ?>">Select payment status</option>


                                                    <?php

                                                    // seletwaste_category to display in section box
                                                    $select_waste_category = "select * from status where id <> 4 and id <> 5";
                                                    $result_waste_category = mysqli_query($con, $select_waste_category);

                                                    if ($row = mysqli_num_rows($result_waste_category)) {
                                                        while ($dname = mysqli_fetch_assoc($result_waste_category)) {
                                                            $waste_category_name = $dname['name'];
                                                            $waste_categoryid = $dname['id'];
                                                    ?>
                                                            <!-- usewaste_category id as value to store in table -->
                                                            <option value="<?= $waste_categoryid; ?> "><?php echo $waste_category_name; ?></option>

                                                    <?php     }
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>




                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="update_status">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="" method="post">

                                        <div class="row mb-3">
                                        <input type="text" name="request_statusid" value="<?php echo $request_status ?>" hidden>
                                            <label for="request" class="col-md-4 col-lg-3 col-form-label">Waste colletor name </label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="waste_colletor_name" id="yourwaste_category" class="form-control form-select">
                                                    <option value="<?php echo $request_status_id ?> "> select waste colletor name</option>


                                                    <?php

                                                    // seletwaste_category to display in section box
                                                    $select_waste_collector = "select * from users where role_id = 2 ";
                                                    $result_waste_collector = mysqli_query($con, $select_waste_collector);

                                                    if ($row = mysqli_num_rows($result_waste_collector)) {
                                                        while ($wname = mysqli_fetch_assoc($result_waste_collector)) {
                                                            $waste_collector_fname = $wname['fname'];
                                                            $waste_collector_lname = $wname['lname'];
                                                            $waste_collectorid = $wname['user_id'];
                                                    ?>
                                                            <!-- usewaste_category id as value to store in table -->
                                                            <option value="<?= $waste_collectorid; ?> "><?php echo $waste_collector_fname . " " . $waste_collector_lname; ?></option>

                                                    <?php     }
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>




                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="assign_collector">Assign Collector</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


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