// Function to retrieve and populate the item and room dropdowns
function populateDropdowns() {
    $.ajax({
        type: 'GET',
        url: 'get_data.php',
        dataType: 'json',
        success: function(data) {
            // Populate item dropdown
            var itemDropdown = $('#itemType');
            itemDropdown.empty();
            $.each(data.items, function(index, value) {
                itemDropdown.append('<option value="' + value.id + '">' + value.i_type + ' - ' + value.i_brand + '</option>');
            });

            // Populate room dropdown
            var roomDropdown = $('#roomName');
            roomDropdown.empty();
            $.each(data.rooms, function(index, value) {
                roomDropdown.append('<option value="' + value.id + '">' + value.room_name + '</option>');
            });
        }
    });
}

// Function to book the reservation
function book() {
    var itemType = $('#itemType').val();
    var roomName = $('#roomName').val();
    var reserveDate = $('#reserveDate').val();
    var reserveTime = $('#reserveTime').val();
    var timeLimit = $('#timeLimit').val();

    $.ajax({
        type: 'POST',
        url: 'booking.php',
        data: { itemType: itemType, roomName: roomName, reserveDate: reserveDate, reserveTime: reserveTime, timeLimit: timeLimit },
        success: function(response) {
            $('#result').html(response);
            // After successful booking, refresh the dropdowns
            populateDropdowns();
        }
    });
}

// Populate dropdowns on page load
$(document).ready(function() {
    populateDropdowns();
});
