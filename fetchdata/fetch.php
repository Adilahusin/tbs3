<?php
require_once "../class/configure/config.php";

try {
    // Fetch data from admin table
    $admin = "SELECT * FROM admin";
    $stmt_admin = $pdo->query($admin);
    $data_admin = $stmt_admin->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['admin_data'] = $data_admin;

    // Fetch data from user table
    $user = "SELECT * FROM user";
    $stmt_user = $pdo->query($user);
    $data_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['user_data'] = $data_user;

    // Fetch data from room table
    $room = "SELECT * FROM room";
    $stmt_room = $pdo->query($room);
    $data_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['room_data'] = $data_room;

    // Fetch data from item table
    $item = "SELECT * FROM item";
    $stmt_item = $pdo->query($item);
    $data_item = $stmt_item->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['item_data'] = $data_item;


    // Close the database connection
    $pdo = null;
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}
?>
