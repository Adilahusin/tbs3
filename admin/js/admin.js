$(document).ready(function() {
    $('#adminTable').DataTable(); 
});

// Get references to the modals and the buttons to open/close them
var addAdminModal = document.getElementById('addAdminModal');
var openModalButton = document.getElementById('addAdmin');
var closeModalButton = document.getElementById('closeModal');
var cancelButton = document.getElementById('cancelButton');

// Function to open the "Add Admin" modal
function openModal() {
    addAdminModal.style.display = 'block';
}

// Function to close the "Add Admin" modal
function closeModal() {
    console.log('Close modal function triggered');
    addAdminModal.style.display = 'none';
    var form = document.getElementById('sidebarForm');
    if (form) {
        form.reset(); // Reset the form
    }
}

// Event listeners to open and close the "Add Admin" modal
openModalButton.addEventListener('click', openModal);
closeModalButton.addEventListener('click', closeModal);
cancelButton.addEventListener('click', closeModal);

// Close the "Add Admin" modal when clicking outside the modal content
window.addEventListener('click', function(event) {
    if (event.target == addAdminModal) {
        closeModal();
    }
});
