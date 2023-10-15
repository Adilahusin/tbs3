<?php

include './fetchdata/fetch.php';

// Check if the session variable exists
if (isset($_SESSION['admin_data'])) {
    
    // Retrieve the data from the session variable
    $data = $_SESSION['admin_data'];
    //print_r ($data);

    // Display the data in an HTML table
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Username</th><th>Email</th></tr></thead>";
    echo "<tbody>";
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['a_name'] . "</td>";
        echo "<td>" . $row['a_username'] . "</td>";
        echo "<td>" . $row['a_type'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Data not found. Please fetch the data first.";
}
?>
