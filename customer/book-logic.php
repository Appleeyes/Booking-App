<?php
require '../config/database.php';

// get data when submitted
if (isset($_POST['submit'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $guest = filter_var($_POST['guest'], FILTER_SANITIZE_NUMBER_INT);
    $reserveTime = filter_var($_POST['reservetime'], FILTER_SANITIZE_NUMBER_INT);
    $availableTime = filter_var($_POST['time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reserveType = filter_var($_POST['reservetype'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $specify = filter_var($_POST['specify'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validate the input
    if (!$fullname) {
        $_SESSION['booking'] = 'Please enter your Full Name';
    } elseif (!$email) {
        $_SESSION['booking'] = 'Please enter a valid Email Address';
    } elseif (!$gender || $gender === '') {
        $_SESSION['booking'] = 'Please choose the Gender you identify';
    } elseif (!$title || $title === '') {
        $_SESSION['booking'] = 'Please choose your title';
    } elseif (!$guest) {
        $_SESSION['booking'] = 'Please enter the No. of Guest';
    } elseif (!$reserveTime) {
        $_SESSION['booking'] = 'Please choose your Reservation Date';
    } elseif (!$availableTime) {
        $_SESSION['booking'] = 'Please choose your Reservation Time';
    } elseif (!$reserveType || $reserveType === '') {
        $_SESSION['booking'] = 'Please choose your Reservation Type';
    } else {
        //fuction generate random booking number
        function generateBookingNum()
        {
            $prefix = 'APBK';
            $suffix = rand(1000, 9999);
            return $prefix . $suffix;
        }

        // Generate registration number
        $booking = generateBookingNum();
    }

    // Concatenate the date and time values
    $reservation = $reserveTime . ' ' . $availableTime;

    // redirect back to booking page incase of error
    if (isset($_SESSION['booking'])) {
        $_SESSION['user-data'] = $_POST;
        header('location: ' . ROOT_URL . 'customer/book.php');
        die();
    } else {
        // insert customer's information to table
        $customer_query = "INSERT INTO customerstable (booking, fullname, email, gender, title, guest, reservation, reservetype, specify, message) VALUES('$booking', '$fullname', '$email', '$gender', '$title', '$guest', '$reservation', '$reserveType', '$specify', '$message')";
        $result = mysqli_query($connection, $customer_query);

        if (!mysqli_errno($connection)) {
            // redirect back to index page with success message
            $_SESSION['booking-success'] = "CONGRATULATIONS, YOU NOW HAVE A SPOT!. CONFIRM YOUR INFORMATION BELOW.";
            $_SESSION['success'] =  "<h1>Apple's Restaurant Customer's Reservation</h1>
            <table id='tabular'>
                <tr>
                    <th>Name</th>
                    <td>{$fullname}</td>
                </tr>
                <tr>
                    <th>Reservation Type</th>
                    <td>{$reserveType}</td>
                </tr>
                <tr>
                    <th>Specify If Other</th>
                    <td>{$specify}</td>
                </tr>
                <tr>
                    <th>Reservation</th>
                    <td>{$reservation}</td>
                </tr>
                <tr>
                    <th>Booking Code</th>
                    <td>{$booking}</td>
                </tr>
            </table>";
            header('location: ' . ROOT_URL . 'customer/index.php');
            die();
        }
    }
} else {
    // take back to form if not submitted
    header('location: ' . ROOT_URL . 'customer/book.php');
    die();
}
