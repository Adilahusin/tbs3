<?php
require_once "./configure/config.php";

// will try to merge with update2

class Update {
    
    public function updateItemQuantity($itemId, $addedQuantity) {
        global $pdo;
        try {
            
            $updateQuantity = "UPDATE item SET i_quantity = i_quantity + :addedQuantity WHERE id = :itemId";
            $stmt = $pdo->prepare($updateQuantity);
            $stmt->bindParam(':addedQuantity', $addedQuantity, PDO::PARAM_INT);
            $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $stmt->execute();

            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                echo '<script>alert("Update successful!"); window.location.href = document.referrer;</script>';
            } else {
                echo '<script>alert("Update failed. Please try again later"); window.location.href = document.referrer;</script>';
            }

        } catch (PDOException $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '"); window.location.href = document.referrer;</script>';
        }
    }


}

$update_function = new Update();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize the received data
    $addedQuantity = $_POST['added_quantity'] ?? null;
    $itemId = $_POST['item_id'] ?? null;

    // Update quantity in the database
    if ($addedQuantity && $itemId) {
        $updateFunction = new Update();
        $updateFunction->updateItemQuantity($itemId, $addedQuantity);
    } else {
        echo '<script>alert("Invalid data received or item ID not found."); window.location.href = document.referrer;</script>';
    }
} else {
    echo '<script>alert("Form not submitted."); window.location.href = document.referrer;</script>';
}

?>