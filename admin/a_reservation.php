<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
?>

<!DOCTYPE html>
<html>
<head>
	<style>
        /* Style for tabs */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #c6c4fc;
        }

        .tab button.active {
            background-color: #7370c9;
			color: #fff;
        }

        /* Style for tab content */
        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
        }

		.borrowButton {
			background-color: #7370c9;
			color: #fff;
			border: none;
			padding: 8px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			margin: 4px 2px;
			transition-duration: 0.4s;
			cursor: pointer;
			border-radius: 4px;
		}

		/* Hover effect for the Borrow button */
		.borrowButton:hover {
			background-color: #8c8ac8;
		}
    </style>
</head>

<body>
	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">	
		<ul class="nav menu">
			<li><a href="a_dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa-solid fa-file-circle-check">&nbsp;</em> Transaction <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="active" href="a_reservation.php">
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
			<li><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
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
				<li class="active">Reservation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservation</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div class="tab">
			<button class="tablinks" onclick="openTab(event, 'Pending')" id="defaultOpen">Pending Reservation</button>
			<button class="tablinks" onclick="openTab(event, 'Accepted')">Accepted Reservation</button>
		</div>

		<div id="Pending" class="tabcontent">
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table_pending" id="tablePending">
								<thead>
									<tr>
										<th>Staff/Student ID</th>
										<th>Name</th>
										<th>Items</th>
										<th>Reservation Date</th>
										<th>Room/Lab</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									if (isset($_SESSION['pending_reservations']) && is_array($_SESSION['pending_reservations']) && count($_SESSION['pending_reservations']) > 0) {
										foreach ($_SESSION['pending_reservations'] as $pending) {
											echo "<tr>";
											echo "<td>" . $pending['u_id'] . "</td>"; 
											echo "<td>" . $pending['u_name'] . "</td>"; 
											echo "<td>" . $pending['i_type'] . "</td>"; 
											echo "<td>" . date('F d, Y H:i:s A', strtotime($pending['reserve_date'].' '.$pending['reserve_time'])) . "</td>"; 
											echo "<td>" . $pending['room_name'] . "</td>";
											// echo "<td>" . $pending['reservation_code'] . "</td>";
											echo "<td>";
											echo "											
												<button class='btn btn-primary btn-accept acceptButton' data-id='".$pending['reservation_code']."'>
													Accept
													<i class='fa fa-chevron-right'></i>
												</button>
																						
												<button class='btn btn-danger btn-cancel cancelButton' 
												data-id='".$pending['reservation_code']."' 
												data-toggle='modal' 
												data-target='#cancelModal'>
												Cancel
												<i class='fa fa-remove'></i>
												</button>
											";
											echo "</td>";
											echo "</tr>";
										}
									} else {
										echo "<tr><td colspan='6'>No pending reservations found.</td></tr>";
									}
									?>

								</tbody>
							</table>
						
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="Accepted" class="tabcontent">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table_accepted">
								<thead>
									<tr>
										<th>Stadd/Student ID</th>
										<th>Name</th>
										<th>Items</th>
										<th>Reservation Date</th>
										<th>Room/Lab</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>20231123</td>
										<td>Izzah Daud</td>
										<td>LCD 1</td>
										<td>December 01, 2023 12:25:00 PM</td>
										<td>1A3</td>
										<td><button class="btn btn-primary borrowButton">Borrow</button></td>
									</tr>
                        		</tbody>
							</table>					
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Cancel Modal -->
		<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="cancelForm" action="../class/custom.php" method="POST">>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Cancel Reservation</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Reservation Code</label>
								<input type="text" name="cancel_reservation_code" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label>Cancellation Remarks</label>
								<textarea name="remarks_cancel" class="form-control" required style="height: 200px"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php include '../admin/footer.php'; ?>

		</div>
	</div>

	<script src="./js/reservation.js"></script>

	<!-- shows each reservation code in cancel modal -->
	<script>
        const cancelButtons = document.querySelectorAll('.cancelButton');
        const modalReservationCode = document.querySelector('input[name="cancel_reservation_code"]');

        cancelButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                
                const reservationCode = button.getAttribute('data-id');
                
                // Set the reservation code as the value for the input in the modal
                modalReservationCode.value = reservationCode;
            });
        });
    </script>

	
<!-- shows each reservation code in alert when click accept -->
	<!-- <script>
		const acceptButtons = document.querySelectorAll('.acceptButton');

		acceptButtons.forEach(function(button) {
			button.addEventListener('click', function(event) {
				event.preventDefault();
				const reservationCode = button.getAttribute('data-id');
				alert('Reservation code: ' + reservationCode);
			});
		});
	</script> -->


</body>
</html>
