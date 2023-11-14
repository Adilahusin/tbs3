// For sorting the data in table
	$('#userTable').DataTable({
		"columnDefs": [
			{ "targets": [0, 3], "type": "num" } // Specify columns with numeric data
		]
	});

// Get references to the modal and the button to open/close it
    var modal = document.getElementById('addUserModal');
    var openModalButton = document.getElementById('addUser');
    var closeModalButton = document.getElementById('closeModal');
	var cancelButton = document.getElementById('cancelButton');

    // Function to open the modal
    function openModal() {
        modal.style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        modal.style.display = 'none';
		form.reset(); // Reset the form
    }

    // Event listeners to open and close the modal
    openModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);

	// Event listener to close the modal when clicking the "Cancel" button
    cancelButton.addEventListener('click', closeModal);

	// Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target == addUserModal) {
            closeModal();
        }
    });