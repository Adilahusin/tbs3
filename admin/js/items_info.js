// Modal

    // Get references to the modals and the buttons to open/close them
    var addQtyModal = document.getElementById('addQtyModal');
    var editItemModal = document.getElementById('editItemModal');
    var changeStatusModal = document.getElementById('changeStatusModal');
    
    var openAddQtyButton = document.getElementById('addQty');
    var openEditItemButton = document.getElementById('editItem');
    var openChangeStatusButton = document.getElementById('changeStatus');
    
    var closeAddQtyModalButton = document.getElementById('closeAddQtyModal');
    var closeEditItemModalButton = document.getElementById('closeEditItemModal');
    var closeChangeStatusModalButton = document.getElementById('closeChangeStatusModal');

    // Function to open the addQty modal
    function openAddQtyModal() {
        addQtyModal.style.display = 'block';
    }

    // Function to open the editItem modal
    function openEditItemModal() {
        editItemModal.style.display = 'block';
    }

    // Function to open the changeStatus modal
    function openChangeStatusModal() {
        changeStatusModal.style.display = 'block';
    }

    // Function to close any modal
    function closeModal() {
        addQtyModal.style.display = 'none';
        editItemModal.style.display = 'none';
        changeStatusModal.style.display = 'none';
    }

    // Event listeners to open the modals
    openAddQtyButton.addEventListener('click', openAddQtyModal);
    openEditItemButton.addEventListener('click', openEditItemModal);
    openChangeStatusButton.addEventListener('click', openChangeStatusModal);

    // Event listeners to close the modals with the 'x' icons
    closeAddQtyModalButton.addEventListener('click', closeModal);
    closeEditItemModalButton.addEventListener('click', closeModal);
    closeChangeStatusModalButton.addEventListener('click', closeModal);

    // Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target == addQtyModal || event.target == editItemModal || event.target == changeStatusModal) {
            closeModal();
        }
    });
