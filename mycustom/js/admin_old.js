// jQuery to make an Ajax request to a server-side PHP script

$(document).ready(function() {
    function fetchAdminData() {
        $.ajax({
            type: 'POST',
            url: 'display.php',
            data: {
                key: 'display_admin'
            },
            dataType: 'json',
            success: function(data) {
                if (data.data && data.data.length > 0) {
                    var table = $('.table_admin').DataTable();
                    table.clear().draw();
                    table.rows.add(data.data).draw();
                }
            },
            error: function(error) {
                console.error('AJAX request failed:', error);
            }
        });
    }

    fetchAdminData();
});
