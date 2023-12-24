// Script for Tab navigation 
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");

    // Trigger sorting on the table in the active tab
    var activeTable = document.getElementById(tabName).querySelector('.dataTable');
    if (activeTable) {
        $(activeTable).DataTable().order([2, 'asc']).draw(); 
    }
}

// Open the default tab on page load
document.getElementById("defaultOpen").click();

// Open the Cancel button modal
$(document).on('click', '.btn-cancel', function() {
    var reservationCode = $(this).attr('data-id');
    $('input[name="cancel_reservation_code"]').val(reservationCode);
});

// perform cancellation
$('#cancelForm').submit(function(event) {
    event.preventDefault();

    // Get the cancellation remarks from the form
    var cancellationRemarks = $(this).find('textarea[name="remarks_cancel"]').val();
    
    // Get the reservation code from the hidden input field
    var reservationCode = $(this).find('input[name="cancel_reservation_code"]').val();

    // Perform the AJAX request to cancel the reservation only if cancellation remarks exist
    if (cancellationRemarks.trim() !== '') {
        $.ajax({
            type: 'POST',
            url: '../class/custom.php',
            data: {
                cancel_reservation_code: reservationCode,
                remarks_cancel: cancellationRemarks
            },
            success: function(response) {
                if (response === 'Cancel reservation success') {
                    // If cancellation is successful, remove the table row
                    $('[data-id="' + reservationCode + '"]').closest('tr').remove();
                    // Close the modal
                    $('#cancelModal').modal('hide');
                } else {
                    // Handle error or display a message if cancellation fails
                    console.log('Cancellation failed');
                    // You might want to show an error message to the user here
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(error);
                // You might want to show an error message to the user here
            }
        });
    } else {
        // If cancellation remarks are empty, you might want to prompt the user to enter remarks
        console.log('Please enter cancellation remarks');
        // You might want to show a message to the user here
    }
});

