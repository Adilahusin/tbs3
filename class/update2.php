<?php
require_once "./configure/config.php";

class update2 {

    public function updateRoom($roomId, $roomName) {
        global $pdo;

        try {
            $updateRoom = "UPDATE room SET room_name = :room_name WHERE id = :id";
            $stmt = $pdo->prepare($updateRoom);
            $stmt->bindParam(':id', $roomId);
            $stmt->bindParam(':room_name', $roomName);
            $stmt->execute();
            return true; // Update successful
        } catch(PDOException $e) {
            if ($e->errorInfo[1] == 1062) { //indicates a duplicate entry
                echo '<script>alert("Room already exists"); window.history.back();</script>';
            } else {
                echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            }
            return false; // Update failed
        }
    }

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
}




$update2_function = new update2();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //update room
    if (isset($_POST['id']) && isset($_POST['name'])) {
        $roomId = $_POST['id'];
        $roomName = $_POST['name'];
        $roomUpdateSuccess = $update2_function->updateRoom($roomId, $roomName);

        if ($roomUpdateSuccess) {
            echo '<script>alert("Update successful"); window.location.href="../admin/a_room.php";</script>';
            exit();
        }
    }

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
            exit();
        }
    }
}
?>
