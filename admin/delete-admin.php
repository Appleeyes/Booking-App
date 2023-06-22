<?php
require '../config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // fetch customer's data from database
    $query = "SELECT * FROM admin WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure we get only one customer¨s info
    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);

        // delete customer from database
        $delete_query = "DELETE FROM admin WHERE id=$id";
        $delete_result = mysqli_query($connection, $delete_query);
        if (mysqli_errno($connection)) {
            $_SESSION['delete'] = "Unable to delete Admin {$admin['fullname']} Info";
        } else {
            $_SESSION['delete-success'] = "Admin {$admin['fullname']} Info deleted successfully!";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-admin.php');
