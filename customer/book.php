<?php
session_start();

// get back form data incase of error while filing the form
$fullname = $_SESSION['user-data']['fullname'] ?? null;
$email = $_SESSION['user-data']['email'] ?? null;
$guest = $_SESSION['user-data']['guest'] ?? null;
$message = $_SESSION['user-data']['message'] ?? null;

// delete session data
unset($_SESSION['user-data']);
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
        <h1 style="text-align:center;">BOOK YOUR SPOT</h1>
        <?php if (isset($_SESSION['booking'])) : ?>
            <div class="alert-message error">
                <p>
                    <?= $_SESSION['booking'];
                    unset($_SESSION['booking']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="book-logic.php" method="POST">
            <div class="contain">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" name="fullname" value="<?= $fullname ?>" id="input-form" class="form-input" placeholder="Input Your Full Name.">
            </div>
            <div class="contain">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" value="<?= $email ?>" id="input-form" class="form-input" placeholder="Input Your Email Address.">
            </div>
            <div class="contain" id="select-contain">
                <div class="" id="contain-select">
                    <label for="gender" class="form-label">Your Gender:</label>
                    <select name="gender" name="gender" class="form-select" id="input-form">
                        <option value=''>Please Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="" id="contain-select">
                    <label for="title" class="form-label">Your Title:</label>
                    <select name="title" name="title" class="form-select" id="input-form">
                        <option value=''>Please Select</option>
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Master">Master</option>
                        <option value="Mistress">Mistress</option>
                    </select>
                </div>
            </div>
            <div class="contain">
                <label for="number-guest" class="form-label">Number Of Guest:</label>
                <input type="number" name="guest" id="input-form" class="form-input" value="<?= $guest ?>" placeholder="How many guests should we be expecting?.">
            </div>
            <div class="contain">
                <label for="reservation" class="form-label">Reservation Date:</label>
                <input type="date" name="reservetime" id="input-date" class="form-input" onchange="getAvailableTimes()">
            </div>
            <div id="availableTimesContainer" class="contain" style="display: none;">
                <label for="time" class="form-label">Available Time:</label>
                <div id="availableTimes" name="availabletimes" class="form-input" style="display: grid; grid-template-columns: repeat(3, 1fr);"></div>
            </div>
            <div class="contain">
                <label for="reservation-type" class="form-label">Reservation Type:</label>
                <select name="reservetype" class="form-input" id="select-form" onchange="showSpecifyContainer()">
                    <option value=''>Please Select</option>
                    <option value="Dinner">Dinner</option>
                    <option value="VIP/Mezzanine">VIP/Mezzanine</option>
                    <option value="Birthday/Anniversary">Birthday/Anniversary</option>
                    <option value="Nightlife">Nightlife</option>
                    <option value="Private">Private</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Corporate">Corporate</option>
                    <option value="Holiday">Holiday</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="contain" id="specifyContainer" style="display: none;">
                <label for="other" class="form-label">Specify If Other:</label>
                <input type="text" name="specify" class="form-input" placeholder="If You Choose Other, Please Specify." id="otherInput">
            </div>

            <div class="contain">
                <label for="message" class="form-label">Request:</label>
                <textarea name="message" class="form-input" id="input_form" cols="70" rows="5" placeholder="Anything Like Special Request We Should Know Before Your Appointment."><?= $message ?></textarea>
            </div>
            <button class="submit" id="btn" type="submit" name="submit">SUBMIT</button>
        </form>
    </div>


    <script src="../script.js"></script>
</body>

</html>