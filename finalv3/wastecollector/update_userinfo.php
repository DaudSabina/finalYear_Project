<?php

require_once('../app/connection.php');
require "../app/sanitalization.php";
session_start();


$user_id = $_SESSION['id'];
if (empty($user_id)) {
  header('location:../index.php');
}else {
  
  $query = "select * from users where user_id =$user_id ";
  $send=mysqli_query($con,$query);
  $rows = mysqli_fetch_assoc($send);

  $u_id = $rows['user_id'];


}




$password_oldErr = "";
$password_old = "";
if (isset($_POST['update_userinfo'])) {

 $fname = mysqli_real_escape_string($con, dataSanitizations($_POST['firstName']));
 $lname = mysqli_real_escape_string($con, dataSanitizations($_POST['lastName']));
 $email = mysqli_real_escape_string($con, dataSanitizations($_POST['email']));
 $pnumber = mysqli_real_escape_string($con, dataSanitizations($_POST['phone']));
 $street = mysqli_real_escape_string($con, dataSanitizations($_POST['street']));



$update_request = "UPDATE users SET fname = '$fname', lname= '$lname', email=  '$email', address_id=$street ,contact= '$pnumber'  where user_id =  $u_id";
$result_insert = mysqli_query($con, $update_request);

if($result_insert){
session_start();


$_SESSION['updated']= "Information updated succcessfull";
header("location:./profile.php");

}else{
 $_SESSION['updated']= "Information not updated succcessfull";
 header("location:./profile.php");
}
 }