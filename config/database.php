<?php
session_start();
define('ROOT_URL', 'http://localhost/Booking-App/');
define('DB_HOST', 'localhost');
define('DB_USER', 'applw');
define('DB_PASS', 'apple@22');
define('DB_NAME', 'booking_app');


// connect to the database

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}