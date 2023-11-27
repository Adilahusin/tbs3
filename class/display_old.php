<?php
require_once "../class/configure/config.php";

class Display {
    public function pending_reservation() {
        global $pdo;
            
		$sql = $pdo->prepare('SELECT *, 
		(SELECT GROUP_CONCAT(i_type, " - ", i_brand, "<br/>") FROM item WHERE item.i_type = reservations.i_type) AS item_borrow,
		(SELECT room_name FROM room WHERE room.room_name = reservations.room_name) AS room_name
		FROM reservations
		LEFT JOIN user ON user.u_id = reservations.user_id
		WHERE reservations.reserve_status = ? 
		GROUP BY reservations.reservation_code 
		ORDER BY reservations.reserve_date ASC');

            $sql->execute(array(0));
            $fetch = $sql->fetchAll();
            $count = $sql->rowCount();

            echo json_encode($fetch);

            $data = array();

            // if ($count > 0) {
            //     foreach ($fetch as $key => $value) {
            //         $button = "<button class='btn btn-primary btn-accept' data-id='" . $value['reservation_code'] . "'>
            //                     Accept
            //                     <i class='fa fa-chevron-right'></i>
            //                     </button>
            //                     <button class='btn btn-danger btn-cancel' data-id='" . $value['reservation_code'] . "'>
            //                     Cancel
            //                     <i class='fa fa-remove'></i>
            //                     </button>";

            //         $date = date('F d, Y H:i:s A', strtotime($value['reserve_date'] . ' ' . $value['reserve_time']));
            //         $data['data'][] = array($value['user_id'], $value['item_borrow'], $date, ucwords($value['room_name']), $button);                 
            //     }
            //     echo json_encode($data);
            // } else {
            //     $data['data'] = array();
            //     echo json_encode($data);
            // }
    }
}

$display = new Display();

$display->pending_reservation();
?>
