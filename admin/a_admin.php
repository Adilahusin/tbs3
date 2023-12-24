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
			padding: 5px 10px;
		}

        /* CSS for buttons with space between them */
		.btn-edit,
		.btn-delete {
		margin-right: 5px;
		}

		.center-buttons {
			display: flex;
			justify-content: center;
		}
		

	</style>
</head>
<body>

    <div id="content">

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
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="a_dashboard.php">
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
			
			<!-- Add Admin button -->
			<button id="addAdmin"><i class="fas fa-plus"></i> Add Admin</button>

            <!-- Add Admin modal -->
			<div id="addAdminModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h4 class="alert bg-success">Add Room</h4>
				<form id="sidebarForm" action="../class/add.php" method="post">
					<table>
						<tr>
							<td><label for="name">Name</label></td>
							<td><input type="text" id="nameAdd" name="a_name" required></td>
						</tr>
						<tr><td><label for="username">Username</label></td>
							<td><input type="text" id="usernameAdd" name="a_username" required></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="password" id="password" name="a_password" required></td>
						</tr>
						<tr>
							<td><label for="adminTypeAdd">User Type</label></td>
							<td>	
								<select id="adminTypeAdd" name="a_type">
									<option disabled selected>Select type</option>
									<option value="1">Admin</option>
									<option value="2">Staff</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right;">
								<button class="btn btn-primary" type="submit" id="saveButton" name="add_admin">SAVE</button>
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
				<div class="panel-body">
					<table class="table table_admin" id="adminTable">
						<thead>
							<tr>
                                <th style="width: 150px;">Name</th>
								<th style="width: 100px;">Username</th>
								<th style="width: 50px;">Type
									<br><sub>1=Admin, 2=Staff</sub></br>
								</th>
								<th style="width: 80px; text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
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
                                    echo '<td>
                                            <div class="btn-group center-buttons">			                                                								
												<a href="a_admin_info.php?id=' . $row['id'] . '">
												<button type="button" class="btn btn-primary btn-block">
													More
												</button>
											</a>
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
			
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php echo ("Admin type " . $_SESSION['admin_type']); ?>
<?php include '../admin/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="./js/admin.js"></script>

