<?php

include './fetch_new.php';

// Check if the session variable exists
if (isset($_SESSION['admin_data']) && isset($_SESSION['user_data']) && isset($_SESSION['room_data']) && isset($_SESSION['item_data'])) {
    
    // Define an array to map data types to their corresponding variables
    $dataTypes = [
        'admin' => $data_admin,
        'user' => $data_user,
        'room' => $data_room,
        'item' => $data_item,
    ];

    // Iterate through the data types and display the data in a table
    foreach ($dataTypes as $dataType => $data) {
        echo "<h2>{$dataType} data</h2>";
        echo "<table>";
        echo "<tbody>";
        
        foreach ($data as $row) {
            echo "<tr>";
            
            switch ($dataType) {
                case 'admin':
                    echo "<td>" . $row['a_name'] . "</td>";
                    echo "<td>" . $row['a_username'] . "</td>";
                    echo "<td>" . $row['a_type'] . "</td>";
                    break;
                case 'user':
                    echo "<td>" . $row['u_id'] . "</td>";
                    echo "<td>" . $row['u_name'] . "</td>";
                    echo "<td>" . $row['u_contact'] . "</td>";
                    echo "<td>" . $row['u_type'] . "</td>";
                    break;
                case 'room':
                    echo "<td>" . $row['room_name'] . "</td>";
                    echo "<td>" . $row['room_date_added'] . "</td>";
                    echo "<td>" . $row['room_status'] . "</td>";
                    break;
                case 'item':
                    echo "<td>" . $row['i_type'] . "</td>";
                    echo "<td>" . $row['i_brand'] . "</td>";
                    echo "<td>" . $row['i_modelNo'] . "</td>";
                    echo "<td>" . $row['i_quantity'] . "</td>";
                    echo "<td>" . $row['i_entrydate'] . "</td>";
                    echo "<td>" . $row['i_status'] . "</td>";
                    break;
                default:
                    break;
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
} else {
    echo "Data not found.";
}
?>
