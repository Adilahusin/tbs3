<?php

require_once "../class/configure/config.php";

try {
    // Retrieve item data with i_brand
    $stmtItems = $pdo->query("SELECT id, i_type, i_brand FROM item WHERE i_status = 1 ORDER BY i_type");
    $items = $stmtItems->fetchAll(PDO::FETCH_ASSOC);

    // Retrieve room data
    $stmtRooms = $pdo->query("SELECT id, room_name FROM room WHERE room_status = 1 ORDER BY room_name");
    $rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC);

    $data = [
        'items' => $items,
        'rooms' => $rooms,
    ];

    echo json_encode($data);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


