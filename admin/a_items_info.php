<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';
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
            width: 80%;
			text-align: left;
			color: black;
			width: 50%;
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
			<button id="addQty">Add Quantity</button>

            <!-- Edit Item button -->
			<button id="editItem">Edit Item</button>

             <!-- Change Status button -->
			<button id="changeStatus">Change Status</button>

        </div>

			<!-- Add Qty Modal -->
			<div id="addQtyModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeAddQtyModal">&times;</span>
					<h4 class="alert bg-success">Add Quantity</h4>
					<form>
						<div class="form-group">
							<label for="quantity">Quantity</label>
							<input type="text" id="quantity" name="i_quantity">
						</div>
						<button class="btn btn-primary btn-block" type="submit" id="" name="">
							SAVE
						</button>
					</form>
				</div>
			</div>

			<!-- Edit Item Modal -->
			<div id="editItemModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeEditItemModal">&times;</span>
					<h4 class="alert bg-success">Edit Item</h4>
					<form>
						<div class="form-group">
							<label for="itemDescription">Item Description:</label>
							<input type="text" id="itemDescription" name="item_description">
						</div>
						<div class="form-group">
							<label for="quantity">Quantity:</label>
							<input type="number" id="quantity" name="quantity" required>
						</div>
						<div class="form-group">
							<label for="remarks">Remarks:</label>
							<textarea id="remarks" name="remarks"></textarea>
						</div>
						<button class="btn btn-primary btn-block" type="submit" id="" name="">
							SAVE
						</button>
					</form>
				</div>
			</div>

			<!-- Change Status Modal -->
			<div id="changeStatusModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeChangeStatusModal">&times;</span>
					<h4 class="alert bg-success">Change Status</h4>
					<form>
						<div class="form-group">
							<label for="status">Status:</label>
							<select id="status" name="status" required>
								<option disabled selected>Select status</option>
								<option value="old">Old</option>
								<option value="lost">Lost</option>
								<option value="damage">Damage</option>
							</select>
						</div>
						<div class="form-group">
							<label for="quantity">Quantity:</label>
							<input type="number" id="quantity" name="quantity" required>
						</div>
						<div class="form-group">
							<label for="remarks">Remarks:</label>
							<textarea id="remarks" name="remarks"></textarea>
						</div>
						<button class="btn btn-primary btn-block" type="submit" id="" name="">
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
						<table class="table ">
							<thead>
							
							</thead>
							<tbody>
								<tr>
									<td class="success col-sm-6">Serial No</td>
									<td class="i_serialno"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Type</td>
									<td class="i_type"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Brand</td>
									<td class="i_brand"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Model No</td>
									<td class="i_modelNo"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Quantity</td>
									<td class="i_quantity"></td>
								</tr>
								<tr>
									<td class="col-sm-6">PB No</td>
									<td class="i_PBno"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Vendor</td>
									<td class="i_vendor"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Warranty</td>
									<td class="i_warranty"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Date Purchase</td>
									<td class="i_datepurchase"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Person-in-Charge</td>
									<td class="i_PIC"></td>
								</tr>
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

<?php include '../admin/footer.php'; ?>