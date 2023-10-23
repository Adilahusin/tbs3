<?php
	include 'header.php';
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
			<li class="active"><a href="a_inventory.php"><em class="fa fa-boxes-stacked">&nbsp;</em> Inventory</a></li>
			<li><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Inventory</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Inventory</h1>
			</div>
		</div>
				
		<!-- Content -->
		<div class="tab">
			<button class="tablinks" onclick="openTab(event, 'New')" id="defaultOpen">New</button>
			<button class="tablinks" onclick="openTab(event, 'Old')">Old</button>
			<button class="tablinks" onclick="openTab(event, 'Lost')">Lost</button>
			<button class="tablinks" onclick="openTab(event, 'Damaged')">Damaged</button>
			<button class="tablinks" onclick="openTab(event, 'Total Items')">Total Items</button>
			<button class="tablinks" onclick="openTab(event, 'Borrowed')">Borrowed</button>
		</div>

		<div id="New" class="tabcontent">
			<p>
				<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Model</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Type</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Brand</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Quantity</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Quantity Left</th>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">HA2686</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">PA System</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Haier</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">15</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">8</td>
				</tr>
			</table>
		</div>
	</p>
		</div>

		<div id="Old" class="tabcontent">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table_item_old">
								<thead>
									<tr>
										<th>Type</th>
										<th>Brand</th>
										<th>Model No</th>
										<th>Quantity</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="Lost" class="tabcontent">
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table_item_lost">
								<thead>
									<tr>
										<th>Type</th>
										<th>Brand</th>
										<th>Model No</th>
										<th>Quantity</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="Damaged" class="tabcontent">
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table_item_damaged">
								<thead>
									<tr>
										<th>Type</th>
										<th>Brand</th>
										<th>Model No</th>
										<th>Quantity</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="Total Items" class="tabcontent">
			<p>This is the content for the Total Items tab.</p>
		</div>

		<div id="Borrowed" class="tabcontent">
			<p>This is the content for the Borrowed tab.</p>
		</div>

		<?php
			include '../admin/footer.php';
		?>
		
	</div>

	<!-- Script for Tab navigation -->
	<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    // Open the default tab on page load
    document.getElementById("defaultOpen").click();
	</script>


	
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	
</body>
</html>
