    // Function to fetch and update the total quantity of items
    function updateTotalQuantity() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total quantity of items
            dataType: 'json',
            success: function(data) {
                $('#totalQuantity').text(data.totalQuantity);
            },
            error: function() {
                $('#totalQuantity').text('-');
            }
        });
    }

    // Function to fetch and update the total number of users
    function updateTotalUsers() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total number of users
            dataType: 'json',
            success: function(data) {
                $('#totalUsers').text(data.totalUsers);
            },
            error: function() {
                $('#totalUsers').text('-');
            }
        });
    }

	// Function to fetch and update the total number of users
    function updateTotalAdmin() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total number of users
            dataType: 'json',
            success: function(data) {
                $('#totalAdmin').text(data.totalAdmin);
            },
            error: function() {
                $('#totalAdmin').text('-');
            }
        });
    }

    // Call both update functions when the page loads
    $(document).ready(function() {
        updateTotalQuantity();
        updateTotalUsers();
		updateTotalAdmin();
    });