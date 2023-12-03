<!-- HTML form for user to reserve an item -->
<form id="reservationForm">
    <input type="date" id="reservationDate" required>
    <input type="submit" value="Reserve">
</form>

<div id="reservationStatus"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#reservationForm').submit(function(e){
        e.preventDefault();
        var date = $('#reservationDate').val();
        $.ajax({
            type: 'POST',
            url: 'process_reservation.php',
            data: { date: date },
            success: function(response){
                $('#reservationStatus').html(response);
            }
        });
    });
});
</script>
