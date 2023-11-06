<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	//include '../fetchdata/fetch_new2.php';
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999; /* Higher z-index value */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1000; /* Higher z-index value */
        }

        .close {
            color: #888;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #000;
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
			<li class="active"><a href="a_room.php"><em class="fa-solid fa-door-open">&nbsp;</em> Room</a></li>
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
				<li class="active">Room</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Room</h1>
			</div>
		</div>

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">
			
			<!-- Add Room button -->
			<button id="addRoom"><i class="fas fa-plus"></i> Add Room</button>

			<div id="sidebar">
				<form id="sidebarForm" action="../class/add.php" method="post">
				<h4 class="alert bg-success" style="text-align: left;">Add Room</h4>

					<label for="room_name">Room</label>
					<input type="text" id="room_name" name="room_name" required><br><br>

					<button class="btn btn-primary btn-block" type="submit" id="saveButton" name="add_room">
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
				<div class="panel-body">
					<table class="table table_room" id="roomTable">
						<thead>
							<tr>
								<th>Room/Lab Name</th>
								<th>Date Added</th>
								<th>Status
									<br><sub>1=Active, 2=Inactive</sub></br>
								</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// Check if the session variable exists
								if (isset($_SESSION['room_data'])) {
								
									// Retrieve the data from the session variable
									$data_room = $_SESSION['room_data'];
									//print_r ($data_room);

									foreach ($data_room as $row) {
										echo "<tr>";
										echo "<td>" . $row['room_name'] . "</td>";
										
										// Change format date
										$dateAdded = date("d-m-Y H:i:s", strtotime($row['room_date_added']));
										echo "<td>" . $dateAdded . "</td>";

										echo "<td>" . $row['room_status'] . "</td>";
										echo '<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
													<li><a href="#" class="edit-action" data-room_name="' . $row['room_name'] . '" id="updateRoom">Edit</a></li>
													<li><a href="?action=delete&room_name=' . $row['room_name'] . '" class="delete-action">Delete</a></li>
													<li><a href="#" class="deactivate-action">Deactivate</a></li>
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
				
				</div>
			</div>
		</div>
		</div>

		<!-- <div class="container box">
  <h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
  <br />
  <div class="table-responsive">
    <br />
    <div align="right">
      <button type="button" id="add_button" data-toggle="modal" data-target="#roomModal" class="btn btn-info btn-lg">Add Room</button>
    </div>
    <br /><br />
    <table id="room_data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="35%">Room Name</th>
          <th width="35%">Date Added</th>
          <th width="10%">Status</th>
          <th width="10%">Edit</th>
          <th width="10%">Delete</th>
        </tr>
      </thead>
    </table>
  </div>
</div> -->

		<!-- Edit Room Modal -->
		<div id="roomModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h2>Edit Room Name</h2>
				
				<form id="editForm" action="../class/update.php" method="post">
					<label for="editRoomName">Room Name:</label>
					<input type="text" id="editRoomName" name="room_name">

					<button class="btn btn-primary" type="submit" name="update_room" id="saveButton">
						Save
					</button>
				</form>
			</div>
		</div>

<!-- For sidebar -->
<script>
        $(document).ready(function() {

            $("#addRoom").click(function() {
                $("#sidebar").css("right", "0");
                $("#content").css("margin-right", "250px");
            });

            $("#cancelButton").click(function() {
                $("#sidebar").css("right", "-300px");
                $("#content").css("margin-right", "0");

			// Clear input fields when the sidebar is closed
			$("#room_name").val("");

            });

		// For sorting the data in table
		$('#roomTable').DataTable({
			"columnDefs": [
				{ "targets": [2], "type": "num" } // Specify columns with numeric data
			]
		});

		// Update script
        $("#roomModal").hide();
		$(document).on('click', '.edit-action', function() {
        var room_name = $(this).data("room_name");
        // Show the modal using jQuery
        $('#roomModal').show();
        // Set the value in the modal input field
        $("#editRoomName").val(room_name);
		});
	
		// Handle the modal close button and outside click using jQuery
		$("#closeModal").click(function() {
			// Hide the modal using jQuery
			$('#roomModal').hide();
		});

		// Handle clicks outside the modal to close it using jQuery
		$(document).on('click', function(e) {
			if ($(e.target).is('#roomModal')) {
				// Hide the modal using jQuery
				$('#roomModal').hide();
			}
		});

		$("#editForm").submit(function(e) {
    e.preventDefault();

    var roomName = $("#room_name").val();
    var newRoomName = $("#editRoomName").val();
    console.log("room_name:", roomName);
    console.log("new_room_name:", newRoomName);

    // Send the data to the PHP script
    $.ajax({
        type: "POST",
        url: "../class/update.php",
        data: {
            room_name: roomName,
            new_room_name: newRoomName
        },
        success: function(response) {
            console.log("AJAX response:", response); // Log the entire response
            try {
                response = JSON.parse(response); // Attempt to parse the JSON response
                console.log("Parsed response:", response); // Log the parsed response
                if (response.success) {
                    // Success: Show a success notification
                    alert("Room name updated successfully.");
                    // Close the modal
                    $('#roomModal').hide();
                    // Reload the table with updated data
                    roomDataTable.ajax.reload();
                } else {
                    // Error: Show an error notification with additional error information
                    alert("Error updating room name. Error: " + response.message);
                }
            } catch (error) {
                // Handle JSON parse error
                console.error("JSON parse error:", error);
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            alert("AJAX Error: " + error);
        }
    });
});


});
</script>


</body>
</html>
	
<?php include '../admin/footer.php'; ?>

