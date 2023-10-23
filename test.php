<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="totalQuantity">Loading...</div>

    <script>
        // Fetch and update the total quantity using AJAX
        $.ajax({
            url: './class/calculate.php',
            dataType: 'json',
            success: function(data) {
                // Update the total quantity in the HTML content
                $('#totalQuantity').text('Total Quantity: ' + data.totalQuantity);
            },
            error: function() {
                // Handle errors or display a message if the request fails
                $('#totalQuantity').text('Failed to fetch total quantity.');
            }
        });
    </script>
</body>
</html>
