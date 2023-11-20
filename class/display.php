<?php

	require_once "../class/configure/config.php";

	class display
	{
		
		public function pending_reservation()
		{
			global $pdo; 
			$sql = $pdo->prepare('	SELECT *, GROUP_CONCAT(item.i_deviceID, " - " ,item.i_category,  "<br/>") item_borrow FROM reservation
								 	LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
								 	LEFT JOIN item ON item.id = item_stock.item_id
								 	LEFT JOIN member ON member.id = reservation.member_id
								 	LEFT JOIN room ON room.id = reservation.assign_room
								 	WHERE reservation.status = ? GROUP BY reservation.reservation_code ORDER BY reservation.reserve_date ASC');
			$sql->execute(array(0));
			$fetch = $sql->fetchAll();
			$count = $sql->rowCount();
			if($count > 0){
				foreach ($fetch as $key => $value) {
				$button = "<button class='btn btn-primary btn-accept' data-id='".$value['reservation_code']."'>
							Accept
							<i class='fa fa-chevron-right'></i>
							</button>
							<button class='btn btn-danger btn-cancel' data-id='".$value['reservation_code']."'>
							Cancel
							<i class='fa fa-remove'></i>
							</button>";
				$date = date('F d,Y H:i:s A', strtotime($value['reserve_date'].' '.$value['reservation_time']));
					$data['data'][] = array($value['m_fname'].' '.$value['m_lname'],$value['item_borrow'],$date,ucwords($value['rm_name']),$button);
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

		case 'pending_reservation';
		$display->pending_reservation();
		break;		
	}

?>