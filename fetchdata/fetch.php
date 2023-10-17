<?php
// Start a session to store data
//session_start();

require_once "../class/configure/config.php"; 

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

    // Execute the query for the other table
    $stmt_user = $pdo->query($user);
    //print_r ("445566");

    // Fetch data as an associative array for the other table
    $data_user = $stmt_user->fetchAll(PDO::FETCH_ASSOC);

    // Store the data in a session variable for the other data
    $_SESSION['user_data'] = $data_user;


    // display data from room table
    $room = "SELECT * FROM room";
    //print_r ("test room");

    // Execute the query
    $stmt_room = $pdo->query($room);
    //print_r ("test room 2");

    // Fetch data as an associative array 
    $data_room = $stmt_room->fetchAll(PDO::FETCH_ASSOC);

    // Store the data in a session variable
    $_SESSION['room_data'] = $data_room;


    // display data from item table
    $item = "SELECT * FROM item";
    //print_r ("1233");

    // Execute the query
    $stmt_item = $pdo->query($item);
    //print_r ("test item 2");

    // Fetch data as an associative array 
    $data_item = $stmt_item->fetchAll(PDO::FETCH_ASSOC);

    // Store the data in a session variable
    $_SESSION['item_data'] = $data_item;


    // Close the database connection
    $pdo = null;
    //print_r ("789");

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}

?>


