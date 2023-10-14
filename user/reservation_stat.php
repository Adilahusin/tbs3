<?php
	include 'header.php';
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
		<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Reservation Date</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Item</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Room Assign</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Status</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Remarks</th>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">16/9/23</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">LCD Projector</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Lab 12A</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Pending</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">28/7/23</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">PA System</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Lab 7B</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Accepted</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">No remarks</td>
				</tr>
			</table>
		</div>

		<?php
			include '../user/footer.php';
		?>

		</div><!--/.row-->
	</div><!--/.main-->
	
		<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
