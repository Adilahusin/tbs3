document.addEventListener('DOMContentLoaded', function() {
    // Get references to the modals and the buttons to open/close them
    var addQtyModal = document.getElementById('addQtyModal');
    var editItemModal = document.getElementById('editItemModal');
    var changeStatusModal = document.getElementById('changeStatusModal');

    var openAddQtyButton = document.getElementById('addQty');
    var openEditItemButton = document.getElementById('editItem');
    var openChangeStatusButton = document.getElementById('changeStatus');
    var deleteItemButton = document.getElementById('deleteItem'); // Added this line

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

    // Function to open the changeStatus modal and log the item ID
    function openChangeStatusModal() {
        function getItemIdFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('id');
        }

        const itemId = getItemIdFromURL();

        console.log('Item ID:', itemId);

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

    // Function to retrieve item ID from the URL
    function getItemIdFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }

    // Function to display item ID from the URL
    function displayItemIdFromURL() {
        const itemId = getItemIdFromURL();
        console.log('Item ID:', itemId);
    }

    // Call the function when the page loads
    window.addEventListener('load', displayItemIdFromURL);

    // Function for confirming item deletion
    function confirmItemDeletion() {
        var confirmation = confirm("Are you sure you want to delete this item?");

        if (confirmation) {
            var itemId = getItemIdFromURL();

            if (itemId) {
                window.location.href = "../class/delete.php?action=delete&id=" + itemId + "&entity=item";
            } else {
                alert("Item ID not found in the URL.");
            }
        }
    }

    // Event listener for the delete item button
    deleteItemButton.addEventListener('click', confirmItemDeletion);
});
