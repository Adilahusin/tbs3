<?php
require_once "./configure/config.php";
//print_r("123-");

// Initialize the notification variable
$notification = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r("456-");

    if (isset($_POST["add_admin"])) {
        // Code for adding an admin
        $name = $_POST["a_name"];
        $username = $_POST["a_username"];
        $password = $_POST["a_password"];
        $adminType = ($_POST["a_type"] === "Admin") ? 1 : 2;
        //print_r("789-");

        // Debugging for checking 1=admin 2=staff
        var_dump($_POST["a_type"]);
        $adminType = $_POST["a_type"];
        var_dump($adminType);  // Check the value of $adminType
    
    
        // Insert data into the database
        $sql = $pdo->prepare('SELECT * FROM admin WHERE a_name = ? OR a_username = ?');
        $sql->execute(array($name, $username));
        $sql_count = $sql->rowCount();
    
        if ($sql_count <= 0) {
            $insert = $pdo->prepare('INSERT INTO admin (a_name, a_username, a_password, a_type, a_status) VALUES(?, ?, ?, ?, 1)');
            $insert->execute(array($name, $username, $password, $adminType));
            $insert_count = $insert->rowCount();
    
            if ($insert_count > 0) {
                $notification = "Data added successfully";
            } else {
                $notification = "Data cannot be added";
            }
        } else {
            $notification = "Data already exists";
        }

        } elseif (isset($_POST["add_room"])) {
            $roomName = $_POST["room_name"];
        
            // Insert data into the database
            $sql = $pdo->prepare('SELECT * FROM room WHERE room_name = ?');
            $sql->execute(array($roomName));
            $sql_count = $sql->rowCount();
        
            if ($sql_count <= 0) {
                $insert = $pdo->prepare('INSERT INTO room (room_name, room_status) VALUES (?, 1)');
                $insert->execute(array($roomName));
                $insert_count = $insert->rowCount();
        
                if ($insert_count > 0) {
                    $notification = "Room added successfully";
                } else {
                    $notification = "Room cannot be added";
                }
            } else {
                $notification = "This room already exists";
            }

        } elseif (isset($_POST["add_item"])) {
            $type = $_POST["i_type"];
            $brand = $_POST["i_brand"];
            $modelNo = $_POST["i_modelNo"];
            $quantity = $_POST["i_quantity"];
            $pic = $_POST["i_PIC"];
        
            // Insert data into the database
            $sql = $pdo->prepare('SELECT * FROM item WHERE i_type = ? AND i_brand = ? AND i_modelNo = ?');
            $sql->execute(array($type, $brand, $modelNo));
            $sql_count = $sql->rowCount();
        
            if ($sql_count <= 0) {
                $insert = $pdo->prepare('INSERT INTO item (i_type, i_brand, i_modelNo, i_quantity, i_PIC, i_status) VALUES (?, ?, ?, ?, ?, 1)');
                $insert->execute(array($type, $brand, $modelNo, $quantity, $pic));
                $insert_count = $insert->rowCount();
        
                if ($insert_count > 0) {
                    $notification = "Item added successfully";
                } else {
                    $notification = "Item cannot be added";
                }
            } else {
                $notification = "This Item already exists";
            }

        } elseif (isset($_POST["add_user"])) {
            $userid = $_POST["u_id"];
            $name = $_POST["u_name"];
            $contactNo = $_POST["u_contact"];
            $userType = ($_POST["u_type"] === "Staff/Lecturer") ? 1 : 2;
            $gender = ($_POST["u_gender"] === "Male") ? 1 : 2;
            $password = $_POST["u_password"];

            // Debugging for checking dropdown values
            var_dump($_POST["u_type"]);
            $userType = $_POST["u_type"];
            var_dump($userType);

            var_dump($_POST["u_gender"]);
            $gender = $_POST["u_gender"];
            var_dump($gender);
        
            // Insert data into the database
            $sql = $pdo->prepare('SELECT * FROM user WHERE u_id = ? OR u_name = ?');
            $sql->execute(array($userid, $name));
            $sql_count = $sql->rowCount();
        
            if ($sql_count <= 0) {
                $insert = $pdo->prepare('INSERT INTO user (u_id, u_name, u_contact, u_type, u_gender, u_password, u_status) VALUES (?, ?, ?, ?, ?, ?, 1)');
                $insert->execute(array($userid, $name, $contactNo, $userType, $gender, $password));
                $insert_count = $insert->rowCount();
        
                if ($insert_count > 0) {
                    $notification = "User added successfully";
                } else {
                    $notification = "User cannot be added";
                }
            } else {
                $notification = "This User already exists";
            }
        }
    

    // Close the database connection
    $pdo = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <script>
        // JavaScript function to display notifications and redirect
        function displayNotification(notification) {
            alert(notification);
            
            // Redirect to the previous page
            window.history.back();
        }

        // Call the function with the status message
        displayNotification('<?php echo $notification; ?>');
    </script>
</head>
</html>
