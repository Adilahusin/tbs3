<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';

	// to retrieve room id in the url
	function roomInfo($roomId) {
        global $pdo; 
    
        $itemInfoQuery = "SELECT * FROM room WHERE id = :roomId";
        
        $stmt = $pdo->prepare($itemInfoQuery);
        $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
        $stmt->execute();
        $data_roomInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['room_info'] = $data_roomInfo;
    }

	// Check if the 'id' parameter exists in the URL
	if (isset($_GET['id'])) {
    // Get the ID from the URL
    $itemId = $_GET['id'];

    // Call the function to retrieve item information based on the ID
    itemInfo($itemId);

    // Check if the item_info session variable exists and has data
    if (isset($_SESSION['item_info'])) {
        $itemInfoData = $_SESSION['item_info'];
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

			<!-- Add Room modal -->
			<div id="addRoomModal" class="modal">
			<div class="modal-content">
				<span class="close" id="closeModal">&times;</span>
				<h4 class="alert bg-success">Add Room</h4>
				<form id="sidebarForm" action="../class/add.php" method="post">
					<table>
						<tr>
							<td><label for="room_name">Room</label></td>
							<td><input type="text" id="room_name" name="room_name" required></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right;">
								<button class="btn btn-primary" type="submit" id="saveButton" name="add_room">SAVE</button>
								<button class="btn btn-danger" type="button" id="cancelButton">CANCEL</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			</div>

			<!-- Edit Room Modal -->
			<!-- <div id="editRoomModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeEditModal">&times;</span>
					<h4 class="alert bg-primary">Edit Room</h4>
					<form id="editForm" action="../class/edit.php" method="post">
						<input type="text" id="edit_room_name" name="room_name">
						<table>
							<tr>
								<td><label for="edit_room_name">Room</label></td>
								<td><input type="text" id="edit_room_name" name="room_name" required></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: right;">
									<button class="btn btn-primary" type="submit" id="editSaveButton" name="edit_room">SAVE</button>
									<button class="btn btn-danger" type="button" id="editCancelButton">CANCEL</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div> -->

			<div id="editRoomModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeEditRoomModal">&times;</span>
					<h4 class="alert bg-success">Edit Item</h4>
					<form action="../class/update2.php" method="post">
						<table style="width: 100%;">
							<?php foreach ($itemInfoData as $row) { ?>
								<tr>
									<td style="width: 40%;"><label for="type">Type</label></td>
									<td style="width: 60%;"><input type="text" id="type" name="i_type" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_type']); ?>"></td>
									<td><input type="hidden" name="item_id" value="<?php echo $itemId; ?>"></td> <!-- Hidden field to carry item ID -->
								</tr>
								<tr>
									<td><label for="brand">Brand</label></td>
									<td><input type="text" id="brand" name="i_brand" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_brand']); ?>"></td>
								</tr>
								<tr>
									<td><label for="modelNo">Model No.</label></td>
									<td><input type="text" id="modelNo" name="i_modelNo" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_modelNo']); ?>"></td>
								</tr>
								<tr>
									<td><label for="pbNo">PB No.</label></td>
									<td><input type="text" id="pbNo" name="i_PBno" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_PBno']); ?>"></td>
								</tr>
								<tr>
									<td><label for="vendor">Vendor</label></td>
									<td><input type="text" id="vendor" name="i_vendor" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_vendor']); ?>"></td>
								</tr>
								<tr>
									<td><label for="warranty">Warranty (Year)</label></td>
									<td><input type="text" id="warranty" name="i_warranty" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_warranty']); ?>"></td>
								</tr>
								<tr>
									<td><label for="datePurchase" class="input-label">Date Purchase</label></td>
									<td><input type="text" id="datePurchase" name="i_datepurchase" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_datepurchase']); ?>"></td>
								</tr>
								<tr>
									<td><label for="serialNo">Serial No.</label></td>
									<td><input type="text" id="serialno" name="i_serialno" required style="width: 100%;" value="<?php echo htmlspecialchars($row['i_serialno']); ?>"></td>
								</tr>
							<?php } ?>
						</table>
						<div style="text-align: right;">
							<button class="btn btn-primary" type="submit" id="updateButton">UPDATE</button>
						</div>
					</form>
				</div>
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (isset($_SESSION['room_data'])) {
									$data_room = $_SESSION['room_data'];
									//print_r ($data_room);

									foreach ($data_room as $row) {
										echo "<tr>";
										echo "<td>" . $row['room_name'] . "</td>";
										
										// Change format date
										$dateAdded = date("d-m-Y H:i:s", strtotime($row['room_date_added']));
										echo "<td>" . $dateAdded . "</td>";

										echo '<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
													<li><a href="?action=edit&room_name='.$row['room_name'].'">Edit</a></li>
													<li><a href="?action=delete&room_name=' . $row['room_name'] . '" class="delete-action">Delete</a></li>
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


<script src="./js/room.js"></script>

</body>
</html>
	
<?php
    } else {
        echo "Data not found.";
    }
} else {
    echo "No ID parameter found in the URL.";
}

include '../admin/footer.php';
?>

