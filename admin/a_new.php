<?php
	date_default_timezone_set('Asia/Kuala_Lumpur');
	include 'header.php';
?>
	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="a_dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa-solid fa-file-circle-check">&nbsp;</em> Transaction <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="a_reservation.php">
						<span class="fa-regular fa-calendar-days">&nbsp;</span> Reservation
					</a></li>
					<li><a class="active" href="a_new.php">
						<span class="fa fa-plus-circle">&nbsp;</span> New
					</a></li>
					<li><a class="" href="a_borrowed.php">
						<span class="fa-solid fa-arrow-up-from-bracket">&nbsp;</span> Borrowed Items
					</a></li>
					<li><a class="" href="a_returned.php">
						<span class="fa fa-calendar-check-o">&nbsp;</span> Returned Items
					</a></li>
				</ul>
			</li>
			<li><a href="a_items.php"><em class="fa fa-box-open">&nbsp;</em> Items</a></li>
			<li><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
			<li><a href="a_room.php"><em class="fa-solid fa-door-open">&nbsp;</em> Room</a></li>
			<li><a href="a_inventory.php"><em class="fa fa-boxes-stacked">&nbsp;</em> Inventory</a></li>
			<li><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">New Booking</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">New Booking</h1>
			</div>
		</div><!--/.row-->

		<div class="panel-body">
		<form id="bookingForm">
			<fieldset>
				<div style="width: 80%; margin: 0 auto;">

				<div class="form-group" style="margin-bottom: 15px;">
					<label for="itemType" style="color: black; font-weight: 400;">Item:</label>
					<select class="form-control" id="itemType" name="itemType" required></select>
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
					<!-- <input type="hidden" name="" value="<?php echo $_SESSION['user_id']; ?>"> -->
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
		
</div>
</div>

<?php include '../admin/footer.php'; ?>

<script src="../user/js/reservation.js"></script>
