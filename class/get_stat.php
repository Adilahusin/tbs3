<?php
require_once "../class/configure/config.php";

// for display reservation_status for users
// session user id clash with other function if merge in one file

class getStat {

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

            $_SESSION['reserve_stat'] = $data_reserve_stat;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
  

// Usage:
$getStat_function = new getStat();

$getStat_function->tblreservation_stat();

?>
