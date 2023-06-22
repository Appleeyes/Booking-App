<?php
include '../config/header.php';

// fetch customer's info from database for the first table
$query = "SELECT * FROM customerstable ORDER BY fullname";
$customers = mysqli_query($connection, $query);

// fetch customer's info from database for the second table
$otherQuery = "SELECT * FROM customerstable ORDER BY fullname";
$otherCustomers = mysqli_query($connection, $otherQuery);
?>

<body>
    <?php if (isset($_SESSION['edit-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['edit-success'];
                unset($_SESSION['edit-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['delete-success'];
                unset($_SESSION['delete-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete'])) : ?>
        <div class="alert-message error">
            <p>
                <?= $_SESSION['delete'];
                unset($_SESSION['delete']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['signin-success'])) : ?>
                <div class="alert-message success">
                    <p>
                        <?= $_SESSION['signin-success'];
                        unset($_SESSION['signin-success']);
                        ?>
                    </p>
                </div>
    <?php endif ?>
    <div class="container" id="table-container">
        <h1 style="text-align:center;">CUSTOMER'S RESERVATION INFO</h1>

        <?php if (mysqli_num_rows($customers) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Booking NO.</th>
                        <th>Full Name</th>
                        <th>Title</th>
                        <th>Reservation</th>
                        <th>Reservation Type</th>
                        <th>Specification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($customer = mysqli_fetch_assoc($customers)) : ?>
                        <tr>
                            <td><?= $customer['booking'] ?></td>
                            <td><?= $customer['fullname'] ?></td>
                            <td><?= $customer['title'] ?></td>
                            <td><?= $customer['reservation'] ?></td>
                            <td><?= $customer['reservetype'] ?></td>
                            <td><?= $customer['specify'] ?></td>
                            <td>
                                <a href="<?= ROOT_URL ?>admin/edit.php?id=<?= $customer['id'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                <a href="<?= ROOT_URL ?>admin/delete.php?id=<?= $customer['id'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Booking NO.</th>
                        <th>Full Name</th>
                        <th>Title</th>
                        <th>Reservation</th>
                        <th>Reservation Type</th>
                        <th>Specification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <div class="alert-message error"><?= "No Information's Found" ?></div>
                    </tr>
                </tbody>
            </table>
        <?php endif ?>
    </div>

    <div class="container" id="table-container">
        <h1 style="text-align:center;">CUSTOMER'S OTHER INFORMATION</h1>

        <?php if (mysqli_num_rows($customers) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        <th>NO. Of Guest</th>
                        <th>Special Request</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($otherCustomer = mysqli_fetch_assoc($otherCustomers)) : ?>
                        <tr>
                            <td><?= $otherCustomer['fullname'] ?></td>
                            <td><?= $otherCustomer['gender'] ?></td>
                            <td><?= $otherCustomer['email'] ?></td>
                            <td><?= $otherCustomer['guest'] ?></td>
                            <td><?= $otherCustomer['message'] ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete.php?id=<?= $otherCustomer['id'] ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Gender</th>
                        <th>Title</th>
                        <th>NO. Of Guest</th>
                        <th>Special Request</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <div class="alert-message error"><?= "No Information's Found" ?></div>
                    </tr>
                </tbody>
            </table>
        <?php endif ?>
    </div>

    <script src="https://kit.fontawesome.com/47027db1aa.js" crossorigin="anonymous"></script>
    <script src="../script.js">
    </script>
</body>

</html>