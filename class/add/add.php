<?php
require_once "../configure/config.php";

// Initialize the notification variable
$notification = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST["a_name"];
    $username = $_POST["a_username"];
    $password = $_POST["a_password"];
    $adminType = ($_POST["a_type"] === "Admin") ? 1 : 2;

    // Debugging for checking 1=admin 2=staff
    var_dump($_POST["a_type"]);
    $adminType = $_POST["a_type"];
    var_dump($adminType);  // Check the value of $adminType


    // Insert data into the database
    $sql = $pdo->prepare('SELECT * FROM admin WHERE a_name = ? AND a_username = ?');
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
