<?php
include '../class/configure/config.php';

// print_r($_POST); // to check passing data from reservation.js

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemTypeId = $_POST['itemType'];
    $roomNameId = $_POST['roomName'];
    $reserveDate = $_POST['reserveDate'];
    $reserveTime = $_POST['reserveTime'];
    $timeLimit = $_POST['timeLimit'];
    $userId = $_POST['user_id'];

    $code = date('mdY').''.$userId;

    try {
        $pdo->beginTransaction();

        // Check if the reservation date and time already exist in the database
        $stmtCheckReservation = $pdo->prepare("SELECT COUNT(*) AS count FROM reservations WHERE reserve_date = :reserveDate AND reserve_time = :reserveTime");
        $stmtCheckReservation->bindParam(':reserveDate', $reserveDate);
        $stmtCheckReservation->bindParam(':reserveTime', $reserveTime);
        $stmtCheckReservation->execute();
        $reservationCount = $stmtCheckReservation->fetch(PDO::FETCH_ASSOC)['count'];

        if ($reservationCount > 0) {
            // If the reservation already exists for the date and time, rollback and show an error
            $pdo->rollBack();
            $result = "Reservation failed: This date and time are already reserved. Please try again.";
        } else {
            // Fetch item data based on item id
            $stmtItemType = $pdo->prepare("SELECT i_type, i_brand FROM item WHERE id = :itemTypeId");
            $stmtItemType->bindParam(':itemTypeId', $itemTypeId);
            $stmtItemType->execute();
            $itemData = $stmtItemType->fetch(PDO::FETCH_ASSOC);

            // Fetch room data based on room id
            $stmtRoomName = $pdo->prepare("SELECT room_name FROM room WHERE id = :roomNameId");
            $stmtRoomName->bindParam(':roomNameId', $roomNameId);
            $stmtRoomName->execute();
            $roomData = $stmtRoomName->fetch(PDO::FETCH_ASSOC);

            // Check if reservation date, time, and time limit are not NULL or empty
            if (!empty($reserveDate) && !empty($reserveTime) && !empty($timeLimit)) {
                
                // Insert reservation with actual data including user ID
                $stmtReservation = $pdo->prepare("INSERT INTO reservations (i_type, room_name, reserve_date, reserve_time, time_limit, user_id, reservation_code) 
                VALUES (:itemType, :roomName, :reserveDate, :reserveTime, :timeLimit, :userId, :code)");

                $stmtReservation->bindParam(':itemType', $itemData['i_type']);
                $stmtReservation->bindParam(':roomName', $roomData['room_name']);
                $stmtReservation->bindParam(':reserveDate', $reserveDate);
                $stmtReservation->bindParam(':reserveTime', $reserveTime);
                $stmtReservation->bindParam(':timeLimit', $timeLimit);
                $stmtReservation->bindParam(':userId', $userId);
                $stmtReservation->bindParam(':code', $code);

                // Validate if the time_limit is different from reserve_date and reserve_time
                if ($reserveDate . ' ' . $reserveTime !== $timeLimit) {
                    $stmtReservation->execute();
                    $pdo->commit();
                    $result = "Reservation successfully booked";
                } else {
                    $pdo->rollBack();
                    $result = "Error: Time Limit must be different from Reservation Date and Time.";
                }
            } else {
                $pdo->rollBack();
                $result = "Error: All fields must be filled.";
            }
        }

        // Output the result
        echo $result;
    } catch (PDOException $e) {
        $pdo->rollBack();
        $result = "Error: " . $e->getMessage();
        echo $result;
    }
}

?>
