<?php
session_start();
require "../app/connection.php";
require "../app/sanitalization.php";

// vailable for display errors 
$fnameErr = $lnameErr = $emailErr = $pnumberErr = $roleErr = $statusErr = $districtErr = $wardErr = $streetErr = "";

// valiable for get input
$fname = $lname = $email = $pnumber = $roles = $status = $district = $ward = $street =  "";

if (isset($_POST['submit'])) {
   $fname = mysqli_real_escape_string($con, dataSanitizations($_POST['fname']));
   $lname = mysqli_real_escape_string($con, dataSanitizations($_POST['lname']));
   $email = mysqli_real_escape_string($con, dataSanitizations($_POST['email']));
   $pnumber = mysqli_real_escape_string($con, dataSanitizations($_POST['pnumber']));
   $roles = mysqli_real_escape_string($con, dataSanitizations($_POST['roles']));
   $status = mysqli_real_escape_string($con, dataSanitizations($_POST['status']));
   $district = mysqli_real_escape_string($con, dataSanitizations($_POST['district']));
   $ward = mysqli_real_escape_string($con, dataSanitizations($_POST['ward']));
   $street = mysqli_real_escape_string($con, dataSanitizations($_POST['street']));

   // dispaly errors message if input is empty

   if (empty($fname)) {
      $fnameErr = "Firstname required";
   }

   if (empty($lname)) {
      $lnameErr = "Lastname required";
   }

   if (empty($email)) {
      $emailErr = "Email required";
   }

   if (empty($pnumber)) {
      $pnumberErr = "Phone number required";
   }

   if (empty($roles)) {
      $roleErr = "Role required";
   }

   if (empty($status)) {
      $statusErr = "Status required";
   } 

   if (empty($district)) {
      $districtErr = "District required";
   }

   if (empty($ward)) {
      $wardErr = "Ward required";
   }

   if (empty($street)) {
      $streetErr = "Street required";
   }
   
   elseif ($fname && $lname && $email && $pnumber && $roles && $status &&  $district && $ward && $street ) {
      

    $insert = "INSERT INTO users(fname,lname,email,address_id,contact,status,role_id) 
                           VALUES('$fname', '$lname','$email', $street, '$pnumber', $status, $roles) ";
      $result_insert = mysqli_query($con, $insert);

      if($result_insert){
        session_start();
        header("location: waste_collector.php");
       
        $_SESSION['create_waste_collector'] = "Waste colletor created successfull";
      } else {
        session_start();

        $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

        header("location: add_waste_collector.php");
   }
}
}
