<?php

include './class/configure/config.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE u_id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "Name: " . $row['u_name'] . "<br>";
    } else {
        echo "No data found";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
