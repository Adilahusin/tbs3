<?php
// Include the configuration file to establish a database connection
include '../class/configure/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
</head>
<body>
    <h2>Book Items and Rooms</h2>
    
    <form id="bookingForm">
    <label for="itemType">Item Type:</label>
    <select id="itemType" name="itemType" required></select>

    <label for="roomName">Room Name:</label>
    <select id="roomName" name="roomName" required></select>

    <label for="reserveDate">Reservation Date:</label>
    <input type="date" id="reserveDate" name="reserveDate" required>

    <label for="reserveTime">Reservation Time:</label>
    <input type="time" id="reserveTime" name="reserveTime" required>

    <label for="timeLimit">Time Limit:</label>
    <input type="datetime-local" id="timeLimit" name="timeLimit" required>

    <button type="button" onclick="book()">Book Reservation</button>
</form>

<div id="result"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>

</body>
</html>

