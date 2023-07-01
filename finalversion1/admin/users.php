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
				<a class="nav-link collapsed" href="payment.php">
					<i class="bi bi-table"></i>
					<span>View Payments</span>
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
			<h1>Admin | List of users </h1>

		</div><!-- End Page Title -->

		<section class="section" style="height:80vh;">

			<div class="col-md-12">




				<div class="panel panel-primary filterable ">

					<section class="section">
						<div class="row">
							<div class="col-lg-12">


								<div class="card">
									
									<div class="card-body">




										<!-- Table with stripped rows -->
										<table class="table datatable table-responsive">
											<!-- <table class="table table-bordered  table-striped table-condensed t"> -->
											<?php


											$select = "SELECT * FROM users ";
											$result = mysqli_query($con, $select);





											if (mysqli_num_rows($result) > 0) {
											?>
												<thead>
													<tr class="bg-light text-dark">


														<th class="">SN</th>

														<th class=" col" colspan="2">Full name</th>
														<th class="col">Email</th>
														<th class="col">Phone number</th>
														<th class="col">Adress</th>

														<th class="col"> Role</th>
														<th class="col"> Status</th>




													</tr>
												</thead>
												<tbody>
													<?php



													$sn = 1;
													while ($user = mysqli_fetch_assoc($result)) {
														$fname = $user['fname'];
														$lname = $user['lname'];
														$email = $user['email'];
														$contact = $user['contact'];
														$address_id = $user['address_id'];
														$role_id = $user['role_id'];
														$status = $user['status'];


														//  // selet street to display in ADDRESS 	 box
														 $select_street = "select * from street where id = $address_id";
														 $result_street= mysqli_query($con, $select_street );
 
														 if($row = mysqli_num_rows($result_street)){
															 while($stname=mysqli_fetch_assoc($result_street)){
																 $street_name= $stname['name'];
																 $streetid= $stname['id'];
																
																		 
																
														     }
														 }





													?>


														<tr id="<?php echo $user['user_id']; ?>" class="id" style="text-align: ;">
															<td class="col"><?php echo $sn++; ?></td>
															<td class="col" colspan="2"><?php echo $fname . " " . $lname ?> </td>
															<td class="col"><?php echo $email ?></td>
															<td class="col"><?php echo $contact ?></td>
															<td class="col"><?php echo $street_name; ?></td>
															<!-- <td><?php echo $role_id ?></td> -->

															<td class="col">

																<?php
																if ($user['role_id'] == 1) {
																?>
																	<span class="w3-text-gray">Waste Generator</span>
																<?php
																} elseif ($user['role_id'] == 2) {
																?>
																	<span class="w3-text-blue">Waste Collector</span>
																<?php
																} elseif ($user['role_id'] == 3) {
																?>
																	<span class="w3-text-green">Officer</span>
																<?php
																} elseif ($user['role_id'] == 4) {
																?>
																	<span class="w3-text-green">Admin</span>
																<?php
																}
																?>

															</td>




															<td class="col">
																<?php
																if ($user['status'] == 4) { ?>

																	<p class='w3-text text-success'>Active</p>
																<?php } elseif($user['status'] == 5) { ?>

																	<p class='w3-text w3-text-red'>In Active</p>
																<?php }


																?>

															</td>



															<!-- <td class="col"><a href="../updates/update_user.php?update=<?php echo $user['user_id']; ?>" name="update"><i class="fs-4  bi-pencil-square text-warning fw-bold"></i></a> -->
															</td>



														</tr>

												<?php

													}
												} else {
													echo "No Records";
												}
												?>
												</tbody>
										</table>
										<!-- End Table with stripped rows -->

									</div>
								</div>

							</div>
						</div>
					</section>










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