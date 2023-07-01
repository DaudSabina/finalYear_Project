<?php
require_once('../app/connection.php');
session_start();
$error='';

$user_id = $_SESSION['id'];

if (empty($user_id)) {
  header('location:../index.php');
}
 else {
 
  $query = "select * from users where user_id =$user_id ";
  $send=mysqli_query($con,$query);
  $rows = mysqli_fetch_assoc($send);}

 if(isset($_POST['submit'])){
	$jn=$_POST['fname'];
	$em=$_POST['email'];
	$oni=$_POST['maoni'];

	$st="INSERT INTO `complaints` (`maoni_id`, `fname`, `email`, `complaint`) VALUES (NULL, '$jn', '$em', '$oni')";
  $qr=mysqli_query($con,$st);
  
 

	if($qr){
    $error = "Suggetion has been successfuly uploaded,Thank you";
	}
	else{
		echo "fail to give comment";
		die();
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
.error{
  color:green;
}
</style>
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
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $rows['lname']." ".$rows['fname'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $rows['lname']." ".$rows['fname'];?></h6>
           
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
        <a class="nav-link collapsed" href="wastecollectorDashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="waste_request.php">
          <i class="bi bi-grid"></i>
          <span>View Request Service</span>
        </a>
      </li>
     
    

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
      <h1>Complaints</h1>
      
    </div><!-- End Page Title -->
    <div class="error">
                  <p><?php echo $error;?></p>
                  </div>

    <section class="section">
      <div class="row">
       <div class="card">
        <div class="card-body">
            <h5 class="card-title">Send complaints</h5>

              <form class="row g-3" method="POST">
              <div class="row mb-3">
             
              <div class="col-md-12 col-lg-9 mt-4">
                <label for="">Your name</label>
                  <input type="text" class="form-control"name="fname" placeholder="Your Name" value="<?php echo $rows['lname']." ".$rows['fname'];?>" readonly>
                </div>
                <div class="col-md-12 col-lg-9 mt-4">
                  <label for="">Your email address</label>
                  <input type="email" class="form-control" name="email"placeholder="Email" value="<?php echo $rows['email'];?>" readonly >
                </div>
                <div class="col-md-12 col-lg-9 mt-4">
                  <label for="">Your Complain </label>
                  <textarea name="maoni" class="form-control" id="about" style="height: 100px"></textarea>
                </div><br>
                
       
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary" name="submit">Send</button>
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