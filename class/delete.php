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

    if (isset($_GET['a_username'])) {
    try {
        $admin_username = $_GET['a_username'];

        // DELETE SQL statement and execute it
        $deleteAdmin = $pdo->prepare("DELETE FROM admin WHERE a_username = ?");
        $deleteAdmin->execute([$admin_username]);

        // Check if any row was affected
        if ($deleteAdmin->rowCount() > 0) {
            // Successful deletion
            echo "<script>alert('Delete successful. Admin with username $admin_username has been deleted.'); window.location.href = document.referrer;</script>";
        } else {
            // Deletion was unsuccessful
            echo "<script>alert('Deletion was unsuccessful for username $admin_username. Please try again'); window.location.href = document.referrer;</script>";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = document.referrer;</script>";
    }

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
        
    } elseif (isset($_GET['u_id'])) {
        try {
            $user_id = $_GET['u_id'];
            $user_name = $_GET['u_name'];
    
            // DELETE SQL statement and execute it
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