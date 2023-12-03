<?php
require_once "./configure/config.php";

class add {

    public function addAdmin($name, $username, $password, $adminType) {

        global $pdo; 

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = $pdo->prepare('SELECT * FROM admin WHERE a_name = ? OR a_username = ?');
        $sql->execute(array($name, $username));
        $sql_count = $sql->rowCount();

        if ($sql_count <= 0) {
            $insert = $pdo->prepare('INSERT INTO admin (a_name, a_username, a_password, a_type, a_status) VALUES (?, ?, ?, ?, 1)');
            $insert->execute(array($name, $username, $hashed_password, $adminType));
            $insert_count = $insert->rowCount();

            if ($insert_count > 0) {
                return "Data added successfully";
            } else {
                return "Data cannot be added";
            }
        } else {
            return "Data already exists";
        }
    }

    public function addRoom($roomName) {

        global $pdo; 

        $sql = $pdo->prepare('SELECT * FROM room WHERE room_name = ?');
        $sql->execute(array($roomName));
        $sql_count = $sql->rowCount();

        if ($sql_count <= 0) {
            $insert = $pdo->prepare('INSERT INTO room (room_name, room_status) VALUES (?, 1)');
            $insert->execute(array($roomName));
            $insert_count = $insert->rowCount();

            if ($insert_count > 0) {
                return "Room added successfully";
            } else {
                return "Room cannot be added";
            }
        } else {
            return "This room already exists";
        }
    }

    public function addItem() {
        global $pdo;

            $type = $_POST['i_type'];
			$brand = $_POST['i_brand'];
			$modelNo = $_POST['i_modelNo'];
			$quantity = $_POST['i_quantity'];
			$pbNo = $_POST['i_PBno'];
			$vendor = $_POST['i_vendor'];
			$warranty = $_POST['i_warranty'];
			$datepurchase = $_POST['i_datepurchase'];
			$serialNo = $_POST['i_serialno'];
            $pic = $_POST['i_PIC'];
            $itemStock = $_POST['i_quantity'];
            $itemStatus = $_POST['item_status'];
    
            $sql = $pdo->prepare('SELECT * FROM item WHERE i_type = ? AND i_brand = ? AND i_modelNo = ?');
            $sql->execute(array($type, $brand, $modelNo));
            $sql_count = $sql->rowCount();
        
            if ($sql_count <= 0) {
                $insert = $pdo->prepare('INSERT INTO item (i_type, i_brand, i_modelNo, i_quantity, i_PBno, i_vendor, i_warranty, i_datepurchase, i_serialno, i_PIC, i_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)');
                $insert->execute(array($type, $brand, $modelNo, $quantity, $pbNo, $vendor, $warranty, $datepurchase, $serialNo, $pic));
                $insert_count = $insert->rowCount();
        
                if ($insert_count > 0) {
                    // Retrieve the last inserted ID
                    $itemID = $pdo->lastInsertId();
        
                    $stock = $pdo->prepare('INSERT INTO item_stock (item_id, item_stock, item_status)
                    VALUES (?, ?, ?)');
                    $stock->execute(array($itemID, $itemStock, $itemStatus));
        
                    if ($stock->rowCount() > 0) {
                        return "Item added successfully";
                    } else {
                        return "Item added but stock information insertion failed";
                    }
                } else {
                    return "Item cannot be added";
                }
            } else {
                return "This Item already exists";
            }
    }
    

    public function addUser($userid, $name, $contactNo, $userType, $gender, $password) {

        global $pdo; 

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = $pdo->prepare('SELECT * FROM user WHERE u_id = ? OR u_name = ?');
        $sql->execute(array($userid, $name));
        $sql_count = $sql->rowCount();

        if ($sql_count <= 0) {
            $insert = $pdo->prepare('INSERT INTO user (u_id, u_name, u_contact, u_type, u_gender, u_password, u_status) VALUES (?, ?, ?, ?, ?, ?, 1)');
            $insert->execute(array($userid, $name, $contactNo, $userType, $gender, $hashed_password));
            $insert_count = $insert->rowCount();

            if ($insert_count > 0) {
                return "User added successfully";
            } else {
                return "User cannot be added";
            }
        } else {
            return "This User already exists";
        }
    }

    public function registerUser($userid, $name, $contactNo, $userType, $gender, $user_password) {

        global $pdo; 

        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

        $sql = $pdo->prepare('SELECT * FROM user WHERE u_id = ? OR u_name = ?');
        $sql->execute(array($userid, $name));
        $sql_count = $sql->rowCount();

        if ($sql_count <= 0) {
            $insert = $pdo->prepare('INSERT INTO user (u_id, u_name, u_contact, u_type, u_gender, u_password, u_status) VALUES (?, ?, ?, ?, ?, ?, 1)');
            $insert->execute(array($userid, $name, $contactNo, $userType, $gender, $hashed_password));
            $insert_count = $insert->rowCount();

            if ($insert_count > 0) {
                return "Your account successfully created";
            } else {
                return "Your account cannot be created. Please try again.";
            }
        } else {
            return "Your account already exists";
        }
    }




    public function displayNotification($notification) {
        echo '<script>alert("' . $notification . '");
        window.history.back();
        </script>';
    }

}

$add_function = new add();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_admin"])) {
        $notification = $add_function->addAdmin($_POST["a_name"], $_POST["a_username"], $_POST["a_password"], $_POST["a_type"]);
    } elseif (isset($_POST["add_room"])) {
        $notification = $add_function->addRoom($_POST["room_name"]);
    } elseif (isset($_POST["add_item"])) {
        $notification = $add_function->addItem($_POST["i_type"], $_POST["i_brand"], $_POST["i_modelNo"], $_POST["i_quantity"], $_POST["i_PBno"], 
        $_POST["i_vendor"], $_POST["i_warranty"], $_POST["i_datepurchase"], $_POST["i_serialno"], $_POST["i_PIC"]);
    } elseif (isset($_POST["add_user"])) {
        $notification = $add_function->addUser($_POST["u_id"], $_POST["u_name"], $_POST["u_contact"], $_POST["u_type"], $_POST["u_gender"], 
        $_POST["u_password"]);
    } elseif (isset($_POST["register_user"])) {
        $notification = $add_function->registerUser($_POST["u_id"], $_POST["u_name"], $_POST["u_contact"], $_POST["u_type"], 
        $_POST["u_gender"], $_POST["u_password"]);
    } 

    // Display the notification
    $add_function->displayNotification($notification);

    // Close the database pdoection
    // $add_function->closepdoection();
}
?>