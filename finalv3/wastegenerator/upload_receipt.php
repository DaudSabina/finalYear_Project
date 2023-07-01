<?php

require_once '../app/connection.php';
require "../app/sanitalization.php";
session_start();

$user_id = $_SESSION['id'];
if (empty($user_id)) {
    header('location:../index.php');
} else {

    $query = "select * from users where user_id =$user_id ";
    $send = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($send);

    $u_id = $rows['user_id'];
    $u_password = $rows['password'];

}

if (isset($_POST["upload"])) {
    $request_id = $_POST['request_id'];
            $pdfname = $_FILES['PDF']['name'];
            $pdfsize = $_FILES['PDF']['size'];
            $pdftemp = $_FILES['PDF']['tmp_name'];
            $er = $_FILES['PDF']['error'];
            
            $allowed = array("pdf");
            $endi = strtolower($pdfname);
            $endi = explode(".",$endi);
            $endi = end($endi);
            
            // $endi = strtolower(end(explode(".",$fname)));
            // $new_name = uniqid("",true);

            $length = 7;

  $character_set = '0123456789';
  $character_set_length = strlen($character_set);
  $new_name = 'receipt';


  for ($i = 0; $i < $length; $i++) {
      $new_name .= $character_set[rand(0, $character_set_length - 1)];

  }
 
            if(in_array($endi,$allowed)){
                if($fsize < 200000){
                    if(!$er){
                        
                        $filename = "$new_name.$endi";
                        $updatedtime = date("Y.m.d") ." ". date("h.i.sa");
                     
                        $update_payment_receip = "UPDATE payments SET	payment_status = 6, payment_update = '$updatedtime',	receipt	= '$filename' WHERE waste_request_id=  $request_id";
                        mysqli_query($con, $update_payment_receip);
                        move_uploaded_file($pdftemp,'../receipt/'.$new_name.'.'.$endi);
                    
                        echo
                        "
                        <script>
                          alert('file uploaded successifull');
                          document.location.href = './waste_payment.php';
                        </script>
                        ";
                        
                
                    }else{
                        
                        echo
                        "
                        <script>
                          alert('error sending');
                          document.location.href = './payment.php';
                        </script>
                        ";
                    }
                }else{
                   
                    echo
                    "
                    <script>
                      alert('file to rage');
                      document.location.href = './payment.php';
                    </script>
                    ";
                }

            }else{
             
                echo
                "
                <script>
                  alert('that file you try to upload is not an pdf, try again');
                  document.location.href = './payment.php';
                </script>
                ";
            }
            
        
        }
    
    

