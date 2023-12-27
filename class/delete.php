<?php

// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$dbname = "tbs3";

$dsn = "mysql:host=$server;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['action']) && $_GET['action'] === "delete" && isset($_GET['entity'])) {

    $entity = $_GET['entity'];

    // delete admin
    if ($entity === "admin" && isset($_GET['id'])) {
        try {
            $adminId = $_GET['id'];
    
            // SQL query to delete admin record based on ID
            $deleteAdmin = "DELETE FROM admin WHERE id = :adminId";
    
            // Prepare the statement
            $stmt = $pdo->prepare($deleteAdmin);
            $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
    
            // Execute the deletion query
            if ($stmt->execute()) {
                echo "<script>alert('Deletion successful.'); window.location.href = '../admin/a_admin.php';</script>";
            } else {
                echo "<script>alert('Deletion failed. Please try again.'); window.location.href = '../admin/a_admin.php';</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = '../admin/a_admin.php';</script>";
        }    

    // delete room
    } elseif ($entity === "room" && isset($_GET['id'])) {
        try {
            $roomId = $_GET['id'];
    
            // SQL query to delete room record based on ID
            $deleteRoom = "DELETE FROM room WHERE id = :roomId";
    
            // Prepare the statement
            $stmt = $pdo->prepare($deleteRoom);
            $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
    
            // Execute the deletion query
            if ($stmt->execute()) {
                echo "<script>alert('Deletion successful.'); window.location.href = '../admin/a_room.php';</script>";
            } else {
                echo "<script>alert('Deletion failed. Please try again.'); window.location.href = '../admin/a_room.php';</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = '../admin/a_room.php';</script>";
        }
        
        // delete item
        } elseif ($entity === "item" && isset($_GET['id'])) {
            try {
                $itemId = $_GET['id'];
        
                // SQL query to delete item record based on ID
                $deleteItem = "DELETE FROM item WHERE id = :itemId";
        
                // Prepare the statement
                $stmt = $pdo->prepare($deleteItem);
                $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        
                // Execute the deletion query
                if ($stmt->execute()) {
                    echo "<script>alert('Deletion successful.'); window.location.href = '../admin/a_items.php';</script>";
                } else {
                    echo "<script>alert('Deletion failed. Please try again.'); window.location.href = '../admin/a_items.php';</script>";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = '../admin/a_items.php';</script>";
            }    

        // delete user
        } elseif ($entity === "user" && isset($_GET['id'])) {
            try {
                // User deletion
                $userId = $_GET['id'];

                // SQL query to delete user record based on ID
                $deleteUser = "DELETE FROM user WHERE id = :userId";

                // Prepare the statement
                $stmt = $pdo->prepare($deleteUser);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

                // Execute the deletion query
                if ($stmt->execute()) {
                    echo "<script>alert('Deletion successful.'); window.location.href = '../admin/a_userlist.php';</script>";
                } else {
                    echo "<script>alert('Deletion failed. Please try again.'); window.location.href = '../admin/a_userlist.php';</script>";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = document.referrer;</script>";
            }
        }

}

?>