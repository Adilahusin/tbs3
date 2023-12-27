<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';

	// to retrieve item id in the url
	function itemInfo($itemId) {
        global $pdo; 
    
        $itemInfoQuery = "SELECT item.*, item_stock.item_status 
							FROM item 
							INNER JOIN item_stock ON item.id = item_stock.item_id 
							WHERE item.id = :itemId";
        
        $stmt = $pdo->prepare($itemInfoQuery);
        $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        $stmt->execute();
        $data_itemInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['item_info'] = $data_itemInfo;
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
            cursor: pointer; /* make the "×" clickable */
        }

		button.btn.btn-primary.btn-block {
    		width: auto;
			margin-left: auto;
			display: block;
		}

		.form-group {
			display: block; /* Display label and input on separate lines */
			width: 100%; /* Make the label and input full width of the container */
		}

		.form-group label {
			display: block; /* Display the label on its line */
			margin-bottom: 7px; /* space between label and input */
		}

		.form-group input, .form-group select, .form-group textarea {
			width: 100%; 
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
				<li><a href="a_items.php">Items</a></li>
                <li class="active">Items Info</li>
			</ol>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Items Info</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">

        <div class="button-container">

            <!-- Add Quantity button -->
			<button id="addQty">Add Quantity <i class="fas fa-plus"></i></button>

            <!-- Edit Item button -->
			<button id="editItem">
				Edit Item <i class="fas fa-edit"></i>
			</button>

            <!-- Change Status button -->
			<button id="changeStatus">Change Status <i class="fas fa-lock"></i></button>

			<!-- Delete Item button -->
			<button class="btn btn-danger" type="button" id="deleteItem">
				Delete <i class="fas fa-trash-alt"></i>
			</button>

        </div>

			<!-- Add Qty Modal -->
			<div id="addQtyModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeAddQtyModal">&times;</span>
					<h4 class="alert bg-success">Add Quantity</h4>
					<form action="../class/update.php" method="post">
						<table style="width: 100%;">
							<tr>
								<td style="width: 30%;"><label for="quantity">Quantity</label></td>
								<td style="width: 70%;"><input type="text" id="quantity" name="added_quantity" style="width: 100%;"></td>
								<td><input type="hidden" name="item_id" value="<?php echo $itemId; ?>"></td> <!-- Hidden field to carry item ID -->
							</tr>
						</table>	
						<div style="text-align: right; margin-top: 15px;">
							<button class="btn btn-primary" type="submit" id="updateButton">UPDATE</button>						
						</div>
					</form>
				</div>
			</div>


			<!-- Edit Item Modal -->
			<div id="editItemModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeEditItemModal">&times;</span>
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


			<!-- Change Status Modal -->
			<div id="changeStatusModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeChangeStatusModal">&times;</span>
					<h4 class="alert bg-success">Change Status</h4>
					<form action="../class/update2.php" method="POST">
						
					<div class="form-group">
						<input type="hidden" id="itemId" name="item_id" value="<?php echo $itemId; ?>" readonly>

							<label for="status">Status:</label>
							<select id="status" name="status" required>
								<option disabled selected>Select status</option>
								
								<?php foreach ($itemInfoData as $row) {
									$status = $row['item_status'];
									echo "<option value='1'" . ($status == 1 ? " selected" : "") . ">New</option>";
									echo "<option value='2'" . ($status == 2 ? " selected" : "") . ">Old</option>";
									echo "<option value='3'" . ($status == 3 ? " selected" : "") . ">Lost</option>";
									echo "<option value='4'" . ($status == 4 ? " selected" : "") . ">Damage</option>";
								} ?>
							</select>
					</div>
					<div class="form-group">
						<label for="quantity">Quantity:</label>
						<input type="text" id="quantity" name="quantity" required>
					</div>
					<div class="form-group">
						<label for="remarks">Remarks:</label>
						<textarea id="remarks" name="remarks"></textarea>
					</div>
	
					<button class="btn btn-primary btn-block" type="submit" id="changeStatusItem" name="change_status">
						SAVE
					</button>
					</form>
				</div>
			</div>
			
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table items_info">
							<tbody>
                                <?php
                                foreach ($itemInfoData as $row) {
                                    echo "<tr>";
                                    echo "<td class='success col-sm-6'>Serial No</td>";
                                    echo "<td class='i_serialno'>" . $row['i_serialno'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Type</td>";
                                    echo "<td class='i_type'>" . $row['i_type'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Brand</td>";
                                    echo "<td class='i_brand'>" . $row['i_brand'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Model No</td>";
                                    echo "<td class='i_modelNo'>" . $row['i_modelNo'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Quantity</td>";
                                    echo "<td class='i_quantity'>" . $row['i_quantity'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>PB No.</td>";
                                    echo "<td class='i_PBno'>" . $row['i_PBno'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Vendor</td>";
                                    echo "<td class='i_vendor'>" . $row['i_vendor'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Warranty</td>";
									echo "<td class='i_warranty'>" . $row['i_warranty'] . " Year</td>";
									echo "</tr>";

									echo "<td class='success col-sm-6'>Date Purchase</td>";
                                    echo "<td class='i_datepurchase'>" . $row['i_datepurchase'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Person-in-Charge</td>";
                                    echo "<td class='i_PIC'>" . $row['i_PIC'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Status</td>";
                                    echo "<td class='i_status'>";
                                    if ($row['i_status'] == 1) {
                                        echo "Active";
                                    } elseif ($row['i_status'] == 2) {
                                        echo "Inactive";
                                    } 
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="./js/items_info.js"></script>


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