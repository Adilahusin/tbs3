<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
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
					<li><a class="" href="a_new.php">
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
			<li class="active"><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
			<li><a href="a_history.php"><em class="fa-solid fa-clock-rotate-left">&nbsp;</em> History</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Admin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">
			
			<!-- Search input field with search icon -->
			<div style="position: relative; display: inline-block;">
			  <input type="text" placeholder="Search..." style="background-color: #fff; border: 1px solid #7370c9; border-radius: 5px; padding: 5px 30px; color: black; height: 30px;">
			  <button style="position: absolute; top: 0; right: 0; bottom: 0; background-color: #7370c9; border: none; border-radius: 0 5px 5px 0; padding: 5px 10px; color: #fff; height: 30px;">
				<i class="fas fa-search"></i>
			  </button>
			</div>
		  
			<!-- Add Admin button with margin -->
			<button style="background-color: #7370c9; border: none; border-radius: 5px; padding: 5px 10px; margin-left: 10px; height: 30px;" 
			onclick="alert('Add Admin button clicked!')">Add Admin</button>
		
		</div>
		
		<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table_admin">
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Type
									<br><sub>1=Admin, 2=Staff</sub></br>
								</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// Check if the session variable exists
								if (isset($_SESSION['admin_data'])) {
								
								// Retrieve the data from the session variable
								$data_admin = $_SESSION['admin_data'];
								//print_r ($data_admin);

								// Display the admin data in table
								foreach ($data_admin as $row) { // foreach untuk looping
									echo "<tr>";
									echo "<td>" . $row['a_name'] . "</td>";
									echo "<td>" . $row['a_username'] . "</td>";
									echo "<td>" . $row['a_type'] . "</td>";
									echo "</tr>";
								}
								} else {
									echo "Data not found.";
								}
							?>
						</tbody>
					</table>
				
				</div>
			</div>
		</div>
	</div>

	<!-- Untuk sidebar to 'add admin' -->
	<!-- <div class="right-sidebar user-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<form class="frmadd_users">
				<h4 class="alert bg-success">Add Admin</h4>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="a_name" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="a_username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="a_password" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>User Type</label>
					<select class="form-control" name="u_type" required="required">
						<option disabled selected>Please select Admin type</option>
						<option value="1">Administrator</option>
						<option value="2">Staff Assistant</option>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-danger btn-block cancel_user" type="button">
								CANCEL
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" type="submit">
								SAVE
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="right-sidebar userdiv">
	<div class="container-fluid">
		<div class="edit-userside"></div>
	</div>
</div> -->


<?php include '../admin/footer.php'; ?>
