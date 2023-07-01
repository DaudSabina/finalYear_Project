<?php
require_once('../app/connection.php');

// require_once('./bill.php');

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
        <a class="nav-link collapsed" href="wastegeneratorDashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="request.php">
          <i class="bi bi-grid"></i>
          <span>Request Service</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="waste_request.php">
          <i class="bi bi-grid"></i>
          <span>View request status</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="waste_payment.php">
          <i class="bi bi-grid"></i>
          <span>View payment status</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="payment.php">
          <i class="bi bi-grid"></i>
          <span>Make payment</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="status.php">
          <i class="bi bi-grid"></i>
          <span>View request status</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="complaints.php">
          <i class="bi bi-card-text"></i>
          <span>Send complaints</span>
        </a>
      </li>

      <!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Waste Generetor | Payment</h1>

    </div><!-- End Page Title -->

    <section class="section" style="height: 80vh;">
      <div class="row">





        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Payment Informations</h5>

            <!-- No Labels Form -->

           

            <form action="./bill.php" class="g-3 needs-validation" novalidate method="post">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Full name</label>
                  <input type="text" class="form-control" name="fname" value="<?php echo $rows['fname'] ?>" readonly>
                </div>

                <div class="col-md-4">
                  <label for="">Last name</label>
                  <input type="text" class="form-control" name="lname" value="<?php echo $rows['lname']; ?>" readonly>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-8">
                  <label for="">Email Address</label>
                  <input type="email" class="form-control" placeholder="" value="<?php echo $rows['email']; ?>" readonly>
                </div>

                <div class="col-md-4">
                  <label for="">Phone number</label>
                  <input type="text" class="form-control" placeholder="" name="pnumber" value="<?php echo $rows['contact']; ?>">
                </div>
              </div>



              <div class="row mt-4">

                <div class="col-3">
                  <label for="yourDistrict" class="form-label">Choose request</label>
                  <select name="request_name" id="yourDistrict" class="form-control" required>
                    <option value="">Select request</option>

                    <?php

                    // selet distrit to display in section box
                    $select_district = "select * from waste_request where 	payment_status_id = 7 and	waste_generetor_id = $user_id order by waste_name ASC";
                    $result_district = mysqli_query($con, $select_district);

                    if ($row = mysqli_num_rows($result_district)) {
                      while ($dname = mysqli_fetch_assoc($result_district)) {
                        $districtname = $dname['waste_name'];
                        $districtid = $dname['id'];
                    ?>
                        <!-- use distrit id as value to store in table -->
                        <option value="<?= $districtid; ?> "><?php echo $districtname; ?></option>

                    <?php     }
                    }
                    ?>


                  </select>

                  <div class="invalid-feedback">Please select a valid waste name!</div>
                </div>



                <div class="col-md-4">
                  <label for="yourPassword" class="form-label">Enter months number</label>
                  <input type="number" name="month" class="form-control" id="yourMonth" placeholder="Example 1,2  " required>
                  <div class="invalid-feedback">Please enter your months number</div>
                </div>

                <div class="text-center col-md-4 mt-4">
                  <!-- <label for=""></labe l> -->
                  <button type="submit" name="bill" class="btn btn-primary form-control">Pay</button>

                </div>
              </div>

            </form><!-- End No Labels Form -->

          </div>
        </div>


      </div>
    </section>

  </main><!-- End #main -->

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

</html>../