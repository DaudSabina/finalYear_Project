<?php
require_once('../app/connection.php');
require "../app/sanitalization.php";



$monthError = "";
$month = "";


session_start();


$user_id = $_SESSION['id'];
if (empty($user_id)) {
  header('location:../index.php');
} else {

  $query = "select * from users where user_id =$user_id ";
  $send = mysqli_query($con, $query);
  $rows = mysqli_fetch_assoc($send);
}


##function used to sent message 
function message($sms_content, $phone, $firstname, $lastname, $sum, $month_details)
{

  $api_key = '0a5b0a028d72c3c2';
  $secret_key = 'NGUyNzY5NzI2ZmZiYzAwNzk3NGUyODg0NTc0NTgxYjgyNDdhZTRlMWM4YTQxMjhmZjc0OTkzMWY0NDY3NDg2ZQ==';

  if (strlen($phone) == 10) {
    $phone = substr($phone, 1);
  }

  if (strlen($phone) == 10) {
    $phone = '255' . $phone;
  }


  $postData = array(
    'source_addr' => 'INFO',
    'encoding' => 0,
    'schedule_time' => '',
    'message' => $sms_content,
    'recipients' => [array('recipient_id' => '1', 'dest_addr' => $phone)]

  );

  $Url = 'https://apisms.beem.africa/v1/send';

  $ch = curl_init($Url);
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
      'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
      'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
  ));

  $response = curl_exec($ch);

  if ($response === FALSE) {

    ##if message is fail

    $_SESSION['message'] = "Failed to Send  Message   ";
    $_SESSION['add-icon'] = "error";
    $_SESSION['text'] = "Connect to the internet first";

    echo "not sent";
    header("location:./bill.php");
  } else {

    ## if message successfull
    $_SESSION['message'] = "Message Sent Successfull ";
    $_SESSION['add-icon'] = "success";
    // $_SESSION['text'] = $fname . " " . $sname . " " . $lname;

    $_SESSION['text'] = "";

    // echo "continion";
    // header("location:./bill.php");
  }
}



if (isset($_POST['bill'])) {
  $firstname = mysqli_real_escape_string($con, dataSanitizations($_POST['fname']));
  $lastname = mysqli_real_escape_string($con, dataSanitizations($_POST['lname']));
  $pnumber = mysqli_real_escape_string($con, dataSanitizations($_POST['pnumber']));


  $month = mysqli_real_escape_string($con, dataSanitizations($_POST['month']));
  $month_detail = mysqli_real_escape_string($con, dataSanitizations($_POST['month']));
  $waste_request_id  = $_POST['request_name'];





  if ($month == 1) {
    $sum =   $month * 2000;

    

    $sms = "Ndugu " . $firstname . " " . $lastname  . " \n" . "Maelekezo ya  malipo na jinsi ya kufanya malipo" . "\n" . "Malipo ya taarifa ya maombia ya taka ni Tsh. 2000/= kwa mwezi tu." ."\n \n" ."lipia kiasi Tsh.". $sum . " " . "Kwa kipindi cha mwezi " . $month . "\n\n"."Fanya malipo kwa kutumia kadi ya benki kwenye mfumo"."\n \n Ahsante."."\n \n HWMS";

    message($sms, $pnumber, $firstname, $lastname, $sum, $month_details);
  } elseif ($month > 1) {
    $sum =   $month * 2000;

    $sms = "Ndugu " . $firstname . " " . $lastname  . " \n" . "Maelekezo ya  malipo na jinsi ya kufanya malipo" . "\n" . "Malipo ya taarifa ya maombia ya taka ni Tsh. 2000/= kwa mwezi tu." ."\n \n" ."lipia kiasi Tsh.". $sum . " " . "Kwa kipindi cha mwezi " . $month . "\n\n"."Fanya malipo kwa kutumia kadi ya benki kwenye mfumo"."\n \n Ahsante."."\n \n HWMS";

    message($sms, $pnumber, $firstname, $lastname, $sum, $month_details);
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
          <div class="card-header">
            Maelekezo ya malipo na jinsi ya kufuatilia ripoti yako
          </div>
          <div class="card-body">
            <h5 class="fw-bold">malipo ya taarifa ya maombia ya taka ni Tsh. 2000/= kwa mwezi tu.</h5>
            <p>

              Taarifa zako zimepokelewa fanya malipo ya kiasi
              <span class="fw-bold h5">
                <?php
                if ($month_detail == 1) {
                  $sum =   $month_detail * 2000;

                  echo $sum . "/=";
                } elseif ($month_detail > 1) {
                  $sum1 =   $month_detail * 2000;

                  echo $sum1 . "/=";
                }
                ?>
              </span> kwa kibindi cha
              <span class="fw-bold h5">
                <?php

                if ($month_detail == 1) {
                  echo "mwezi ";
                } elseif ($month_detail > 1) {
                  echo "miezi ";
                }
                echo   $month_detail;



                ?>
              </span>

            </p>

            <h6>Njia za malipo yafanyike kwa kadi ya benki</h6>
            <p>
            <ul>
              <li>1. NMB </li>
              <li>2. CRDB</li>
              <li>3. NBC</li>







            </ul>

            </p>
            <form action="./bill.php" class="g-3 needs-validation" novalidate method="post">
              <div class="row mt-4">




                <div class="col-md-3">
                  <label for="yourPassword" class="form-label">Enter card number</label>
                  <input type="number" name="cardnumber" class="form-control" id="yourCard" " required>
                  <div class=" invalid-feedback">Please enter your card number
                </div>
              </div>

              <div class="col-md-3">
                <label for="yourPassword" class="form-label">Enter expiration date</label>
                <input type="number" name="date" class="form-control" id="yourDate" required>
                <div class="invalid-feedback">Please enter your expiration date</div>
              </div>

              <div class="col-md-3">
                <label for="yourPassword" class="form-label">Enter expiration year</label>
                <input type="number" name="year" class="form-control" id="yourYear" required>
                <div class="invalid-feedback">Please enter your expiration year</div>
              </div>

              <div class="col-md-3">
                <label for="yourPassword" class="form-label">Enter CVC</label>
                <input type="number" name="cvc" class="form-control" id="yourCvc" required>
                <div class="invalid-feedback">Please enter your CVC</div>
              </div>

              <div class="col-md-4">
                <label for="">Phone number</label>
                <input type="text" class="form-control" placeholder="" value="<?php echo $rows['contact']; ?>">
              </div>

              <div class="text-center col-md-3 m-4 ">
                <!-- <label for=""></labe l> -->
                <button type="submit" name="" class="btn btn-primary form-control">Pay now</button>

              </div>
          </div>
          </form>




          <p>Bofya hapa kwa kuongeza maombi mengine ya uchafu <a href="./request.php" class="bi bi-plus fw-bold m">fanya maombi mapya</a> </p>
          <p>Ukishamaliza kulipia bofya hapa kuangalia <a href="./waste_payment.php" class="bi bi-table fw-bold m"> taarifa yako</a></p>




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