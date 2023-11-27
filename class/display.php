<?php
require_once "../class/configure/config.php";

class Display {
    public function pending_reservation() {
        global $pdo;

        $sql = $pdo->prepare('SELECT reservation_code, user_id, i_type, room_name, reserve_date
            FROM reservations');

        $sql->execute();
        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array
        $count = $sql->rowCount();

        $data = array();

        if ($count > 0) {
            foreach ($fetch as $key => $value) {
                $date = date('F d, Y H:i:s A', strtotime($value['reserve_date']));

                $data[] = array(
                    'user_id' => $value['user_id'],
                    'i_type' => $value['i_type'],
                    'reserve_date' => $date,
                    'room_name' => ucwords($value['room_name'])
                );
            }
        }

        echo json_encode($data);
    }
}

$display = new Display();
$display->pending_reservation();
?>
