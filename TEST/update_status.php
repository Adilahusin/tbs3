<?php
include '../class/configure/config.php';

if(isset($_POST['reservation_id']) && isset($_POST['status'])) {
    $reservationId = $_POST['reservation_id'];
    $status = $_POST['status'];

    try {
        if($status == 'accepted') {
            $stmt = $pdo->prepare("UPDATE reservation SET status = 'accepted' WHERE id = :id");
        } elseif($status == 'rejected') {
            $remarks = $_POST['remarks'];
            $stmt = $pdo->prepare("UPDATE reservation SET status = 'rejected', remarks = :remarks WHERE id = :id");
            $stmt->bindParam(':remarks', $remarks);
        }

        $stmt->bindParam(':id', $reservationId);
        $stmt->execute();
        echo "Status updated successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
