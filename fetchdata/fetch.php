<?php
require_once "../class/configure/config.php";

class display {

    public function fetchAdminData() {

        global $pdo;

        $admin = "SELECT * FROM admin";
        $stmt_admin = $pdo->query($admin);
        $data_admin = $stmt_admin->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['admin_data'] = $data_admin;
    }

    public function fetchUserData() {

        global $pdo;

        $user = "SELECT * FROM user";
        $stmt_user = $pdo->query($user);
        $data_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user_data'] = $data_user;
    }

    public function fetchRoomData() {

        global $pdo;

        $room = "SELECT * FROM room";
        $stmt_room = $pdo->query($room);
        $data_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['room_data'] = $data_room;
    }

    public function fetchItemData() {

        global $pdo;

        $item = "SELECT * FROM item";
        $stmt_item = $pdo->query($item);
        $data_item = $stmt_item->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['item_data'] = $data_item;
    }

    // public function closeConnection() {
    //     // Close the database connection 
    //     $pdo = null;
    // }
}

// Usage:
$display_function = new display();

$display_function->fetchAdminData();
$display_function->fetchUserData();
$display_function->fetchRoomData();
$display_function->fetchItemData();

// close the database connection
//$display_function->closeConnection();
?>
