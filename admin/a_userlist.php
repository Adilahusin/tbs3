<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';
?>

<!DOCTYPE html>
<html>
<head>
   
   <!-- Include DataTables library -->
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

   <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
			text-align: left;
			color: black;
        }

        /* Close button style */
        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer; /* Add this line to make the "×" clickable */
        }

		tr {
			margin-bottom: 10px;
		}

		td, th {
			padding: 5px 0;
		}

		/* Update input field styles */
		.modal-content input[type="text"],
		.modal-content input[type="password"],
		.modal-content select {
			width: 100%; /* Make the input fields 100% wide */
			padding: 5px;
			margin: 5px 0 5px 0;
		}

		/* Update table cell styles */
		.modal-content table td {
			padding: 5px 10px; /* Add some padding to table cells for alignment */
		}
		
    </style>
	
</head>
<body>

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
					<!-- <li><a class="" href="a_new.php">
						<span class="fa fa-plus-circle">&nbsp;</span> New
					</a></li> -->
					<li><a class="" href="a_borrowed.php">
						<span class="fa-solid fa-arrow-up-from-bracket">&nbsp;</span> Borrowed Items
					</a></li>
					<li><a class="" href="a_returned.php">
						<span class="fa fa-calendar-check-o">&nbsp;</span> Returned Items
					</a></li>
				</ul>
			</li>
			<li><a href="a_items.php"><em class="fa fa-box-open">&nbsp;</em> Items</a></li>
			<li class="active"><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
			<li><a href="a_room.php"><em class="fa-solid fa-door-open">&nbsp;</em> Room</a></li>
			<li><a href="a_inventory.php"><em class="fa fa-boxes-stacked">&nbsp;</em> Inventory</a></li>
			<li><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="a_dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User List</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User List</h1>
			</div>
		</div><!--/.row-->
				
		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">
		
			<!-- Add User button -->
			<button id="addUser" class="add-button"><i class="fas fa-plus"></i> Add User</button>

			<div id="addUserModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h4 class="alert bg-success">Add User</h4>
				<form id="sidebarForm" action="../class/add.php" method="post">
					<table>
						<tr>
							<td><label for="userid">Staff/Student No.</label></td>
							<td><input type="text" id="userid" name="u_id" required></td>
						</tr>
						<tr>
							<td><label for="name">Name</label></td>
							<td><input type="text" id="name" name="u_name" required></td>
						</tr>
						<tr>
							<td><label for="contactno">Contact No.</label></td>
							<td><input type="text" id="contactno" name="u_contact" required></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">User Type</td>
							<td>
								<select id="userType" name="u_type">
									<option disabled selected>Select type</option>
									<option value="1">Staff/Lecturer</option>
									<option value="2">Student</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Gender</td>
							<td>
								<select id="genderType" name="u_gender">
									<option disabled selected>Select gender</option>
									<option value="1">Male</option>
									<option value="2">Female</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="password" id="password" name="u_password" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right;">
								<button class="btn btn-primary" type="submit" id="saveButton" name="add_user">SAVE</button>
								<button class="btn btn-danger" type="button" id="cancelButton">CANCEL</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			</div>


		</div>

		<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body"><br><br>
				<table class="table table_user" id="userTable"> 
					<thead>
						<tr>
							<th data-sort="id"  style="width: 180px;">Staff/Student ID</th>
							<th data-sort="name"  style="width: 200px;">Name</th>
							<th data-sort="contact" style="width: 150px;">Contact No.</th>
							<th data-sort="type" style="width: 120px;">Type
								<br><sub>1=Staff, 2=Student</sub></br>
							</th>
							<th style="width: 100px;">Action</th>
						</tr>
					</thead>
						<tbody>
							<?php
								// Check if the session variable exists
								if (isset($_SESSION['user_data'])) {
									
									// Retrieve the data from the session variable
									$data_user = $_SESSION['user_data'];
									//print_r ($data_user);

									// Display the user data in table
									foreach ($data_user as $row) {
										echo "<tr>";
										echo "<td>" . $row['u_id'] . "</td>";
										echo "<td>" . $row['u_name'] . "</td>";
										echo "<td>" . $row['u_contact'] . "</td>"; 
										echo "<td>" . $row['u_type'] . "</td>";
										echo '<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
													<li><a href="?action=delete&u_id=' . $row['u_id'] . '&u_name=' . $row['u_name'] . '" class="delete-action">Delete</a></li>
													<li><a href="?action=deactivate&u_id=' . $row['u_id'] . '&u_name=' . $row['u_name'] . '" class="deactivate-action">Deactivate</a></li>
												</ul>

                                            </div>
                                        </td>';
                                        echo "</tr>";
									}
									} else {
										echo "Data not found.";
									}	
							?>
						</tbody>
					</table>
					<!-- <li><a href="#" class="deactivate-action">Deactivate</a></li> -->
				</div>
			</div>
		</div>
	</div>
	
	<script src="./js/userlist.js"></script>

</body>
</html>

<?php include '../admin/footer.php'; ?>
