<?php
require_once "./configure/config.php";

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

    // Handle form submission
    public function handleFormSubmission() {
        global $pdo;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize the received data
            $addedQuantity = $_POST['added_quantity'] ?? null;
            $itemId = $_POST['item_id'] ?? null;

            // Update quantity in the database
            if ($addedQuantity && $itemId) {
                $this->updateItemQuantity($itemId, $addedQuantity);
            } else {
                echo '<script>alert("Invalid data received or item ID not found."); window.location.href = document.referrer;</script>';
            }
        } else {
            echo '<script>alert("Form not submitted."); window.location.href = document.referrer;</script>';
        }
    }

    // public function updateItemInfo($itemId, $type, $brand, $modelNo, $quantity, $pbNo, $vendor, 
    // $warranty, $datePurchase, $serialNo, $itemStatus) {
    //     global $pdo;
    
    //     try {
    //         $updateInfo = "UPDATE item SET 
    //                     i_type = :type, 
    //                     i_brand = :brand, 
    //                     i_modelNo = :modelNo, 
    //                     i_quantity = :quantity, 
    //                     i_PBno = :pbNo, 
    //                     i_vendor = :vendor, 
    //                     i_warranty = :warranty, 
    //                     i_datepurchase = :datePurchase, 
    //                     i_serialno = :serialNo, 
    //                     i_itemStatus = :itemStatus 
    //                 WHERE id = :itemId";
    
    //         $stmt = $pdo->prepare($updateInfo);
    
    //         $stmt->bindParam(':type', $type);
    //         $stmt->bindParam(':brand', $brand);
    //         $stmt->bindParam(':modelNo', $modelNo);
    //         $stmt->bindParam(':quantity', $quantity);
    //         $stmt->bindParam(':pbNo', $pbNo);
    //         $stmt->bindParam(':vendor', $vendor);
    //         $stmt->bindParam(':warranty', $warranty);
    //         $stmt->bindParam(':datePurchase', $datePurchase);
    //         $stmt->bindParam(':serialNo', $serialNo);
    //         $stmt->bindParam(':itemStatus', $itemStatus);
    //         $stmt->bindParam(':itemId', $itemId);
    
    //         $stmt->execute();
    
    //         $rowCount = $stmt->rowCount();
    //         if ($rowCount > 0) {
    //             echo '<script>alert("Update successful!"); window.location.href = document.referrer;</script>';
    //         } else {
    //             echo '<script>alert("Update failed. Please try again later"); window.location.href = document.referrer;</script>';
    //         }
    //     } catch (PDOException $e) {
    //         echo '<script>alert("Error: ' . $e->getMessage() . '"); window.location.href = document.referrer;</script>';
    //     }
    // }

    // public function handleFormSubmission() {
    //     global $pdo;
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $action = $_POST['action'] ?? null; 
            
    //         switch ($action) {
    //             case 'updateQuantity':
    //                 $addedQuantity = $_POST['added_quantity'] ?? null;
    //                 $itemId = $_POST['item_id'] ?? null;
    //                 if ($addedQuantity && $itemId) {
    //                     $this->updateItemQuantity($itemId, $addedQuantity);
    //                 } else {
    //                     $this->handleInvalidData();
    //                 }
    //                 break;
                    
    //             case 'updateItemInfo':
    //                 $itemId = $_POST['item_id'] ?? null;
    //                 $type = $_POST['i_type'] ?? null;
    //                 $brand = $_POST['i_brand'] ?? null;
    //                 $modelNo = $_POST['i_modelNo'] ?? null;
    //                 $quantity = $_POST['i_quantity'] ?? null;
    //                 $pbNo = $_POST['i_PBno'] ?? null;
    //                 $vendor = $_POST['i_vendor'] ?? null;
    //                 $warranty = $_POST['i_warranty'] ?? null;
    //                 $datePurchase = $_POST['i_datepurchase'] ?? null;
    //                 $serialNo = $_POST['i_serialno'] ?? null;
    //                 $itemStatus = $_POST['i_itemStatus'] ?? null;
                
    //                 if ($itemId && $type && $brand && $modelNo && $quantity && $pbNo && $vendor 
    //                 && $warranty && $datePurchase && $serialNo && $itemStatus) {
                        
    //                     $this->updateItemInfo(
    //                         $itemId, $type, $brand, $modelNo, $quantity, $pbNo, $vendor,
    //                         $warranty, $datePurchase, $serialNo, $itemStatus
    //                     );
    //                 } else {
    //                     // Handle case where required fields are missing
    //                     echo '<script>alert("Invalid data received or some required fields are missing."); window.location.href = document.referrer;</script>';
    //                 }
    //                 break;
                    
    //                 default:
    //                     $this->handleInvalidData();
    //                     break;
    //         }
    //     } else {
    //         echo '<script>alert("Form not submitted."); window.location.href = document.referrer;</script>';
    //     }
    // }
    
    // private function handleInvalidData() {
    //     echo '<script>alert("Invalid data received or action not specified."); window.location.href = document.referrer;</script>';
    // }
    
    
    


}

$update_function = new Update();
$update_function->handleFormSubmission();
?>
