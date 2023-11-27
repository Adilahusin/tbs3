<?php
require_once "../class/configure/config.php";

class display {

    public function adminData() {

        global $pdo;

        $admin = "SELECT * FROM admin";
        $stmt_admin = $pdo->query($admin);
        $data_admin = $stmt_admin->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['admin_data'] = $data_admin;
    }

    public function userData() {

        global $pdo;

        $user = "SELECT * FROM user";
        $stmt_user = $pdo->query($user);
        $data_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user_data'] = $data_user;
    }

    public function roomData() {

        global $pdo;

        $room = "SELECT * FROM room";
        $stmt_room = $pdo->query($room);
        $data_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['room_data'] = $data_room;
    }

    public function itemData() {
        global $pdo;
    
        $item = "SELECT * FROM item";
        $stmt_item = $pdo->query($item);
        $data_item = $stmt_item->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['item_data'] = $data_item;
    
    }

    public function reservationData() {
        global $pdo;
    
        $reservation = "SELECT * FROM reservations
                        INNER JOIN user ON reservations.user_id = user.u_id
                        ORDER BY reserve_date ASC";
    
        $stmt_reservation = $pdo->query($reservation);
        $data_reservation = $stmt_reservation->fetchAll(PDO::FETCH_ASSOC);
    
        // Storing all reservations directly in a session variable for later use
        $_SESSION['pending_reservations'] = $data_reservation;
    }

    public function tblreservation_stat() {
        global $pdo;
    
        // session_start();
        $session = $_SESSION['user_id'];
    
        $reserve_stat = "SELECT * FROM reservations
                        INNER JOIN user ON reservations.user_id = user.u_id
                        INNER JOIN room ON room.room_name = reservations.room_name
                        WHERE reservations.reservation_code LIKE CONCAT('%', :user_id, '%')
                        ORDER BY reservations.reserve_date ASC";

    
        try {
            $stmt = $pdo->prepare($reserve_stat);
            $stmt->bindParam(':user_id', $session);
            $stmt->execute();
    
            $data_reserve_stat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // print_r($data_reserve_stat);

            // Storing filtered reservations in a session variable for later use
            $_SESSION['reserve_stat'] = $data_reserve_stat;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Output the specific error message for debugging
        }
    }
    
    
    
    

}

// Usage:
$display_function = new display();

$display_function->adminData();
$display_function->userData();
$display_function->roomData();
$display_function->itemData();
$display_function->reservationData();
$display_function->tblreservation_stat();
?>
