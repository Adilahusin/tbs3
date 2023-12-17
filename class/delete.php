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

if (isset($_GET['action']) && $_GET['action'] === "delete"){

    // delete admin
    if (isset($_GET['id'])) {
        try {
            $adminId = $_GET['id'];
    
            // SQL query to delete admin record based on ID
            $deleteAdminQuery = "DELETE FROM admin WHERE id = :adminId";
    
            // Prepare the statement
            $stmt = $pdo->prepare($deleteAdminQuery);
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
    } elseif (isset($_GET['room_name'])) {
        try {
            $room_name = $_GET['room_name'];
    
            // DELETE SQL statement and execute it
            $deleteRoom = $pdo->prepare("DELETE FROM room WHERE room_name = ?");
            $deleteRoom->execute([$room_name]);
    
            // Check if any row was affected
            if ($deleteRoom->rowCount() > 0) {
                // Successful deletion
                echo "<script>alert('Delete successful. $room_name has been deleted.'); window.location.href = document.referrer;</script>";
            } else {
                // Deletion was unsuccessful
                echo "<script>alert('Deletion was unsuccessful for $room_name. Please try again'); window.location.href = document.referrer;</script>";
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = document.referrer;</script>";
        }

    // delete item
    } elseif (isset($_GET['i_type'])) {
        try {
            $item_type = $_GET['i_type'];
            //print_r ($item_type);
    
            // DELETE SQL statement and execute it
            $deleteItem = $pdo->prepare("DELETE FROM item WHERE i_type = ?");
            $deleteItem->execute([$item_type]);
            //print_r ("123");
    
            // Check if any row was affected
            if ($deleteItem->rowCount() > 0) {
                // Successful deletion
                echo "<script>alert('Delete successful. $item_type has been deleted.'); window.location.href = document.referrer;</script>";
            } else {
                // Deletion was unsuccessful
                echo "<script>alert('Deletion was unsuccessful for $item_type. Please try again'); window.location.href = document.referrer;</script>";
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = document.referrer;</script>";
        }
    
    // delete user
    } elseif (isset($_GET['u_id'])) {
        try {
            $user_id = $_GET['u_id'];
            $user_name = $_GET['u_name'];
    
            $deleteUser = $pdo->prepare("DELETE FROM user WHERE u_id = ?");
            $deleteUser->execute([$user_id]);
    
            // Check if any row was affected
            if ($deleteUser->rowCount() > 0) {
                // Successful deletion
                echo "<script>alert('Delete successful. $user_id $user_name has been deleted.'); 
                window.location.href = document.referrer;
                </script>";

            } else {
                // Deletion was unsuccessful
                echo "<script>alert('Deletion was unsuccessful for $user_id $user_name. Please try again'); 
                window.location.href = document.referrer;
                </script>";
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "<script>alert('Error: " . $e->getMessage() . "'); 
            window.location.href = document.referrer;
            </script>";
        }
    }
}

?>