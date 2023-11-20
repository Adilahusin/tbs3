var tbl_pendingres = $('.tbl_pendingres').DataTable({
"ajax":
    {
        "url": "../class/display",
        "type": "POST",
        "data": {
            "key": "pending_reservation"
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
        "className": "text-center"
    }
],
});