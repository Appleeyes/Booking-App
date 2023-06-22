<?php
require '../config/database.php';

// Get data from form when it's submitted
if (isset($_POST['submit'])){
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validate the input
    if (!$fullname) {
        $_SESSION['signup'] = 'Please enter your Full Name';
    } elseif (!$email) {
        $_SESSION['signup'] = 'Please enter your Email';
    } elseif (!$gender || $gender === '') {
        $_SESSION['signup'] = 'Please choose the Gender you identify';
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = 'Passwords should not be less than 8 characters';
    } else {
        // check if password match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = 'Passwords do not match!';
        }else{
            // hash the password
            $hashedPassword = password_hash($createpassword, PASSWORD_DEFAULT);

            // check if user already exist
            $user_query = "SELECT * FROM admin WHERE email = '$email'";
            $user_result = mysqli_query($connection, $user_query);
            if (mysqli_num_rows($user_result) > 0) {
                $_SESSION['signup'] = 'Admin already exist';
            }
        }
    } 
    // redirect back to signup if an error occur
    if(isset($_SESSION['signup'])){
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/signup.php');
        die();
    } else {
        // insert a new admin ino database
        $query = "INSERT INTO admin (fullname, email, gender, is_admin, password) VALUES('$fullname', '$email', '$gender', '$is_admin', '$hashedPassword')";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)){
            // redirect to manage-admin page
            $_SESSION['signup-success'] = "New admin $fullname added successfully";
            header('location: ' . ROOT_URL . 'admin/manage-admin.php');
            die();
        }
    }
} else {
    // take back to signup page if not submitted
    header('location: ' . ROOT_URL . 'admin/signup.php');
    die();
}