<?php
require_once('../app/connection.php');
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
      <h1>Admin | Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" style="height:80vh;">

      <div class="row" style="height:40vh;">

        <div class="col-md-12 ">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">1. Users Status</h5>
              <div class="row ">
                <div class="col-md-3 ">
                  <div class="card bg-primary border-primary">
                    <div class="card-header fw-bold" style="text-align: center">All Users</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $queryallrequest = "select * from users ";
                        $send = mysqli_query($con, $queryallrequest);
                        $rowrequest = mysqli_num_rows($send);

                        echo "0" . $rowrequest;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
            

                <div class="col-md-3 ">
                  <div class="card bg-success border-success">
                    <div class="card-header fw-bold" style="text-align: center">Active Users</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $querypendding = "select * from users where status = 4";
                        $send = mysqli_query($con, $querypendding);
                        $pendding = mysqli_num_rows($send);

                        echo "0" . $pendding;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="card bg-danger border-danger">
                    <div class="card-header fw-bold" style="text-align: center">Inactive Users</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $querypendding = "select * from users where status = 5";
                        $send = mysqli_query($con, $querypendding);
                        $pendding = mysqli_num_rows($send);

                        echo "0" . $pendding;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>






        </div>
      </div>

      <div class="row" style="height:40vh;">

        <div class="col-md-12 ">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">2. Request Status</h5>
              <div class="row ">
                <div class="col-md-3 ">
                  <div class="card bg-primary border-primary">
                    <div class="card-header fw-bold" style="text-align: center">All Request</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $queryallrequest = "select * from waste_request ";
                        $send = mysqli_query($con, $queryallrequest);
                        $rowrequest = mysqli_num_rows($send);

                        echo "0" . $rowrequest;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <div class="card bg-warning border-warning">
                    <div class="card-header fw-bold" style="text-align: center">Pedding Request</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $querypendding = "select * from waste_request where request_status_id = 1";
                        $send = mysqli_query($con, $querypendding);
                        $pendding = mysqli_num_rows($send);

                        echo "0" . $pendding;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="card bg-success border-success">
                    <div class="card-header fw-bold" style="text-align: center">Approved Request</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $querypendding = "select * from waste_request where request_status_id = 2";
                        $send = mysqli_query($con, $querypendding);
                        $pendding = mysqli_num_rows($send);

                        echo "0" . $pendding;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="card bg-info border-info">
                    <div class="card-header fw-bold" style="text-align: center">Collected Request</div>
                    <div class="card-body fw-bold" style="text-align: center;">
                      <span>
                        <?php
                        $querypendding = "select * from waste_request where request_status_id = 3";
                        $send = mysqli_query($con, $querypendding);
                        $pendding = mysqli_num_rows($send);

                        echo "0" . $pendding;
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>






        </div>
      </div>

      <div class="row" style="height:40vh;">

<div class="col-md-12 ">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">3. Payment Status</h5>
      <div class="row ">
     
        <div class="col-md-3 ">
          <div class="card bg-danger border-danger">
            <div class="card-header fw-bold" style="text-align: center">Not Paid </div>
            <div class="card-body fw-bold" style="text-align: center;">
            <span>
                <?php
                $queryPayment2 = "select * from waste_request where 	payment_status_id = 7";
                $send2 = mysqli_query($con, $queryPayment2);
                $Collected2 = mysqli_num_rows($send2);

                echo "0" . $Collected2;
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 ">
          <div class="card bg-warning border-warning">
            <div class="card-header fw-bold" style="text-align: center">pendding Payment</div>
            <div class="card-body fw-bold" style="text-align: center;">
            <span>
                <?php
                $queryPayment3 = "select * from waste_request where 	payment_status_id = 1";
                $send3 = mysqli_query($con, $queryPayment3);
                $Collected3 = mysqli_num_rows($send3);

                echo "0" . $Collected3;
                ?>
              </span>
            </div>
          </div>
        </div>

        

        <div class="col-md-3 ">
          <div class="card bg-success border-success">
            <div class="card-header fw-bold" style="text-align: center">Paid</div>
            <div class="card-body fw-bold" style="text-align: center;">
            <span>
                <?php
                $queryPayment = "select * from payments where payment_status = 6 ";
                $send1 = mysqli_query($con, $queryPayment);
                $Collected = mysqli_num_rows($send1);

                echo "0" . $Collected;
                ?>
              </span>
            </div>
          </div>
        </div>

        
      </div>

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