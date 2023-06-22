<?php
require '../config/database.php';

// check login status
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . 'signin.php');
}

// fetch admin's info from database except current user
$current_admin = $_SESSION['user-id'];

$query = "SELECT * FROM admin WHERE NOT id=$current_admin";
$admins = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Booking App</title>
</head>

<body>
    <section id='header'>
        <div>
            <h1>APPLE'S RESTUARANT</h1>
        </div>
        <div class="nav">
            <?php if (isset($_SESSION['user-id'])) : ?>
                <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                <?php if (isset($_SESSION['is_an_admin'])) : ?>
                    <li><a href="<?= ROOT_URL ?>admin/manage-admin.php">Admin</a></li>
                <?php endif ?>
            <?php else : ?>
                <li><a href="<?= ROOT_URL ?>signin.php">Sign-in</a></li>
            <?php endif ?>
        </div>
    </section>