<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/header.php';

// fetch admin's info from database except current user
$current_admin = $_SESSION['user-id'];

$query = "SELECT * FROM admin WHERE NOT id=$current_admin";
$admins = mysqli_query($connection, $query);
?>

<body>
    <?php if (isset($_SESSION['signup-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['signup-success'];
                unset($_SESSION['signup-success']);
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
    <?php if (isset($_SESSION['delete-all'])) : ?>
        <div class="alert-message error">
            <p>
                <?= $_SESSION['delete-all'];
                unset($_SESSION['delete-all']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete-all-success'])) : ?>
        <div class="alert-message success">
            <p>
                <?= $_SESSION['delete-all-success'];
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
    <div class="admin-control">
        <li><a href="signup.php">Add New Admin</a></li>
    </div>
    <div class="container">
        <h1 style="text-align:center;">ADMIN INFO</h1>

        <?php if (mysqli_num_rows($admins) > 0) : ?>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($admin = mysqli_fetch_assoc($admins)) : ?>
                        <tr>
                            <td><?= $admin['fullname'] ?></td>
                            <td><?= $admin['email'] ?></td>
                            <td><?= $admin['gender'] ?></td>
                            <td><?= $admin['is_admin'] ? 'Yes' : 'No' ?></td>
                            <td>
                                <a href="<?= ROOT_URL ?>admin/delete-admin.php?id=<?= $admin['id'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                            <div class="alert-message error">
                                <p>"No Information Found" </p>
                            </div>
                        </td>
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