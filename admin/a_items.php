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
			margin: 0px;
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
			<li class="active"><a href="a_items.php"><em class="fa fa-box-open">&nbsp;</em> Items</a></li>
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
				<li class="active">Items</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Items</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">
		
			<!-- Add Item button -->
			<button id="addItem"><i class="fas fa-plus"></i> Add Item</button>

			<div id="addItemModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h4 class="alert bg-success">Add Item</h4>
				<form id="sidebarForm" action="../class/add.php" method="post">
					<table>
						<tr>
							<td><label for="type">Type</label></td>
							<td><input type="text" id="type" name="i_type" required placeholder="eg: LCD"></td>
						</tr>
						<tr>
							<td><label for="brand">Brand</label></td>
							<td><input type="text" id="brand" name="i_brand" required></td>
						</tr>
						<tr>
							<td><label for="modelNo">Model No.</label></td>
							<td><input type="text" id="modelNo" name="i_modelNo" required></td>
						</tr>
						<tr>
							<td><label for="quantity">Quantity</label></td>
							<td><input type="text" id="quantity" name="i_quantity" required></td>
						</tr>
						<tr>
							<td><label for="pbNo">PB No.</label></td>
							<td><input type="text" id="pbNo" name="i_PBno" required></td>
						</tr>
						<tr>
							<td><label for="vendor">Vendor</label></td>
							<td><input type="text" id="vendor" name="i_vendor" required></td>
						</tr>
						<tr>
							<td><label for="warranty">Warranty (Year)</label></td>
							<td><input type="text" id="warranty" name="i_warranty" required></td>
						</tr>
						<tr>
							<td><label for="datePurchase" class="input-label">Date Purchase</label></td>
							<td><input type="text" id="datePurchase" name="i_datepurchase" required></td>
						</tr>
						<tr>
							<td><label for="serialNo">Serial No.</label></td>
							<td><input type="text" id="serialno" name="i_serialno" required></td>
						</tr>
						<tr>
							<td><label for="itemStatus">Item Status</label></td>
							<td>
								<select id="itemStatus" name="item_status">
									<option disabled selected>Select Status</option>
									<option value="1">New</option>
									<option value="2">Old</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="hidden" id="pic" name="i_PIC" value="<?php echo $_SESSION['admin_username']; ?>"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right;">
								<button class="btn btn-primary" type="submit" id="saveButton" name="add_item">SAVE</button>
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
					<table class="table table_item" id="itemTable">
						<thead>
							<tr>
								<th style="width: 180px;">Type</th>
								<th style="width: 180px;">Brand</th>
								<th style="width: 150px;">Model No</th>
								<th style="width: 120px;">Quantity</th>
								<th style="width: 120px;">Status
									<br><sub>Old >= 5 years</sub></br>
								</th>
								<th style="width: 100px;">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							// Check if the session variable exists
								if (isset($_SESSION['item_data'])) {
								
							// Retrieve the data from the session variable
								$data_item = $_SESSION['item_data'];
								//print_r ($data_item);

								foreach ($data_item as $row) {
									echo "<tr>";
									echo "<td>" . $row['i_type'] . "</td>";
									echo "<td>" . $row['i_brand'] . "</td>";
									echo "<td>" . $row['i_modelNo'] . "</td>";
									echo "<td>" . $row['i_quantity'] . "</td>";
									echo "<td>";
									if ($row['item_status'] == 1) {
										echo "NEW";
									} elseif ($row['item_status'] == 2) {
										echo "OLD";
									} else {
										echo "Unknown"; 
									}
									echo "</td>";
									echo '<td>
										<div class="btn-group">
										<a href="a_items_info.php">
												<button type="button" class="btn btn-primary btn-block">
													More Info
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

		<script src="./js/items.js"></script>

</body>
</html>

<?php include '../admin/footer.php'; ?>