<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../config/header.php';

// fetch the particular customer's info from database using id
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM customerstable WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $customer = mysqli_fetch_assoc($result);
}
?>

<body>
    <div class="container">
        <h1 style="text-align:center;"><?= $customer['fullname'] ?></h1>
        <h1 style="text-align:center;">RESCHEDULE RESERVATION</h1>
        <?php if (isset($_SESSION['edit'])) : ?>
            <div class="alert-message error">
                <p>
                    <?= $_SESSION['edit'];
                    unset($_SESSION['edit']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="edit-logic.php" method="POST">
            <div class="contain">
                <input type="hidden" name="id" value="<?= $customer['id'] ?>">
            </div>
            <div class="contain">
                <label for="booking" class="form-label">Reservation No:</label>
                <input type="text" value="<?= $customer['booking'] ?>" name="booking" id="input-form" class="form-input">
            </div>
            <div class="contain">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" value="<?= $customer['fullname'] ?>" name="fullname" id="input-form" class="form-input" placeholder="Input Your Full Name.">
            </div>
            <div class="contain">
                <label for="reservation" class="form-label">Reservation:</label>
                <input type="date" name="reservetime" id="input-date" class="form-input" onchange="getAvailableTimes()">
            </div>
            <div id="availableTimesContainer" class="contain" style="display: none;">
                <label for="time" class="form-label">Available Time:</label>
                <div id="availableTimes" name="availabletimes" class="form-input" style="display: grid; grid-template-columns: repeat(3, 1fr);"></div>
            </div>
            <div class="contain">
                <label for="reservation-type" class="form-label">Reservation Type:</label>
                <select name="reservetype" class="form-input" id="select-form" onchange="showSpecifyContainer()">
                    <option value="">Please Select</option>
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
            <button class="submit" name="submit">UPDATE</button>
        </form>
    </div>


    <script src="../script.js"></script>
</body>

</html>