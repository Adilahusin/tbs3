<?php
// Start a session to store data
//session_start();

require_once "./class/configure/config.php"; // Include your database connection script

try {
    // display data from admin table 
    $admin = "SELECT * FROM admin";

    // Execute the query
    $stmt_admin = $pdo->query($admin);

    // Fetch data as an associative array
    $data_admin = $stmt_admin->fetchAll(PDO::FETCH_ASSOC);
    //print_r ("123");

    // Store the data in a session variable
    $_SESSION['admin_data'] = $data_admin;
    //print_r ("456");

    // display data from user table
    $user = "SELECT * FROM user";
    //print_r ("112233");

    // Execute the query
    $stmt_user = $pdo->query($user);
    //print_r ("445566");

    // Fetch data as an associative array 
    $data_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);

    // Store the data in a session variable
    $_SESSION['user_data'] = $data_user;

    
    
    // Close the database connection
    $pdo = null;
    //print_r ("789");

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}

?>


