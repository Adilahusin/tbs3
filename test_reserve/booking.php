<?php

include '../class/configure/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemTypeId = $_POST['itemType'];
    $roomNameId = $_POST['roomName'];
    $reserveDate = $_POST['reserveDate'];
    $reserveTime = $_POST['reserveTime'];
    $timeLimit = $_POST['timeLimit'];

    try {
        $pdo->beginTransaction();

        // Fetch item type based on item id
        $stmtItemType = $pdo->prepare("SELECT i_type FROM item WHERE id = :itemTypeId");
        $stmtItemType->bindParam(':itemTypeId', $itemTypeId);
        $stmtItemType->execute();
        $itemType = $stmtItemType->fetchColumn();

        // Fetch room name based on room id
        $stmtRoomName = $pdo->prepare("SELECT room_name FROM room WHERE id = :roomNameId");
        $stmtRoomName->bindParam(':roomNameId', $roomNameId);
        $stmtRoomName->execute();
        $roomName = $stmtRoomName->fetchColumn();

        // Insert reservation with actual item type, room name, reserve_date, reserve_time, and time_limit
        $stmtReservation = $pdo->prepare("INSERT INTO reservations (i_type, room_name, reserve_date, reserve_time, time_limit) VALUES (:itemType, :roomName, :reserveDate, :reserveTime, :timeLimit)");
        $stmtReservation->bindParam(':itemType', $itemType);
        $stmtReservation->bindParam(':roomName', $roomName);
        $stmtReservation->bindParam(':reserveDate', $reserveDate);
        $stmtReservation->bindParam(':reserveTime', $reserveTime);
        $stmtReservation->bindParam(':timeLimit', $timeLimit);
        
        // Validate if the time_limit is different from reserve_date and reserve_time
        if ($reserveDate . ' ' . $reserveTime !== $timeLimit) {
            $stmtReservation->execute();
            $pdo->commit();
            $result = "Successfully booked reservation with Item Type: $itemType, Room Name: $roomName, Date and Time: $reserveDate $reserveTime, Time Limit: $timeLimit";
        } else {
            $pdo->rollBack();
            $result = "Error: Time Limit must be different from Reservation Date and Time.";
        }

        echo $result;
    } catch (PDOException $e) {
        $pdo->rollBack();
        $result = "Error: " . $e->getMessage();
        echo $result;
    }
}

?>
