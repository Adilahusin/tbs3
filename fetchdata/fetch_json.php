<?php

require_once "../class/configure/config.php";

try {
    // Retrieve item data with i_brand
    $stmtItems = $pdo->query("SELECT id, i_type, i_brand FROM item WHERE i_status = 1 ORDER BY i_type");
    // $stmtItems = $pdo->query("SELECT i.id, i.i_type, i.i_brand, IS.quantity 
    //                             FROM item AS i 
    //                             INNER JOIN item_stock AS IS ON i.id = IS.item_id 
    //                             WHERE i.i_status = 1 AND IS.item_stock > 0 
    //                             ORDER BY i.i_type");
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



