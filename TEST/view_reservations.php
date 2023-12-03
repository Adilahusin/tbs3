<?php
include '../class/configure/config.php';

$stmt = $pdo->query("SELECT * FROM reservation WHERE status = 'pending'");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Display reservations -->
<table>
    <tr>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php foreach($reservations as $reservation): ?>
    <tr>
        <td><?php echo $reservation['date']; ?></td>
        <td>
            <button onclick="acceptReservation(<?php echo $reservation['id']; ?>)">Accept</button>
            <button onclick="cancelReservation(<?php echo $reservation['id']; ?>)">Cancel</button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
function acceptReservation(reservationId) {
    $.ajax({
        type: 'POST',
        url: 'accept_reservation.php',
        data: { reservation_id: reservationId },
        success: function(response) {
            alert(response); // Optional: Display a message after successful acceptance
            // You can add additional actions here like updating UI, refreshing the list, etc.
        },
        error: function(xhr, status, error) {
            console.error(error); // Handle error cases if needed
        }
    });
}

function cancelReservation(reservationId) {
    var remarks = prompt("Enter remarks for cancellation:");

    if (remarks !== null) {
        $.ajax({
            type: 'POST',
            url: 'cancel_reservation.php',
            data: { reservation_id: reservationId, remarks: remarks },
            success: function(response) {
                alert(response); // Optional: Display a message after successful cancellation
                // You can add additional actions here like updating UI, refreshing the list, etc.
            },
            error: function(xhr, status, error) {
                console.error(error); // Handle error cases if needed
            }
        });
    }
}

</script>
