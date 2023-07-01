<?php
require "../app/connection.php";
require "../app/sanitalization.php";

// selet user information by id

if (isset($_GET['update'])) {
    $user_id = $_GET['update'];

    $select = "SELECT * FROM users where user_id = $user_id";
    $result = mysqli_query($con, $select);





    if (mysqli_num_rows($result) > 0) {


        $user = mysqli_fetch_assoc($result);

        $role_id =$user['role_id'];
        $status_id =$user['status'];

       
        $select_role1 = "SELECT * FROM roles WHERE id = $role_id";
        $result_role1 = mysqli_query($con, $select_role1);

        if ($row1 = mysqli_num_rows($result_role1)>0) {
            $rname1 = mysqli_fetch_assoc($result_role1);
                $rolename1 = $rname1['name'];
                $roleid1 = $rname1['id'];

        }

  
     

      

    }
}

// vailable for display errors 
$fnameErr = $lnameErr = $emailErr = $pnumberErr = $roleErr = $statusErr = $districtErr = $wardErr = $streetErr = "";

// valiable for get input
$fname = $lname = $email = $pnumber = $roles = $status = $district = $ward = $street =  "";


if (isset($_POST['update'])) {
    // $user_id =  $_GET
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
    // die($roles);
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
    } elseif ($fname && $lname && $email && $pnumber && $roles && $status &&  $district && $ward && $street) {


        

        $update_user = "UPDATE users SET fname = '$fname', lname = '$lname' , email = '$email', address_id = $street, contact= '$pnumber', status= $status, role_id= $roles  where user_id = $user_id";

        $resultuser = mysqli_query($con, $update_user);

        if ($resultuser) {
            session_start();
            $_SESSION['updateuser'] = "User information updated ";
            header("location:./status_change.php");
        } else {
            echo "no";
        }
    }
}
