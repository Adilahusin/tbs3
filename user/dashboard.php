<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
?>

<!DOCTYPE html>
<html>
<body>

	<!-- Side Menu -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="reservation.php"><em class="fa fa-calendar">&nbsp;</em> Reservation</a></li>
			<li><a href="reservation_stat.php"><em class="fa fa-clone">&nbsp;</em> Reservation Status</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
				<h4><?php echo ("Welcome " . $_SESSION['user_name'] . " !"); ?></h4>
			</div>
		</div><!--/.row-->
		
		<!-- Content -->

		<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table_item_dashboard">
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
		
<?php include '../user/footer.php'; ?>

</body>
</html>