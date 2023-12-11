<?php
require_once "./configure/config.php";

class custom {

    public function cancelReservation($reservationCode, $cancellationRemarks) {
        global $pdo;

        try {
            $cancel = "INSERT INTO reservation_status (reservation_code, remarks, reserve_status) VALUES (?, ?, 2)";
            $stmt = $pdo->prepare($cancel);
            $stmt->execute([$reservationCode, $cancellationRemarks]);

            if ($stmt->rowCount() > 0) {
                return "Cancellation reservation successfully";
            } else {
                return "Error: Failed to proceed cancellation";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

}

$custom_function = new custom();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationCode = $_POST['cancel_reservation_code'];
    $cancellationRemarks = $_POST['remarks_cancel'];

    // Call the method to cancel reservation
    $result = $custom_function->cancelReservation($reservationCode, $cancellationRemarks);

    if (strpos($result, 'Error') !== false) {
        // If there's an error, echo a message that JavaScript can interpret
        echo 'error';
    } else {
        // If the cancellation was successful, echo a success message
        echo 'success';
    }
    
} 
?>
