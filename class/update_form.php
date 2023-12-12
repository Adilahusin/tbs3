<?php
require_once "../class/configure/config.php";


// update form for room update 
// will adjust using modal later

class displayForm {

    public function retrieveRoomDetails($roomName) {
        global $pdo;

        try {
            $stmt = $pdo->prepare("SELECT id, room_name FROM room WHERE room_name = :room_name");
            $stmt->bindParam(':room_name', $roomName);
            $stmt->execute();
            $item = $stmt->fetch();

            return $item;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function displayEditForm($item) {
        ?>
        
        <style>
            body {
                background-color: lightgrey;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
            }

            .white-container {
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            label {
                color: black;
            }

            input[type="text"],
            input[type="password"],
            input[type="submit"] {
                width: 100%;
                margin-bottom: 20px;
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            input[type="submit"] {
                background-color: #7370c9;
                color: white;
                cursor: pointer;
            }
        </style>

        <div class="white-container">
            <h4>Edit Room</h4>
            <form action="../class/update2.php" method="post">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <label for="name">Room Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $item['room_name']; ?>"><br><br>
            <input type="submit" value="Update">
            </form>
        </div>


        <?php
    }

    public function retrieveAndDisplayRoomDetails() {
        if (isset($_GET['room_name'])) {
            $roomName = $_GET['room_name'];
            $item = $this->retrieveRoomDetails($roomName);
    
            if ($item) {
                $this->displayEditForm($item);
            }
        } else {
            echo "Room name parameter missing.";
        }
    }
}

// Usage:
$display_function = new displayForm();
$display_function->retrieveAndDisplayRoomDetails();
?>
