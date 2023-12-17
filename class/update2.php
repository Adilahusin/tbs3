<?php
require_once "./configure/config.php";

class update2 {

    // public function updateRoom($roomId, $roomName) {
    //     global $pdo;

    //     try {
    //         $updateRoom = "UPDATE room SET room_name = :room_name WHERE id = :id";
    //         $stmt = $pdo->prepare($updateRoom);
    //         $stmt->bindParam(':id', $roomId);
    //         $stmt->bindParam(':room_name', $roomName);
    //         $stmt->execute();
    //         return true; // Update successful
    //     } catch(PDOException $e) {
    //         if ($e->errorInfo[1] == 1062) { //indicates a duplicate entry
    //             echo '<script>alert("Room already exists"); window.history.back();</script>';
    //         } else {
    //             echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    //         }
    //         return false; // Update failed
    //     }
    // }

    public function updateItemInfo($itemId, $type, $brand, $modelNo, $pbNo, $vendor, $warranty, $datePurchase, $serialNo) {
        global $pdo;

        try {
            $updateItem = "UPDATE item 
                            SET i_type = :type, 
                                i_brand = :brand, 
                                i_modelNo = :modelNo, 
                                i_PBno = :pbNo, 
                                i_vendor = :vendor, 
                                i_warranty = :warranty, 
                                i_datepurchase = :datePurchase, 
                                i_serialno = :serialNo 
                            WHERE id = :itemId";
            $stmt = $pdo->prepare($updateItem);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':modelNo', $modelNo);
            $stmt->bindParam(':pbNo', $pbNo);
            $stmt->bindParam(':vendor', $vendor);
            $stmt->bindParam(':warranty', $warranty);
            $stmt->bindParam(':datePurchase', $datePurchase);
            $stmt->bindParam(':serialNo', $serialNo);
            $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $stmt->execute();
            return true; // Update successful

        } catch(PDOException $e) {
            if ($e->errorInfo[1] == 1062) { //indicates a duplicate entry
                echo '<script>alert("Item information already exists"); window.history.back();</script>';
            } else {
                echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            }
            return false; // Update failed
        }
    }

    public function updateAdmin($adminId, $name, $username, $adminType) {
        global $pdo; 
    
        try {
            // Check for existing admin with the same name or username
            $checkExistingAdmin = "SELECT COUNT(*) FROM admin WHERE (a_name = :name OR a_username = :username) AND id != :adminId";
            $stmtCheck = $pdo->prepare($checkExistingAdmin);
            $stmtCheck->bindParam(':name', $name, PDO::PARAM_STR);
            $stmtCheck->bindParam(':username', $username, PDO::PARAM_STR);
            $stmtCheck->bindParam(':adminId', $adminId, PDO::PARAM_INT);
            $stmtCheck->execute();

            $rowCount = $stmtCheck->fetchColumn();

            if ($rowCount > 0) {
                // Alert if the name or username already exists for another admin
                echo '<script>alert("Admin name or username already exists."); window.history.back();</script>';
                return false; // Update failed
            }
            
            $updateAdmin = "UPDATE admin SET a_name = :name, a_username = :username, a_type = :adminType WHERE id = :adminId";
            $stmt = $pdo->prepare($updateAdmin);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':adminType', $adminType, PDO::PARAM_INT);
            $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT); 
            $stmt->execute();   
            return true;
    
        } catch(PDOException $e) {
            if ($e->errorInfo[1] == 1062) { //indicates a duplicate entry
                echo '<script>alert("Admin information already exists"); window.history.back();</script>';
            } else {
                echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            }
            return false; // Update failed
        }
    }

    public function updateRoom($roomId, $newRoomName, $newRoomStatus) {
        global $pdo;

        try {
            // Check if the new room name already exists for other rooms
            $checkRoomExists = "SELECT COUNT(*) AS count FROM room WHERE room_name = :newRoomName AND id != :roomId";
            $stmtCheck = $pdo->prepare($checkRoomExists);
            $stmtCheck->bindParam(':newRoomName', $newRoomName, PDO::PARAM_STR);
            $stmtCheck->bindParam(':roomId', $roomId, PDO::PARAM_INT);
            $stmtCheck->execute();
            $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                echo '<script>alert("Room name already exists"); window.history.back();</script>';
                return false; // Room update failed - Name already exists
            }

            // Get current date and time
            $currentDateTime = date("Y-m-d H:i:s");

            // Query to update the room details
            $updateQuery = "UPDATE room SET room_name = :roomName, room_status = :roomStatus, room_date_added = :currentDateTime WHERE id = :roomId";

            // Prepare and execute the update query
            $stmt = $pdo->prepare($updateQuery);
            $stmt->bindParam(':roomName', $newRoomName, PDO::PARAM_STR);
            $stmt->bindParam(':roomStatus', $newRoomStatus, PDO::PARAM_STR);
            $stmt->bindParam(':currentDateTime', $currentDateTime, PDO::PARAM_STR);
            $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
            $stmt->execute();

            return true; // Room update successful
        } catch(PDOException $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            return false; // Room update failed - Error occurred
        }
    }
    

    
    
    
    



}




$update2_function = new update2();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //update room
    // if (isset($_POST['id']) && isset($_POST['name'])) {
    //     $roomId = $_POST['id'];
    //     $roomName = $_POST['name'];
    //     $roomUpdateSuccess = $update2_function->updateRoom($roomId, $roomName);
    //     if ($roomUpdateSuccess) {
    //         echo '<script>alert("Update successful"); window.location.href="../admin/a_room.php";</script>';
    //         exit();
    //     }
    // }

    //update item info
    if (isset($_POST['item_id'])) {
        $itemId = $_POST['item_id'];
        $type = $_POST['i_type'];
        $brand = $_POST['i_brand'];
        $modelNo = $_POST['i_modelNo'];
        $pbNo = $_POST['i_PBno'];
        $vendor = $_POST['i_vendor'];
        $warranty = $_POST['i_warranty'];
        $datePurchase = $_POST['i_datepurchase'];
        $serialNo = $_POST['i_serialno'];

        $itemUpdateSuccess = $update2_function->updateItemInfo($itemId, $type, $brand, $modelNo, $pbNo, $vendor, $warranty, $datePurchase, $serialNo);

        if ($itemUpdateSuccess) {
            echo '<script>alert("Item information updated successfully"); window.location.href="../admin/a_items.php";</script>';
            echo '<script>window.history.go(-1);</script>'; // Redirect to previous page after OK is clicked
            exit();
        }     
    }

    //update admin info
    if (isset($_POST['admin_id'])) {
        $adminId = $_POST['admin_id'];
        $name = $_POST['a_name'];
        $username = $_POST['a_username'];
        $adminType = $_POST['a_type'];
        $status = $_POST['a_status'];

        $adminUpdateSuccess = $update2_function->updateAdmin($adminId, $name, $username, $adminType, $status, $vendor, $warranty, $datePurchase, $serialNo);

        if ($adminUpdateSuccess) {
            echo '<script>alert("Admin information updated successfully"); window.location.href="../admin/a_admin.php";</script>';
            exit();
        }
    }

    //update room info
    if (isset($_POST['room_id'])) {
        $roomId = $_POST['room_id'];
        $roomName = $_POST['room_name'];
        $roomStatus = $_POST['room_status'];

        $roomUpdateSuccess = $update2_function->updateRoom($roomId, $roomName, $roomStatus);

        if ($roomUpdateSuccess) {
            echo '<script>alert("Room information updated successfully"); window.location.href="../admin/a_room.php";</script>';
            exit();
        }
    }


}
?>
