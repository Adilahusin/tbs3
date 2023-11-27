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
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="reservation.php"><em class="fa fa-calendar">&nbsp;</em> Reservation</a></li>
			<li class="active"><a href="reservation_stat.php"><em class="fa fa-clone">&nbsp;</em> Reservation Status</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Reservation Status</li>
			</ol>
		</div><!--/.row-->
		
		<!-- Content -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservation Status</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table tblreservation_stat">
                            <thead>
                                <tr>
                                    <th>Reservation Date</th>
                                    <th>Items</th>
                                    <th>Room/Lab</th>
                                    <th>Status</th>
									<th>Remarks</th>
                                </tr>
                            </thead>
							<tbody>
							<?php
                                // Check if the session variable is set and has data
                                if (isset($_SESSION['reserve_stat']) && !empty($_SESSION['reserve_stat'])) {
                                    // Loop through the reservation data and populate table rows
                                    foreach ($_SESSION['reserve_stat'] as $reservation) {
                                        echo "<tr>";
										echo "<td>" . date('F d, Y H:i:s A', strtotime($reservation['reserve_date'].' '.$reservation['reserve_time'])) . "</td>"; 
                                        echo "<td>" . $reservation['i_type'] . "</td>";
                                        echo "<td>" . $reservation['room_name'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    // Display a message if there is no reservation data
                                    echo "<tr><td colspan='5'>No reservations found</td></tr>";
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
