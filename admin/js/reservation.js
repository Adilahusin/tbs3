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
$(document).ready(function() {
    $(document).on('click', '.btn-cancel', function() {
        var reservationCode = $(this).attr('data-id');
        console.log('Reservation Code:', reservationCode);

        // Assuming modalReservationCode is defined and contains the cancel reservation code
        $('input[name="cancel_reservation_code"]').val(reservationCode);

        // Perform cancellation via AJAX
        $.ajax({
            type: 'POST',
            url: '../class/custom.php',
            data: $('#cancelForm').serialize(),
            success: function(response) {
                if (response === 'Cancellation reservation successfully') {
                    // Remove the table row corresponding to the canceled reservation
                    $('[data-id="' + reservationCode + '"]').closest('tr').remove();
                } else {
                    // Handle error or display a message if cancellation fails
                    console.log('Cancellation failed');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(error);
            }
        });
    });


});
