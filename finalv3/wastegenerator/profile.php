<?php
// require_once('../app/connection.php');
require_once "./change_password.php";
// require_once "./update_userinfo.php";
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
      <h1>Waste Generator | My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" >
      <div class="row">


        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">

                  <input type="button" value="Overview"  class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                </li>

                <li class="nav-item">
                 
                  <input type="button" value="Edit Profile" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                </li>



                <li class="nav-item">

                  <input type="button" value="Change Password" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                </li>

              </ul>
              <div>
              <?php


if (isset($_SESSION['updated'])) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?php

  echo $_SESSION['updated'];

  unset($_SESSION['updated']);
}

if (isset($_SESSION['notsame'])) { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?php

  echo $_SESSION['notsame'];

  unset($_SESSION['notsame']);
}

  ?>
     </div> 
              </div>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5> -->
                  <!-- <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['fname'] . " " . $rows['lname']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['email'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"> <?php echo $rows['contact'] ?></div>
                  </div>
                  
                  <?php 
                                      $streetid = $rows['address_id'];
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



                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="./update_userinfo.php" class="row g-3 needs-validation" novalidate method="POST">


                    <div class="row mb-3">
                      <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstName" type="text" class="form-control" id="firstName" value=" <?php echo $rows['fname']  ?>" required>
                        <div class="invalid-feedback">Please enter  Firstname.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastName" type="text" class="form-control" id="lastName" value=" <?php echo  $rows['lname']; ?>" required>
                        <div class="invalid-feedback">Please enter  Lastname.</div>
                      </div>
                    </div>

                

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                      
                        <select id="inputState" class="form-select" name="street" required>
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
                      <div class="invalid-feedback">Please select street.</div>
                    </div>

                    

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value=" <?php echo $rows['contact'] ?>" required>
                        <div class="invalid-feedback">Please enter phone number.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value=" <?php echo $rows['email'] ?>" required>
                        <div class="invalid-feedback">Please enter Email.</div>
                      </div>
                    </div>





                    <div class="text-center">
                      
                      <button type="submit" name="update_userinfo" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->

                </div>


  
             <div class="tab-pane fade pt-3" id="profile-change-password">
                  
 


                  
                  <!-- Change Password Form -->
         
                  <form action="" class="row g-3 needs-validation" novalidate method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="passwordold" type="password" class="form-control" id="currentPassword" required>
                        <div class="invalid-feedback">Please enter current password.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                        <div class="invalid-feedback">Please enter new password.</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                        <div class="invalid-feedback">Please enter re-enter password.</div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
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