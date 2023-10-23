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
					<select class="form-control" id="reserve_item" name="reserve_item" required></select>
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
					<select class="form-control" id="reserve_room" name="reserve_room" required></select>
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
			
			
<?php include '../user/footer.php'; ?>

	</div>
</div>	


<!-- JavaScript to populate the "Item" dropdown -->
<script>
fetch('../fetchdata/fetch_json.php')
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('reserve_item');

        // Loop through the data and create an <option> element for each item
        data.items.forEach(item => {
            const option = document.createElement('option');
            option.value = item.i_type;
            option.textContent = item.i_type;
            select.appendChild(option);
        });
    })
    .catch(error => console.error(error));
</script>

<!-- JavaScript to populate the "Select Room/Lab" dropdown -->
<script>
fetch('../fetchdata/fetch_json.php') 
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('reserve_room');

        // Loop through the data and create an <option> element for each room
        data.rooms.forEach(room => {
            const option = document.createElement('option');
            option.value = room.room_name;
            option.textContent = room.room_name;
            select.appendChild(option);
        });
    })
    .catch(error => console.error(error));
</script>