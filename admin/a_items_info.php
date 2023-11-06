<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';
?>

<!DOCTYPE html>
<html>
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

			<!-- Add Quantity Sidebar -->
			<div id="sidebar">
				<form id="sidebarForm" action="../class/add.php" method="post">
				<br><br>
				<h4 class="alert bg-success" style="text-align: left;">Add Quantity</h4>

					<label for="quantity">Quantity</label>
					<input type="int" id="quantity" name="i_quantity" required><br>

					<label for="pic">Person-in-Charge</label>
					<input type="text" id="pic" name="i_PIC" required><br><br>

					<button class="btn btn-primary btn-block" type="submit" id="saveButton" name="add_quantity">
						SAVE
					</button><br>

					<button class="btn btn-danger btn-block cancel_button" type="button" id="cancelButton">
						CANCEL
					</button>
				</form>
			</div>

		</div>

		<!-- <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table_item_info" id="itemInfoTable">
						<thead>
							<tr>
								<th>Type</th>
								<th>Brand</th>
								<th>Model No</th>
								<th>Quantity</th>
								<th>Date Added</th>
								<th>Status
									<br><sub>1=Active, 2=Inactive</sub></br>
								</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>				
				</div>
			</div>
		</div>
		</div> -->

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
				</div><!-- panel -->
			</div><!-- panel -->
		</div>

<!-- For sidebar -->
<script>
        $(document).ready(function() {

            $("#addQty").click(function() {
                $("#sidebar").css("right", "0");
                $("#content").css("margin-right", "250px");
            });
			
            $("#cancelButton").click(function() {
                $("#sidebar").css("right", "-300px");
                $("#content").css("margin-right", "0");

				// Clear input fields when the sidebar is closed
				$("#quantity").val("");
				$("#pic").val("");
            });
        });
</script>

</body>
</html>

<?php include '../admin/footer.php'; ?>