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

			<div id="sidebar">
				<form id="sidebarForm" action="../class/add.php" method="post">
				<!-- <h4 class="alert bg-success" style="text-align: left;">Add User</h4> -->

					<br><br><br>
					<label for="userid">Staff/Student No.</label>
					<input type="text" id="userid" name="u_id" required><br>

					<label for="name">Name</label>
					<input type="text" id="name" name="u_name" required><br>

					<label for="contactno">Contact No.</label>
					<input type="text" id="contactno" name="u_contact" required><br>

					<label for="userType">User Type</label>
					
					<select id="userType" name="u_type">
						<option disabled selected>Select type</option>
						<option value="1">Staff/Lecturer</option>
						<option value="2">Student</option>
					</select><br>

					<label for="genderType">Gender</label>
					
					<select id="genderType" name="u_gender">
						<option disabled selected>Select gender</option>
						<option value="1">Male</option>
						<option value="2">Female</option>
					</select><br>

					<label for="password">Password</label>
					<input type="password" id="password" name="u_password" required><br>

					<button class="btn btn-primary btn-block" type="submit" id="saveButton" name="add_user">
						SAVE
					</button><br>

					<button class="btn btn-danger btn-block cancel_button" type="button" id="cancelButton">
						CANCEL
					</button>
				</form>
			</div>

		</div>

		<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body"><br><br>
				<table class="table table_user" id="userTable"> 
					<thead>
						<tr>
							<th data-sort="id">Staff/Student ID</th>
							<th data-sort="name">Name</th>
							<th data-sort="contact">Contact No.</th>
							<th data-sort="type">Type
								<br><sub>1=Staff, 2=Student</sub></br>
							</th>
							<th>Action</th>
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

<!-- For sidebar -->
<script>
    $(document).ready(function() {

        $("#addUser").click(function() {
            $("#sidebar").css("right", "0");
            $("#content").css("margin-right", "250px");
        });

        $("#cancelButton").click(function() {
        	$("#sidebar").css("right", "-300px");
            $("#content").css("margin-right", "0");

			// Clear input fields when the sidebar is closed
			$("#userid").val("");
			$("#name").val("");
			$("#contactno").val("");
			$("#userType").prop('selectedIndex', 0); // Reset the dropdown
			$("#gender").prop('selectedIndex', 0); // Reset the dropdown
			$("#password").val("");
        });

		// For sorting the data in table
		$('#userTable').DataTable({
			"columnDefs": [
				{ "targets": [0, 3], "type": "num" } // Specify columns with numeric data
			]
		});

// // Handle "Deactivate" button click
//     $('#userTable').on('click', '.deactivate-action', function(e) {
//         e.preventDefault(); // Prevent the default link behavior

//         var userId = $(this).attr('href').split('=')[1]; // Extract user ID from the link

//         // Send an AJAX request to update the user's status
//         $.ajax({
//             type: 'POST',
//             url: '../class/update.php',
//             data: { u_id: userId },
//             success: function(response) {
//                 // Handle the response from the server (e.g., show a success message)
//                 alert(response);
//                 // You may also update the user's status in the table without refreshing the page
//             },
//             error: function(error) {
//                 // Handle errors
//                 console.error('Error:', error);
//             }
//         });
//     });

});
</script>

</body>
</html>

<?php include '../admin/footer.php'; ?>
