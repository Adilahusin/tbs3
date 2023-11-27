$(document).ready(function() {
    console.log("Starting AJAX request...");

    $.ajax({
        url: "../class/display.php",
        type: "POST",
        data: {
            "key": "pending_reservation"
        },
        success: function(response) {
            var table_pending = $('.table_pending').DataTable({
                columns: [
                    { "data": 0 },
                    { "data": 1 },
                    { "data": 2 },
                    { "data": 3 },
                    { "data": 4 }
                ]
            });
        },
        error: function(xhr, status, error) {
            console.error("AJAX request error:", status, error);
            // Handle the error case here
        },
        complete: function(xhr, status) {
            if (status === 'success') {
                console.log("AJAX request completed successfully.");
                // Any actions to perform after successful completion
            } else {
                console.log("AJAX request completed with an error or failed.");
                // Any actions to perform after error/failure
            }
        }
    });
});
