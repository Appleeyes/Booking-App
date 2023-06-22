<?php
session_start();

// getback form data incase of error while filing form
$fullname = $_SESSION['signup-data']['fullname'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$gender = $_SESSION['signup-data']['gender'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

// delete session
unset($_SESSION['signup-data']);
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
    <div class="container">
        <h1 style="text-align:center;">Add An Admin</h1>
        <?php if (isset($_SESSION['signup'])) : ?>
            <div class="alert-message error">
                <p>
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <form action="signup-logic.php" method="POST">
            <div class="contain">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" name="fullname" value="<?= $fullname ?>" id="input-form" class="form-input" placeholder="Input Your Full Name.">
            </div>
            <div class="contain">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" value="<?= $email ?>" id="input-form" class="form-input" placeholder="Input Your Email Address.">
            </div>
            <div class="contain">
                <label for="gender" class="form-label">Your Gender:</label>
                <select name="gender" class="form-input" id="select-form">
                    <option value=''>Please Select</option>
                    <option value="Male" <?= $gender === 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $gender === 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="contain">
                <label for="role" class="form-label">Your Role:</label>
                <select name="userrole" class="form-input" id="select-form">
                    <option>Select User</option>
                    <option value="0">Contributor</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="contain">
                <label for="other" class="form-label">Create Password:</label>
                <input type="password" name="createpassword" value="<?= $createpassword ?>" id="input-form" class="form-input" placeholder="Create Password">
            </div>
            <div class="contain">
                <label for="other" class="form-label">Confirm Password:</label>
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" id="input-form" class="form-input" placeholder="Confirm Password">
            </div>
            <button class="submit" id="btn" type="submit" name="submit">SUBMIT</button>
            <div class="contain" id="small">
                <small style="text-align: center;">Already have an account? <a href=" signin.php">Sign In</a></small>
            </div>

        </form>
    </div>
</body>

</html>