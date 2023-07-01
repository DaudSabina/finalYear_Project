<?php
session_start();
require "../app/connection.php";
require "../app/sanitalization.php";


$requestError = $paymentError = " ";

$request = $payment = " ";

if (isset($_POST['update_status'])) {
    $request_status_id = $_POST['request_statusid'];
    $request = mysqli_real_escape_string($con, dataSanitizations($_POST['request_status']));
    $payment = mysqli_real_escape_string($con, dataSanitizations($_POST['payment_status']));

    // dispaly errors message if input is empty

    if (empty($request)) {
        $requestError = "Request required";
    }

    //  if (!empty($payment)) {
    //     $paymentError = "Payment required";
    //  }

    elseif ($request && $payment && $request_status_id) {
        // UPDATE `users` SET `lname` = 'niway' WHERE `users`.`user_id` = 29;

        $update_request = "UPDATE waste_request SET request_status_id = $request where id = $request_status_id";

        $result_update = mysqli_query($con, $update_request);

        if ($result_update) {
            session_start();
            header("location: waste_request.php");

            $_SESSION['update_waste_request'] = "Waste request status update successfull";
        } else {
            session_start();

            $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

            //   header("location: add_waste_collector.php");
        }
    }
}

if (isset($_POST['update_status'])) {
    $request_status_id = $_POST['request_statusid'];
    $request = mysqli_real_escape_string($con, dataSanitizations($_POST['request_status']));
    $payment = mysqli_real_escape_string($con, dataSanitizations($_POST['payment_status']));

    // dispaly errors message if input is empty

    if (empty($request)) {
        $requestError = "Request required";
    }

    //  if (!empty($payment)) {
    //     $paymentError = "Payment required";
    //  }

    elseif ($request && $payment && $request_status_id) {
        // UPDATE `users` SET `lname` = 'niway' WHERE `users`.`user_id` = 29;

        $update_request = "UPDATE waste_request SET request_status_id = $request where id = $request_status_id";

        $result_update = mysqli_query($con, $update_request);

        if ($result_update) {
            session_start();
            header("location: waste_request.php");

            $_SESSION['update_waste_request'] = "Waste request status update successfull";
        } else {
            session_start();

            $_SESSION['create_denied'] = "Account not created successfull, Something went wrong!!";

            //   header("location: add_waste_collector.php");
        }
    }
}