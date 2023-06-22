<?php

require '../config/database.php';

if (isset($_POST['submit'])) {
    // get all updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $booking = filter_var($_POST['booking'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reserveTime = filter_var($_POST['reservetime'], FILTER_SANITIZE_NUMBER_INT);
    $availableTime = filter_var($_POST['time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reserveType = filter_var($_POST['reservetype'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $specify = filter_var($_POST['specify'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // validate the input
    $errors = [];
    if (!$booking) {
        $errors[] = "Please Enter Customer's Reservation No.";
    }
    if (!$fullname) {
        $errors[] = "Please Enter Customer's Full Name.";
    }
    if (!$reserveTime) {
        $errors[] = "Please Choose Customer's Reservation Date.";
    }
    if (!$availableTime) {
        $errors[] = "Please Choose Customer's Reservation Time";
    }
    if (!$reserveType) {
        $errors[] = "Please Choose Customer's Reservation Type";
    }

    if (!empty($errors)) {
        // Store the errors in the session
        $_SESSION['edit'] = $errors[0];

        // Redirect back to the edit.php page
        header('location: edit.php?id=' . $id);
        exit();
    } else {
        // Concatenate the date and time values
        $reservation = $reserveTime . ' ' . $availableTime;

        // update user
        $customer_query = "UPDATE customerstable SET booking='$booking', fullname='$fullname', reservation='$reservation', reservetype='$reserveType', specify='$specify' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $customer_query);

        if (!mysqli_errno($connection)) {
            // redirect back to admin page with success message
            $_SESSION['edit-success'] = "Customer $fullname Updated Successfully!.";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}
