// Display table admin

var table_admin =  $('.table_admin').DataTable({
    "ajax":
    {
        "url": "../class/display/display",
        "type": "POST",
        "data": {
            "key": "display_admin"
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
            "data": [3],
            "className": "text-center"
        },
        {
            "data": [4],
            "className": "text-center",
            "visible": false
        },
        {
            "data": [5],
            "className": "text-center",
            "visible": false
        }
    ],
});