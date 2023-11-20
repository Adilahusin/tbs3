<?php

	require_once "../class/configure/config.php";

	class display
	{
        public function table_reservation_stat()
		{
			global $pdo;

			session_start();
			$session = $_SESSION['user_id'];
			$sql = $pdo->prepare('	SELECT *,reservation.status as stat, GROUP_CONCAT(item.i_deviceID, " - " ,item.i_category,  "<br/>") item_borrow FROM reservation
								 	LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
								 	LEFT JOIN item ON item.id = item_stock.item_id
								 	LEFT JOIN member ON member.id = reservation.member_id
								 	LEFT JOIN room ON room.id = reservation.assign_room
								 	LEFT JOIN reservation_status ON reservation_status.reservation_code = reservation.reservation_code
								 	WHERE reservation.member_id = ? GROUP BY reservation.reservation_code');
			$sql->execute(array($session));
			$fetch = $sql->fetchAll();
			$count = $sql->rowCount();
			if($count > 0){
				foreach ($fetch as $key => $value) {

					if($value['stat'] == 0){
						$status = 'Pending';
					}else if($value['stat'] == 1){
						$status = 'Accepted';
					}else if($value['stat'] == 2){
						$status = 'Cancelled';
					}else {
						$status = 'Borrowed';
					}
				
				$date = date('F d,Y H:i:s A', strtotime($value['reserve_date'].' '.$value['reservation_time']));
					$data['data'][] = array($date,$value['item_borrow'],ucwords($value['rm_name']),$value['remark'],$status);
				}
				echo json_encode($data);
			}else{
				$data['data'] = array();
				echo json_encode($data);
			}
		}

    }

	$display = new display();

	$key = trim($_POST['key']);

	switch ($key) {

		case 'table_reservation_stat';
		$display->table_reservation_stat();
		break;
	}


?>