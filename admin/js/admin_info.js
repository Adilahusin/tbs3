// Get references to the modals and the buttons to open/close them
var editAdminModal = document.getElementById('editAdminModal');
var openEditAdminButton = document.getElementById('editAdmin');
var closeEditAdminModalButton = document.getElementById('closeEditAdminModal');
var deleteAdminButton = document.getElementById('deleteAdmin');
var statusAdminButton = document.getElementById('statusAdmin');

// Function to open the editAdmin modal
function openEditAdminModal() {
    editAdminModal.style.display = 'block';
}

// Function to close any modal
function closeModal() {
    editAdminModal.style.display = 'none';
}

// Event listeners to open the editAdmin modal
openEditAdminButton.addEventListener('click', openEditAdminModal);

// Event listeners to close the modals with the 'x' icons
closeEditAdminModalButton.addEventListener('click', closeModal);

// Event listener for the delete admin button
deleteAdminButton.addEventListener('click', confirmAdminDeletion);

// Close the modal when clicking outside the modal content
window.addEventListener('click', function(event) {
    if (event.target == editAdminModal) {
        closeModal();
    }
});

// Function to confirm admin deletion
function confirmAdminDeletion() {
    var confirmation = confirm("Are you sure you want to delete this admin?");

    if (confirmation) {
        var urlParams = new URLSearchParams(window.location.search);
        var adminId = urlParams.get('id');
        console.log("User ID to delete:", adminId);

        if (adminId) {
            window.location.href = "../class/delete.php?action=delete&id=" + adminId + "&entity=admin";
        } else {
            alert("Admin ID not found in the URL.");
        }
    }
}
document.addEventListener('DOMContentLoaded', function() {
    var deleteAdminButton = document.getElementById('deleteAdmin');

    if (deleteAdminButton) {
        deleteAdminButton.addEventListener('click', confirmAdminDeletion);
    }
});

// function for change status admin
$(document).ready(function() {
    $('#statusAdmin').on('click', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var adminId = urlParams.get('id');
        console.log("Change status for admin ID:", adminId);

        var updateStatus = '../class/update2.php'; 

        $.ajax({
            type: 'POST',
            url: updateStatus,
            data: { adminId: adminId },
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

    });
});

