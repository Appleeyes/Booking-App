<?php
require '../config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // fetch customer's data from database
    $query = "SELECT * FROM customerstable WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure we get only one customer¨s info
    if (mysqli_num_rows($result) == 1){
        $customer = mysqli_fetch_assoc($result);

        // delete customer from database
        $delete_query = "DELETE FROM customerstable WHERE id=$id";
        $delete_result = mysqli_query($connection, $delete_query);
        if(mysqli_errno($connection)){
            $_SESSION['delete'] = "Unable to delete Customer {$customer['fullname']} Info";
        }else {
            $_SESSION['delete-success'] = "Customer {$customer['fullname']} Info deleted successfully!";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/');