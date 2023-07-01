<?php
require "../app/connection.php";
require "../app/sanitalization.php";

// vailable for display errors 
 $waste_nameError = $waste_categoryidError  = $waste_generatory_idError   = "";

// valiable for get input
$waste_categoryid = $waste_name =  $waste_generatory_id   =  "";

if (isset($_POST['request'])) {
   $waste_name  = mysqli_real_escape_string($con, dataSanitizations($_POST['waste_name']));
   $waste_categoryid = mysqli_real_escape_string($con, dataSanitizations($_POST['waste_category']));
   $waste_generatory_id  = mysqli_real_escape_string($con, dataSanitizations($_POST['waste_generator_id']));
   
   // dispaly errors message if input is empty




   if (empty($waste_name)) {
      $waste_nameError = "Waste name required";
   }

   if (empty($waste_categoryid)) {
      $waste_categoryidError = "waste category required";
   }

   if (empty($waste_generatory_id)) {
    $waste_generatory_idError = "Waste name required";
 }


   
   elseif ($waste_name && $waste_categoryid  && $waste_generatory_id) {

    //    die($waste_generatory_id);
      
   
   //  $insert = "INSERT INTO waste_request('waste_name', 'waste_category_id', 'waste_generetor_id') 
   //                         VALUES('$waste_name', $waste_categoryid, $waste_generatory_id) ";
      

      $insert = "INSERT INTO `waste_request` (`id`, `waste_name`, `waste_category_id`, `waste_generetor_id`, `request_status_id`, `payment_status_id`, `waste_colletor_id`) 
      VALUES (NULL, '$waste_name', '$waste_categoryid', '$waste_generatory_id', '1', '7', '0')";

      // die($waste_categoryid. $waste_name. $waste_generatory_id);
$result_insert = mysqli_query($con, $insert);
      if($result_insert){
         session_start();
       
         header("location:../wastegenerator/wastegeneratorDashboard.php"); 
       
         $_SESSION['request_success']= "Request submited successfull, Now make the payment";

      }else{
        session_start();
       
        header("location:../wastegenerator/wastegeneratorDashboard.php"); 
       
        $_SESSION['request_not_success']= "Request not submited successfull, something went wrong try agin leter..";
      }
   }
}
