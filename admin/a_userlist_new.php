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

		.form-group {
			display: flex;
			justify-content: space-between;
		}

		.form-group-half {
			width: 70%; 
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

			<!-- Add User Modal -->
			<div id="addUserModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h4 class="alert bg-success">Add User</h4>
				<form id="sidebarForm" action="../class/add.php" method="post">
					<label for="userid">Staff/Student No.</label>
					<input type="text" id="userid" name="u_id" required><br>

					<label for="name">Name</label>
					<input type="text" id="name" name="u_name" required><br>

					<label for="contactno">Contact No.</label>
					<input type="text" id="contactno" name="u_contact" required><br>

					<!-- Gender and Select Type fields wrapped in a container -->
					<div class="form-group">
						<div class="form-group-half">
							<label for="userType">User Type</label>
							<select id="userType" name="u_type">
								<option disabled selected>Select type</option>
								<option value="1">Staff/Lecturer</option>
								<option value="2">Student</option>
							</select>
						</div>
						<div class="form-group-half">
							<label for="genderType">Gender</label>
							<select id="genderType" name="u_gender">
								<option disabled selected>Select gender</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
							</select>
						</div>
					</div>

					<label for="password">Password</label>
					<input type="password" id="password" name="u_password" required><br>

					<div style="display: flex; justify-content: space-between;">
						<button class="btn btn-primary" type="submit" id="saveButton" name="add_user">SAVE</button>
						<button class="btn btn-danger" type="button" id="cancelButton">CANCEL</button>
					</div>

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

});
</script>

<script>
    // Get references to the modal and the button to open/close it
    var modal = document.getElementById('addUserModal');
    var openModalButton = document.getElementById('addUser');
    var closeModalButton = document.getElementById('closeModal');
	var cancelButton = document.getElementById('cancelButton');

    // Function to open the modal
    function openModal() {
        modal.style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        modal.style.display = 'none';
		form.reset(); // Reset the form
    }

    // Event listeners to open and close the modal
    openModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);

	// Event listener to close the modal when clicking the "Cancel" button
    cancelButton.addEventListener('click', closeModal);

	// Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target == addUserModal) {
            closeModal();
        }
    });

</script>

</body>
</html>

<?php include '../admin/footer.php'; ?>
