// For sorting the data in table
$(document).ready(function() {
    // Check if DataTable is already initialized
    if (!$.fn.dataTable.isDataTable('#itemTable')) {
        // If not initialized, then initialize DataTable
        $('#itemTable').DataTable({
            "columnDefs": [
                { "targets": [3, 5], "type": "num" } // Specify columns with numeric data
            ]
        });
    }
});

$(document).ready(function() {
    console.log('Display function called');
    var table_item = $('#itemTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../testdisplay/display.php",
            "type": "POST",
            "data": {
                "key": "display_item"
            }
        },
        "columns": [
            { "data": "i_type" },
            { "data": "i_brand" },
            { "data": "i_modelNo" },
            { "data": "i_quantity" },
            { "data": "i_status" },
            {
                "data": null,
                "render": function(data, type, row) {
                    return '<a href="a_items_info.php?id=' + row.id + '">More Info</a>';
                }
            }
        ]
    });
});




// Get references to the modal and the button to open/close it
    var modal = document.getElementById('addItemModal');
    var openModalButton = document.getElementById('addItem');
    var closeModalButton = document.getElementById('closeModal');
	var cancelButton = document.getElementById('cancelButton');

	// Get references to the form elements
    var form = document.getElementById('sidebarForm');
    var typeInput = document.getElementById('type');
    var brandInput = document.getElementById('brand');
    var modelNoInput = document.getElementById('modelNo');
    var quantityInput = document.getElementById('quantity');
    var pbNoInput = document.getElementById('pbNo');
    var vendorInput = document.getElementById('vendor');
    var warrantyInput = document.getElementById('warranty');
    var datePurchaseInput = document.getElementById('datePurchase');
    var serialNoInput = document.getElementById('serialno');
    var picInput = document.getElementById('pic');

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
        if (event.target == addItemModal) {
            closeModal();
        }
    });