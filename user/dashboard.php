<?php
	include 'header.php';
?>

<!DOCTYPE html>
<html>
<body>

	<!-- Side Menu -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="dashboard.htmphpl"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
			</div>
		</div><!--/.row-->
		
		<!-- Content -->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl solid fa-boxes-stacked color-#008000;"></em>
							<div class="large">54</div>
							<div class="text-muted">Items</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">96</div>
							<div class="text-muted">Borrowers</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl solid fa-box-open color-orange"></em>
							<div class="large">9</div>
							<div class="text-muted">Things Borrowed</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fas fa-xl fa-user color-red"></em>

							<div class="large">3</div>
							<div class="text-muted">Admin</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Image</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Model</th>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">LCD Projector</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">SM-8596</td>
				</tr>
			</table>
		</div>
		
		<?php
				include '../user/footer.php';
		?>

		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
		
</body>
</html>