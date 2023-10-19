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

if (isset($_GET['action']) && $_GET['action'] === "delete" && isset($_GET['a_username'])) {
    try {
        $username = $_GET['a_username'];

        // DELETE SQL statement and execute it
        $deleteAdmin = $pdo->prepare("DELETE FROM admin WHERE a_username = ?");
        $deleteAdmin->execute([$username]);

        // Check if any row was affected
        if ($deleteAdmin->rowCount() > 0) {
            // Successful deletion
            echo "<script>alert('Delete successful. Admin with username $username has been deleted.'); window.location.href = document.referrer;</script>";
        } else {
            // Deletion was unsuccessful
            echo "<script>alert('Deletion was unsuccessful for username $username. Please try again'); window.location.href = document.referrer;</script>";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = document.referrer;</script>";
    }
}
?>
