<?php
require_once "./configure/config.php";

class update {
    
    public function updateRoom($roomName, $newRoomName) {

        global $pdo;

        try {
            $sql = "UPDATE room SET room_name = :new_room_name WHERE room_name = :room_name";
        
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':new_room_name', $newRoomName);
            $stmt->bindParam(':room_name', $roomName);
        
            if ($stmt->execute()) {
                $response = array('success' => true, 'message' => 'Room name updated successfully.');
            } else {
                $response = array('success' => false, 'message' => 'Error updating room name: ' . implode(" ", $stmt->errorInfo()));
            }
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
        
        // Convert the response array to JSON
        echo json_encode($response);            
        
    }
}

$update_function = new update($pdo);

// Handle the form submission
if (isset($_POST['update_room'])) {
    $roomName = $_POST['room_name'];
    $newRoomName = $_POST['new_room_name'];

    $response = $update_function->updateRoom($roomName, $newRoomName);

    echo json_encode($response);
}
?>
