<?php

	require_once "../class/configure/config.php";
    
    class display {
        
        public function display_item()
        {
            global $pdo;
        
            $stmt = $pdo->prepare('SELECT * FROM item');
            $stmt->execute();
            $itemData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            $data = array('data' => array());
        
            if ($itemData && is_array($itemData)) {
                foreach ($itemData as $row => $value) {
                    $button = '<div class="btn-group">
                                    <a href="a_items_info.php">
                                        <button type="button" class="btn btn-primary btn-block">
                                            More Info
                                        </button>
                                    </a>
                                </div>';

                    $data['data'][] = array(
                        $value['i_type'],
                        $value['i_brand'],
                        $value['i_modelNo'],
                        $value['i_status'],
                        $value['i_quantity'],
                        $button
                    );
                }
                echo json_encode($data);
            } else {
                // No valid data or empty array provided
                // $data['error'] = "Invalid or empty data provided.";
                $data['data'] = array();
				echo json_encode($data);
			}
        }
    }
        
$display = new display();

$row = trim($_POST['key']);

switch ($row) {

    case 'display_item':
    $display->display_item();
    break;

}
?>