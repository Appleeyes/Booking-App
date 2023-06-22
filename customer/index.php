<?php
session_start();
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
        <div>
            <li><a href="../signin.php">Sign-in</a></li>
        </div>
    </section>

    <div class="container">
        <h1 style="text-align:center;">WELCOME TO APPLE'S RESTUARANT</h1>
        <p style="text-align: center;">Satisfying our <strong>Elite Customers</strong> is our top priority amongst others.Please book your elite spot in advance to enjoy a top notch service from us.</p>
        <form action="book.php">
            <button class="submit">BOOK NOW</button>
        </form>

    </div>

    <div class="">
        <?php if (isset($_SESSION['booking-success'])) : ?>
            <div class="alert-message success">
                <p>
                    <?= $_SESSION['booking-success'];
                    unset($_SESSION['booking-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>
    </div>

    <?php if (isset($_SESSION['success'])) : ?>
        <form method="post" action="generate_pdf.php">
            <div class="container">
                <?= $_SESSION['success'];
                ?>
                <input type="hidden" name="table_content" value="<?= urlencode($_SESSION['success']); ?>">
                <button class="submit" id="btn" type="submit" name="submit">Download as PDF</button>
            </div>
        </form>
    <?php endif; ?>

</body>

</html>