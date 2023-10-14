<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
	include 'header.php';
?>
	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="reservation.php"><em class="fa fa-calendar">&nbsp;</em> Reservation</a></li>
			<li><a href="reservation_stat.php"><em class="fa fa-clone">&nbsp;</em> Reservation Status</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Reservation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservation</h1>
				<div style="font-size: 24px; color: #007bff;">
				
				<!-- Content -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<div style="display: flex; align-items: left; justify-content: left;">
								<i class="fas fa-calendar-alt" style="font-size: 24px; color: black; margin-right: 10px;"></i>
								<p style="font-size: 16px; color: #333;">Make Reservation</p>
							</div>
						</div>
					</div>					
				</div><!--/.row-->

		<div style="width: 50%; margin: 0 auto;">
			<div style="background-color: #c6c4fc; padding: 20px; border-radius: 20px;">
				
				<div style="margin-bottom: 15px;">
					<label for="reserve_item" style="color: black; font-weight: 400;">Item:</label>
					<select class="form-control" id="reserve_item" name="reserve_item" required>
						<option value="room1">LCD</option>
						<option value="room2">Extension</option>
						<option value="room3">PA System</option>
					</select>
				</div>

				<div style="margin-bottom: 15px;"> 
					<label for="reserved_date" style="color: black; font-weight: 400;">Date:</label>
					<input type="date" class="form-control datepicker" id="reserved_date" name="reserved_date" required>
				</div>
	
				<div style="margin-bottom: 15px;">
					<label for="reserved_time" style="color: black; font-weight: 400;">Time:</label>
					<input type="time" class="form-control" id="reserved_time" name="reserved_time" required>
				</div>
	
				<div style="margin-bottom: 15px;">
					<label for="reserve_room" style="color: black; font-weight: 400;">Select Room/Lab:</label>
					<select class="form-control" id="reserve_room" name="reserve_room" required>
						<option value="room1">Room 1</option>
						<option value="room2">Room 2</option>
						<option value="room3">Room 3</option>
					</select>
				</div>
	
				<div style="margin-bottom: 15px;">
					<label for="time_limit" style="color: black; font-weight: 400;">Time Limit:</label>
					<input type="datetime-local" class="form-control" id="time_limit" name="time_limit" value="">
				</div>
			</div>
		</div>

		<!-- Button with Inline CSS -->
		<button id="bottom-right-button" class="btn btn-primary" style="border: none; position: relative; left: 64%; 
		transform: translateX(50%); margin-top: 15px;  background-color: #7370c9;"onclick="alert('Reserve button clicked!')">Reserve</button>
			
			
		<?php
			include '../user/footer.php';
		?>

		</div>
	</div>	

	<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $("#time_limit").datetimepicker({
            minTime: '<?php echo date("H:i"); ?>',
            maxTime: '18:00',
            minDate: 0,
            format: 'Y-m-d h:i A',
            step: 30
        });
    });
</script> -->

