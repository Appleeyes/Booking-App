<?php
session_start();

$email = $_SESSION['signin-data']['email'] ?? null;
$password = $_SESSION['password']['password'] ?? null;
unset($_SESSION['signin-data'])
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking App</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Log In As An Admin</h1>
        <?php if (isset($_SESSION['signin'])) : ?>
                <div class="alert-message error">
                    <p>
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

        <form action="signin-logic.php" method="POST">
            <div class="contain">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" value="<?= $email ?>" id="input-form" class="form-input" placeholder="Input Your Email Address.">
            </div>
            <div class="contain">
                <label for="other" class="form-label">Password:</label>
                <input type="password" name="password" value="<?= $password ?>" id="input-form" class="form-input" placeholder="Input Your Password">
            </div>
            <button class="submit" id="btn" type="submit" name="submit">SUBMIT</button>

        </form>
    </div>
</body>

</html>