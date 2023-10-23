<?php
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
 		<button id="bottom-right-button" class="btn btn-primary" style="position: relative; left: 64.5%; 
		transform: translateX(50%); margin-top: 15px;  background-color: blue;">Borrow</button>

<?php include '../admin/footer.php'; ?>
		</div><!--/.row-->
	</div>	<!--/.main-->

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