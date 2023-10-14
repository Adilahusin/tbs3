<!-- Server-side php -->

<?php

	require_once "./configure/config.php";

	class display
	{
        /* Display admin list */

        public function display_admin()
		{
			global $pdo; 
			$sql = $pdo->prepare("SELECT * FROM admin");
			$sql->execute();
			$count = $sql->rowCount();
			$fetch = $sql->fetchAll();
			if($count > 0){
				foreach ($fetch as $key => $value) {
					$status = ($value['status'] == 1) ? '<a href="javascript:;" class="deactivate-user" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-user" ><i class="fa fa-remove"></i> activate</a>' ;
					$button = 	'<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="javascript:;" class="edit-user" ><i class="fa fa-edit"></i> Edit</a></li>
										<li>'.$status.'</li>
										<li><a href="javascript:;" class="edit-upass" ><i class="fa fa-lock"></i> Change Password</a></li>
									</ul>
								</div>';
					$type = ($value['type'] == 1) ? 'Administrator' : 'Staff Assistant';
					$data['data'][] = array($value['a_name'],$type,$value['a_username'],$button,$value['id'],$value['a_password']);
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

		// case 'display_room';
		// $display->display_room();
		// break;

		// case 'display_member';
		// $display->display_member();
		// break;

		case 'display_admin';
		$display->display_admin();
		break;
    
    }

?>