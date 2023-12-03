<?php
include '../class/configure/config.php';

if(isset($_POST['date'])) {
    $date = $_POST['date'];

    try {
        $stmt = $pdo->prepare("INSERT INTO reservation (date, status) VALUES (:date, 'pending')");
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        echo "Reservation successful!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
