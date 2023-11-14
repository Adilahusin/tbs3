<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<input type="text" id="userId" placeholder="Enter User ID">
<button id="fetchData">Fetch Data</button>

<div id="result"></div>

<script>
$(document).ready(function() {
    $('#fetchData').click(function() {
        var id = $('#userId').val();
        
        $.ajax({
            url: 'test_fetch_data.php?id=' + id,
            type: 'GET',
            success: function(data) {
                $('#result').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + errorThrown.responseText);
            }
        });
    });
});

</script>

</body>
</html>
