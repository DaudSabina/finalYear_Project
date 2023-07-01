<?php

session_start();

require_once './app/connection.php';
require './app/sanitalization.php';
$error = '';
$emailErr = '';




if (isset($_POST['sbutton'])) {

  $fname = mysqli_real_escape_string($con, dataSanitizations($_POST['fname']));
  $lname = mysqli_real_escape_string($con, dataSanitizations($_POST['lname']));
  $email = mysqli_real_escape_string($con, dataSanitizations($_POST['email']));
  $password = mysqli_real_escape_string($con, dataSanitizations($_POST['password']));
  $cpassword = mysqli_real_escape_string($con, dataSanitizations($_POST['cpassword']));

  $contact = mysqli_real_escape_string($con, dataSanitizations($_POST['contact']));
  $address = mysqli_real_escape_string($con, dataSanitizations($_POST['street']));

  $select = "SELECT * FROM users where email = '$email'";
  $result = mysqli_query($con, $select);

  if (mysqli_num_rows($result) > 0) {




    // $error = "Email your enter";
    $emailErr = "Email address you entered all exist try new another";
  } else {


    if ($password != $cpassword) {
      $error = "Password does not match";
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);



      $insert = "INSERT INTO users (fname,lname,email,password,address_id,contact,role_id) 
                            VALUES ('$fname','$lname','$email','$hash',$address,'$contact',1)";

      $ql = mysqli_query($con, $insert);

      if ($ql) {
        header("location: index.php");
        $_SESSION['create_success'] = "Account created successfull";
      } else {

        $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

        // header("location: signup.php");

      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <style>
    .error {
      color: red;
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">HWMS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">

                    <div class="error">
                      <p><?php echo $error; ?></p>
                      <p><?php echo $emailErr; ?></p>


                    </div>
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>

                  </div>

                  <?php

                  if (isset($_SESSION['create_denied'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php

                    echo $_SESSION['create_denied'];

                    unset($_SESSION['create_denied']);
                  }

                    ?>
                    




                    <form class="row g-3 needs-validation" novalidate method="POST">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="yourName" class="form-label">Your First Name</label>
                            <input type="text" name="fname" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Please, enter your name!</div>
                          </div>

                          <div class="col-6">
                            <label for="yourEmail" class="form-label">Your Last Name</label>
                            <input type="text" name="lname" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Please enter your name</div>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-4">

                        <div class="col-8">
                          <label for="yourEmail" class="form-label">Your Email</label>
                          <input type="email" name="email" class="form-control" id="yourEmail" required>
                          <div class="invalid-feedback">Please enter a valid Email adddress!</div>




                        </div>

                        <div class="col-4">
                          <label for="yourPassword" class="form-label">Your Phone number</label>
                          <input type="text" name="contact" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Please enter your Phone number</div>
                        </div>

                      </div>





                      <div class="col-md-12 mt-4">

                        <div class="row">
                          <div class="col-3">

                            <label for="yourRegion" class="form-label">Your Region</label>
                            <select name="region" id="yourRegion" class="form-control" required>
                              <option value="">Select region</option>
                              <option value="Arusha">Arusha</option>

                            </select>

                            <div class="invalid-feedback">Please select a valid region!</div>
                          </div>

                          <div class="col-3">
                            <label for="yourDistrict" class="form-label">Your District</label>
                            <select name="district" id="yourDistrict" class="form-control" required>
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

                            <div class="invalid-feedback">Please select a valid district!</div>
                          </div>

                          <div class="col-3">
                            <label for="yourWard" class="form-label">Your Ward</label>
                            <select name="ward" id="yourWard" class="form-control" required>
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

                            <div class="invalid-feedback">Please select a valid Ward!</div>
                          </div>


                          <div class="col-3">
                            <label for="yourStreet" class="form-label">Your Street</label>
                            <select name="street" id="yourStreet" class="form-control" required>
                              <option value="">Select street</option>

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
                              } ?>


                            </select>

                            <div class="invalid-feedback">Please select a valid street!</div>
                          </div>
                        </div>

                      </div>


                      <div class="row mt-4">
                        <div class="col-6">

                          <label for="yourUsername" class="form-label">Password</label>
                          <div class="input-group has-validation">

                            <input type="password" name="password" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">Please enter password.</div>
                            <div class="invalid-feedback"><?php $error ?></div>
                          </div>
                        </div>

                        <div class="col-6">
                          <label for="yourUsername" class="form-label">Confirm password</label>
                          <div class="input-group has-validation">

                            <input type="password" name="cpassword" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">Please Enter password Again.</div>
                          </div>
                        </div>
                      </div>









                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="sbutton">Create Account</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Already have an account? <a href="index.php">Log in</a></p>
                      </div>
                    </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>