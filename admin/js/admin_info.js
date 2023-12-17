// Get references to the modals and the buttons to open/close them
var editAdminModal = document.getElementById('editAdminModal');
var openEditAdminButton = document.getElementById('editAdmin');
var closeEditAdminModalButton = document.getElementById('closeEditAdminModal');
var deleteAdminButton = document.getElementById('deleteAdmin');

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
document.addEventListener('DOMContentLoaded', function() {
    var deleteAdminButton = document.getElementById('deleteAdmin');

    if (deleteAdminButton) {
        deleteAdminButton.addEventListener('click', function() {
            var confirmation = confirm("Are you sure you want to delete this admin?");

            if (confirmation) {
                // Get the admin ID from the URL query parameters
                var urlParams = new URLSearchParams(window.location.search);
                var adminId = urlParams.get('id'); // Fetch the admin ID from the URL

                if (adminId) {
                    // Redirect to delete.php with the admin ID for deletion
                    window.location.href = "../class/delete.php?action=delete&id=" + adminId;
                } else {
                    alert("Admin ID not found in the URL.");
                }
            }
        });
    }
});
