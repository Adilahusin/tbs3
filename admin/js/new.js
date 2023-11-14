// JavaScript to populate the "Item" dropdown

fetch('../fetchdata/fetch_json.php')
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('reserve_item');

        // Loop through the data and create an <option> element for each item
        data.items.forEach(item => {
            const option = document.createElement('option');
            option.value = item.i_type;
            option.textContent = item.i_modelNo + " - " + item.i_type + " - " + item.i_brand + " - [" + item.i_quantity + " in stock]";
            select.appendChild(option);
        });
    })
    .catch(error => console.error(error));

// JavaScript to populate the "Select Room/Lab" dropdown
fetch('../fetchdata/fetch_json.php') 
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('reserve_room');

        // Loop through the data and create an <option> element for each room
        data.rooms.forEach(room => {
            const option = document.createElement('option');
            option.value = room.room_name;
            option.textContent = room.room_name;
            select.appendChild(option);
        });
    })
    .catch(error => console.error(error));
