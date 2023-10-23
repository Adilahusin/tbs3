<?php
    include 'header.php';
    include '../fetchdata/fetch.php';
?>

<!DOCTYPE html>
<html>

<body>

    <!-- Back to Login Page Button -->
    <div class="container" style="height: 15vh; display: flex; flex-direction: column; justify-content: center;">
        <a href="../index.php" class="btn btn-primary" 
		style="position: absolute; top: 80px; left: 10px;">Back to Login Page</a>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table_item" id="itemTable">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Model No</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if the session variable exists
                                if (isset($_SESSION['item_data'])) {

                                    // Retrieve the data from the session variable
                                    $data_item = $_SESSION['item_data'];

                                    foreach ($data_item as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['i_type'] . "</td>";
                                        echo "<td>" . $row['i_brand'] . "</td>";
                                        echo "<td>" . $row['i_modelNo'] . "</td>";
                                        echo "<td>" . $row['i_quantity'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Data not found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="col-sm-12">
        <p class="back-link">HAK CIPTA UiTM 2023</p>
    </div>
    </div><!--/.row-->
    </div> <!--/.main-->


</body>
</html>
