<?php
    include '../fetchdata/fetch.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UiTM Tools Borrowing System</title>
	
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<!-- Icon Browser -->
    <link rel="shortcut icon" type="x-icon" href="uitm.png">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Include jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Include DataTables CSS and JS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
                <a class="navbar-brand"><span>UiTM</span>TBS</a>
			</div>
		</div>
	</nav>


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
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Data not found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../user/footer.php'; ?>

    </div><!--/.row-->
    </div> <!--/.main-->


</body>
</html>
