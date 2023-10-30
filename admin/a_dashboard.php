<?php
	include 'header.php';
?>

	<!-- Content -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="a_dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
			<li><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="a_dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div>
		
		<!-- Content -->
		<div class="panel panel-container">
			<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding">
						<em class="fa fa-xl solid fa-boxes-stacked color-#008000;"></em>
						<div class="large" id="totalQuantity">Loading...</div>
						<div class="text-muted">Items</div>
					</div>
				</div>
			</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div class="large" id="totalUsers">Loading...</div>
							<div class="text-muted">Borrowers</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl solid fa-box-open color-orange"></em>
							<div class="large">*</div>
							<div class="text-muted">Things Borrowed</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fas fa-xl fa-user color-red"></em>
						<div class="large" id="totalAdmin">Loading...</div>
							<div class="text-muted">Admin</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div style="text-align: center; font-size: 24px;">
			Calendar of Reservation
		</div>

		<div style="display: flex; align-items: center; justify-content: center; flex-direction: column; height: 100%; margin: 0;">
    <div class="calendar-container" style="position: relative; display: flex; flex-direction: column; align-items: center;">
        <div id="calendar" style="width: 300px; height: 300px; border: 1px solid #ccc; z-index: 0;"></div>
    </div>
</div>

	
<?php include '../admin/footer.php'; ?>

</div>
</div>

	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>

	<script>
    // Function to fetch and update the total quantity of items
    function updateTotalQuantity() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total quantity of items
            dataType: 'json',
            success: function(data) {
                $('#totalQuantity').text(data.totalQuantity);
            },
            error: function() {
                $('#totalQuantity').text('-');
            }
        });
    }

    // Function to fetch and update the total number of users
    function updateTotalUsers() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total number of users
            dataType: 'json',
            success: function(data) {
                $('#totalUsers').text(data.totalUsers);
            },
            error: function() {
                $('#totalUsers').text('-');
            }
        });
    }

	// Function to fetch and update the total number of users
    function updateTotalAdmin() {
        $.ajax({
            url: '../class/calculate.php', // URL to fetch total number of users
            dataType: 'json',
            success: function(data) {
                $('#totalAdmin').text(data.totalAdmin);
            },
            error: function() {
                $('#totalAdmin').text('-');
            }
        });
    }

    // Call both update functions when the page loads
    $(document).ready(function() {
        updateTotalQuantity();
        updateTotalUsers();
		updateTotalAdmin();
    });
</script>
