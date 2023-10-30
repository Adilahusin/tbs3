<?php

require_once "../class/configure/config.php";

try {
    // Fetch data for the "Item" dropdown
    $reserveItem = "SELECT i_modelNo, i_type, i_brand, i_quantity FROM item";
    $stmt_reserveItem = $pdo->query($reserveItem);
    $data_reserveItem = $stmt_reserveItem->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for the "Room" dropdown
    $reserveRoom = "SELECT room_name FROM room";
    $stmt_reserveRoom = $pdo->query($reserveRoom);
    $data_reserveRoom = $stmt_reserveRoom->fetchAll(PDO::FETCH_ASSOC);

    // Combine data for both dropdowns into a single array
    $data = [
        'items' => $data_reserveItem,
        'rooms' => $data_reserveRoom,
    ];

    // Send options as a single JSON response to the frontend
    header('Content-Type: application/json');
    echo json_encode($data);

    // Close the database connection
    $pdo = null;

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}
?>
