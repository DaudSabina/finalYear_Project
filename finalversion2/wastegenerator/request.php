<?php
// require_once('../app/connection.php');
require'./request_logic.php';
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
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
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

  </aside><!-- End Sidebar--><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Waste Generetor | Request Service</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
 
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">





        <div class="card">
          <div class="card-body">
            <h5 class="card-title">1. Location Informations</h5>

            <!-- No Labels Form -->
            
              <form action="" method="post" class="row g-3">

              <div class="row">
                <div class="col-md-4">
                  <label for="">Full name</label>
                  <input type="text" class="form-control" value="<?php echo $rows['fname'] ?>" readonly>
                  <input type="text" name="waste_generator_id" class="form-control" value="<?php echo $rows['user_id'] ?>" hidden>

                </div>

                <div class="col-md-4">
                  <label for="">Last name</label>
                  <input type="text" class="form-control" value="<?php echo $rows['lname']; ?>" readonly>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-md-8">
                  <label for="">Email Address</label>
                  <input type="email" class="form-control" placeholder="" value="<?php echo $rows['email']; ?>" readonly>
                </div>

                <div class="col-md-4">
                  <label for="">Phone number</label>
                  <input type="text" class="form-control" placeholder="" value="<?php echo $rows['contact']; ?>">
                </div>
              </div>



              <div class="row mt-4  ">
                <label for="">Address</label>
                <div class="col-md-2">

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
                  <select id="inputState" class="form-select">
                    <option value="<?php echo $addressRegion1['id']; ?>"><?php echo $addressRegion1['name']; ?> </option>

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
                  <select id="inputState" class="form-select">
                    <option value="<?php echo $addressdistrict1['id']; ?>"><?php echo $addressdistrict1['name']; ?></option>

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
                  <select id="inputState" class="form-select">
                    <option value="<?php echo $addressward1['id']; ?>"><?php echo $addressward1['name']; ?></option>

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
                  <select id="inputState" class="form-select">
                    <option value="<?php echo $addressstreet1['id']; ?>"><?php echo $addressstreet1['name']; ?></option>

                    <?php
                    $selectstreet = "SELECT * FROM street  ";
                    $querystreet = mysqli_query($con, $selectstreet);
                    $numstreet = mysqli_num_rows($querystreet);
                    while ($addressstreet = mysqli_fetch_assoc($querystreet)) { ?>

                      <option value="<?php echo $addressstreet['id']; ?>"><?php echo $addressstreet['name']; ?> </option>

                    <?php } ?>

                  </select>
                </div>
              </div>

            





              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

              </div>
            </form><!-- End No Labels Form -->

          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">





        <div class="card">
          <div class="card-body">
            <h5 class="card-title">2. Waste Informations</h5>

            <!-- No Labels Form -->
            <form action="" method="post" class="row g-3">
            <input type="text" name="waste_generator_id" class="form-control" value="<?php echo $rows['user_id'] ?>" hidden>



              <div class="col-md-8">
                <label for="">Waste Name</label>
                <input type="text" name="waste_name" class="form-control" placeholder="">
                <span class="text-danger "><?php echo $waste_nameError; ?></span>
              </div>
              

              <div class="col-8">
                <label for="yourwaste_category" class="form-label"> waste category</label>
                <select name="waste_category" id="yourwaste_category" class="form-control form-select">
                  <option value="">Select waste category</option>
                  

                  <?php

                  // seletwaste_category to display in section box
                  $select_waste_category = "select * from waste_category";
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
                <span class="text-danger "><?php echo $waste_categoryidError; ?></span>

              </div>


             


              <div class="text-center">
                <button type="submit" name="request" class="btn btn-primary">Request</button>

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