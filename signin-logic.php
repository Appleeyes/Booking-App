<?php
require './config/database.php';

if (isset($_POST['submit'])) {
    // get form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email) {
        $_SESSION['signin'] = 'Email required';
    } elseif (!$password) {
        $_SESSION['signin'] = 'Password required';
    } else {
        // fetch user from database
        $fetch_user_query = "SELECT * FROM admin WHERE email='$email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // convert result into assoc array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            // compare form password to database password
            if (password_verify($password, $db_password)) {
                // set password for access control
                $_SESSION['user-id'] = $user_record['id'];
                // set session if it's an admin
                if($user_record['is_admin'] == 1){
                    $_SESSION['is_an_admin'] = true;
                }
                // log user in
                $_SESSION['signin-success'] = "WELCOME, successfully logged in";
                header('location: ' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['signin'] = "Incorrect Password or Email";
            }
        } else {
            $_SESSION['signin'] = 'User not found';
        }
    }
    // incase of an error, redirect to signin form with login data
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}
