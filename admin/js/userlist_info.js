// Get references to the modals and the buttons to open/close them
var deleteUserButton = document.getElementById('deleteUser');
var statusUserButton = document.getElementById('statusUser');

// Event listener for the delete admin button
deleteUserButton.addEventListener('click', confirmUserDeletion);

// Function to confirm user deletion
function confirmUserDeletion() {
    var confirmation = confirm("Are you sure you want to delete this user?");

    if (confirmation) {
        var urlParams = new URLSearchParams(window.location.search);
        var userId = urlParams.get('id');
        console.log("User ID to delete:", userId);

        if (userId) {
            window.location.href = "../class/delete.php?action=delete&id=" + userId + "&entity=user";;
        } else {
            alert("User ID not found in the URL.");
        }
    }
}
document.addEventListener('DOMContentLoaded', function() {
    var deleteUserButton = document.getElementById('deleteUser');

    if (deleteUserButton) {
        deleteUserButton.addEventListener('click', confirmUserDeletion);
    }
});

// function for change status user
$(document).ready(function() {
    $('#statusUser').on('click', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var userId = urlParams.get('id'); 
        console.log("Change status for user ID:", userId);

        var updateStatus = '../class/update2.php';

        $.ajax({
            type: 'POST',
            url: updateStatus,
            data: { userId: userId },
            success: function(response) {
                // Handle success response
                alert('Status updated successfully');
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('Error updating status: ' + error + '. Please try again later.');
                location.reload();
            }
        });

        // Log the AJAX request details for debugging
        console.log('AJAX request sent to:', updateStatus);
        console.log('Data sent:', { userId: userId });
    });
});


