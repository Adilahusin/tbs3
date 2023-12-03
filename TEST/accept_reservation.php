<?php
include '../class/configure/config.php';

if(isset($_POST['reservation_id'])) {
    $reservationId = $_POST['reservation_id'];

    try {
        $stmt = $conn->prepare("UPDATE reservation SET status = 'accepted' WHERE id = :id");
        $stmt->bindParam(':id', $reservationId);
        $stmt->execute();
        echo "Reservation accepted!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
