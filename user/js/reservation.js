// Function to retrieve and populate the item and room dropdowns
function populateDropdowns() {
    $.ajax({
        type: 'GET',
        url: '../fetchdata/fetch_json.php',
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

    console.log('Book function called'); // To ensure the function is being called

    var itemType = $('#itemType').val();
    var roomName = $('#roomName').val();
    var reserveDate = $('#reserveDate').val();
    var reserveTime = $('#reserveTime').val();
    var timeLimit = $('#timeLimit').val();
    var userId = $('input[name="user_id"]').val(); // Fetching user_id from the hidden input field

    // alert('User ID: ' + userId);

    $.ajax({
        type: 'POST',
        url: '../class/book.php',
        data: {
            itemType: itemType,
            roomName: roomName,
            reserveDate: reserveDate,
            reserveTime: reserveTime,
            timeLimit: timeLimit,
            user_id: userId
        },
        success: function(response) {
            // Show an alert with the response
            alert(response);

            // After successful booking, refresh the dropdowns
            populateDropdowns();
        }
    });
}



// Populate dropdowns on page load
$(document).ready(function() {
    populateDropdowns();
});
