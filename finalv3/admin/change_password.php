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
  $u_password = $rows['password'];

}




$password_oldErr = "";
$password_old = "";
if (isset($_POST['change_password'])) {
    $password_old = mysqli_real_escape_string($con, dataSanitizations($_POST['passwordold']));
    $passwordnew = mysqli_real_escape_string($con, dataSanitizations($_POST['newpassword']));
    $password_renew = mysqli_real_escape_string($con, dataSanitizations($_POST['renewpassword']));



            if(password_verify($password_old, $u_password ) ){

                $real_password = password_hash($password_renew, PASSWORD_DEFAULT);
// 
           

                if($passwordnew == $password_renew){
                    
                    $updatepass = "UPDATE users SET password = '$real_password' WHERE user_id=$u_id ";
    
                    $resultupdate = mysqli_query($con, $updatepass);
                    if ($resultupdate) {
    
                        session_start();
    
             
                        $_SESSION['updated']= "Password  updated successfull! Login to continue";



                        header("location:../index.php");
    
                    } else {
                        session_start();
    
             
                        $_SESSION['notsame']= "Password does not updated something went wrong try again!";
                        header("location:./profile.php");
                    }


                }else{
                  
                    $_SESSION['notsame']= "Password does not match try again!";
                    header("location:./profile.php");
                }


            }

            else{

                session_start();

         
                $_SESSION['notsame']= "Password you try to enter does not match try again!";
                header("location:./profile.php");
       

            }

            die();
        }








?>



