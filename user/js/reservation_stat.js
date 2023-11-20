var table_reservation_stat = $('.table_reservation_stat').DataTable({
    "ajax":
        {
            "url": "../class/reserve_stat.php",
            "type": "POST",
            "data": {
                "key": "table_reservation_stat",
            }
        },
    "columns": 
    [
        {
            "data": [0],
            "className": "text-center"
        },
        {
            "data": [1],
            "className": "text-center"
        },
        {
            "data": [2],
            "className": "text-center"
        },
        {
            "data": [4],
            "className": "text-center"
        },
        {
            "data": [3],
            "className": "text-center"
        }
    ],
});