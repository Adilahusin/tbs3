<?php

include './fetch_new.php';

// Check if the session variable exists
// Check if the session variable exists
if (isset($_SESSION['admin_data']) && isset($_SESSION['user_data'])) {
								
    // Retrieve the data from the session variable
    $data_admin = $_SESSION['admin_data'];
    //print_r ($data_admin);

    // Display the admin data in table
    foreach ($data_admin as $row) { // foreach untuk looping
        echo "<tr>";
        echo "<td>" . $row['a_name'] . "</td>";
        echo "<td>" . $row['a_username'] . "</td>";
        echo "<td>" . $row['a_type'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";

    // Display the user_data in a separate HTML table

    // Display the user data in table
    echo "<tbody>";
    foreach ($data_user as $row) {
        echo "<tr>";
        echo "<td>" . $row['u_id'] . "</td>";
        echo "<td>" . $row['u_name'] . "</td>";
        echo "<td>" . $row['u_contact'] . "</td>"; 
        echo "<td>" . $row['u_type'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";

} else {
    echo "Data not found.";

}
?>