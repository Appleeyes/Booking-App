<?php
require './config/database.php';
session_start();
// destroy all session and take back to home page
session_destroy();
header('location: ' . ROOT_URL . 'customer/index.php');
die();
