// Get references to the modals and the buttons to open/close them
var editRoomModal = document.getElementById('editRoomModal');
var openEditRoomButton = document.getElementById('editRoom');
var closeEditRoomModalButton = document.getElementById('closeEditRoomModal');
var deleteAdminButton = document.getElementById('deleteAdmin');

// Function to open the editAdmin modal
function openEditRoomModal() {
    editRoomModal.style.display = 'block';
}

// Function to close any modal
function closeModal() {
    editRoomModal.style.display = 'none';
}

// Event listeners to open the editAdmin modal
openEditRoomButton.addEventListener('click', openEditRoomModal);

// Event listeners to close the modals with the 'x' icons
closeEditRoomModalButton.addEventListener('click', closeModal);

// Event listener for the delete admin button
deleteAdminButton.addEventListener('click', confirmAdminDeletion);

// Close the modal when clicking outside the modal content
window.addEventListener('click', function(event) {
    if (event.target === editRoomModal) {
        closeModal();
    }
});
