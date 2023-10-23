<?php
	include 'header.php';
?>

	<!-- Sidebar -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>

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
					<li><a class="active" href="a_borrowed.php">
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
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Borrowed Items</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Borrowed Items</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">
			
			<!-- Search input field with search icon -->
			<div style="position: relative; display: inline-block;">
			  <input type="text" placeholder="Search..." style="background-color: #fff; border: 1px solid #7370c9; border-radius: 5px; padding: 5px 30px; color: black; height: 30px;">
			  <button style="position: absolute; top: 0; right: 0; bottom: 0; background-color: #7370c9; border: none; border-radius: 0 5px 5px 0; padding: 5px 10px; color: #fff; height: 30px;">
				<i class="fas fa-search"></i>
			  </button>
			</div>

		</div>

		<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Item</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Reservation Date</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Room</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Remarks**</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Action</th>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Aisyah Su</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">LCD Projector</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">10/5/23</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Lab 1B1</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button style="background-color: green; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Return</button>
                    </td>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Zulkifli Samad</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Extension</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">10/5/23</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Lab 2C1</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Not working</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button style="background-color: green; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Return</button>
                    </td>
				</tr>
			</table>
		</div>

		<?php
			include '../admin/footer.php';
		?>
		
		</div><!--/.row-->
	</div>	<!--/.main-->

