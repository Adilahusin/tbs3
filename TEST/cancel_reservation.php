<?php
include '../class/configure/config.php';

if(isset($_POST['reservation_id']) && isset($_POST['remarks'])) {
    $reservationId = $_POST['reservation_id'];
    $remarks = $_POST['remarks'];

    try {
        $stmt = $conn->prepare("UPDATE reservation SET status = 'rejected', remarks = :remarks WHERE id = :id");
        $stmt->bindParam(':remarks', $remarks);
        $stmt->bindParam(':id', $reservationId);
        $stmt->execute();
        echo "Reservation rejected!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
