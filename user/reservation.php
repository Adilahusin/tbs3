<?php
	date_default_timezone_set('Asia/Kuala_Lumpur');
	include 'header.php';

	echo json_encode($_SESSION['user_id']);
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
								<br><br>
							</div>
						</div>
					</div>					
				</div>

<div class="panel-body">
	<form id="bookingForm">
		<fieldset>
			<div style="width: 80%; margin: 0 auto;">

			<div class="form-group" style="margin-bottom: 15px;">
				<label for="itemType" style="color: black; font-weight: 400;">Item:</label>
				<select class="form-control" id="itemType" name="itemType[]" required></select>
			</div>

			<div class="form-group" style="margin-bottom: 15px;">
				<label for="roomName" style="color: black; font-weight: 400;">Room Name:</label>
				<select class="form-control" id="roomName" name="roomName" required></select>
			</div>

			<div class="form-group" style="margin-bottom: 15px;">
				<label for="reserveDate" style="color: black; font-weight: 400;">Reservation Date:</label>
				<input class="form-control" type="date" id="reserveDate" name="reserveDate" required>
			</div>

			<div class="form-group" style="margin-bottom: 15px;">
				<label for="reserveTime" style="color: black; font-weight: 400;">Reservation Time:</label>
				<input class="form-control" type="time" id="reserveTime" name="reserveTime" required>
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
				
			</div>

			<div class="form-group" style="margin-bottom: 15px;">
				<label for="timeLimit" style="color: black; font-weight: 400;">Time Limit:</label>
				<input class="form-control" type="datetime-local" id="timeLimit" name="timeLimit" required>
			</div>
		
			</div>
		</fieldset>
	</form>
</div>

<button type="button" onclick="book()" id="bottom-right-button" class="btn btn-primary" 
		style="border: none; position: relative; left: 78%; transform: translateX(50%); margin-top: 15px;
		background-color: #7370c9;">Reserve
</button>

<div id="result"></div>
		
<br><br>
			
<?php include '../user/footer.php'; ?>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="./js/reservation.js"></script>
