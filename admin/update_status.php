<?php
include '../class/configure/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the reservation code and new status sent via AJAX
    $requestData = json_decode(file_get_contents('php://input'), true);

    $reservationCode = $requestData['reservationCode'];
    $newStatus = $requestData['status'];

    // Log the script access and received data
    //   error_log('Update status script accessed');
    //   error_log('Received reservation code: ' . $reservationCode);
    //   error_log('Newstatus code: ' . $newStatus);
    // Perform your database update here
    // Example using PDO (assuming you have a PDO connection established)

    try {
        $pdo->beginTransaction();

        // Inspect the value of $newStatus
       // var_dump($newStatus);

        if ($newStatus === 'accepted') {
            $newStatusValue = 1; // Assuming 1 represents the 'accepted' status
        } else {
            // Handle other status scenarios if needed
            // For example, if 'reject' or other status types are expected
            // $newStatusValue = ?; // Set other status values here
        }
        
        // Update the status in the database
        $stmt = $pdo->prepare("UPDATE reservations SET reserve_status = :newStatus WHERE reservation_code = :reservationCode");
        $stmt->bindParam(':newStatus', $newStatusValue);
        $stmt->bindParam(':reservationCode', $reservationCode);
        
        if (!$stmt->execute()) {
            // Handle the execution error here
            // Output an error message or log the error for debugging
            $errorInfo = $stmt->errorInfo();
            // Log or output the error message for debugging purposes
            echo json_encode(["message" => "Execution error: " . $errorInfo[2]]);
        } else {
            // If the update is successful, provide a success response
            http_response_code(200);
            echo json_encode(["message" => "Status updated successfully"]);
        }
        
        // Commit the transaction
        $pdo->commit();

        // Return a success response
        http_response_code(200);
        echo json_encode(["message" => "Status updated successfully"]);
    } catch(PDOException $e) {
        // Roll back the transaction on error
        $pdo->rollBack();

        // Handle database errors
        http_response_code(500);
        echo json_encode(["message" => "Database error: " . $e->getMessage()]);
    }
} else {
    // If the request method is not POST
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);
}
?>