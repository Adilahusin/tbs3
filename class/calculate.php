<?php
include '../class/configure/config.php'; 

// Query to sum the quantities of all items
$totalqty = "SELECT SUM(i_quantity) as total_quantity FROM item";

$stmt_totalqty = $pdo->query($totalqty);

if ($stmt_totalqty) { // Check if the item query was successful
    $row = $stmt_totalqty->fetch();
    $totalQuantity = $row['total_quantity'];
} else {
    $totalQuantity = 0;
}

// Query to count the number of users
$countUsers = "SELECT COUNT(*) as total_users FROM user";

$stmt_countUsers = $pdo->query($countUsers);

if ($stmt_countUsers) { // Check if the user count query was successful
    $userRow = $stmt_countUsers->fetch();
    $totalUsers = $userRow['total_users'];
} else {
    $totalUsers = 0;
}

// Query to count the number of admin
$countAdmin = "SELECT COUNT(*) as total_admin FROM admin";

$stmt_countAdmin = $pdo->query($countAdmin);

if ($stmt_countAdmin) { // Check if the user count query was successful
    $adminRow = $stmt_countAdmin->fetch();
    $totalAdmin = $adminRow['total_admin'];
} else {
    $totalAdmin = 0;
}

// Create an array to hold the results
$response = [
    'totalQuantity' => $totalQuantity,
    'totalUsers' => $totalUsers,
    'totalAdmin' => $totalAdmin
];

// Return the results as a JSON response
echo json_encode($response);
?>
