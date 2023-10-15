<?php
// Start a session to store data
//session_start();

require_once "../class/configure/config.php"; // Include your database connection script

try {
    // Define the SQL query
    $sql = "SELECT * FROM admin";

    // Execute the query
    $stmt = $pdo->query($sql);

    // Fetch data as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r ("123");

    // Store the data in a session variable
    $_SESSION['admin_data'] = $data;
    //print_r ("456");

    // Close the database connection
    $pdo = null;
    //print_r ("789");

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}

?>


