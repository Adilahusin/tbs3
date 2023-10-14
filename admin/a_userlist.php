<?php
	include 'header.php';
?>

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
			<li class="active"><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
			<li><a href="a_room.php"><em class="fa-solid fa-door-open">&nbsp;</em> Room</a></li>
			<li><a href="a_inventory.php"><em class="fa fa-boxes-stacked">&nbsp;</em> Inventory</a></li>
			<li><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
			<li><a href="a_history.php"><em class="fa-solid fa-clock-rotate-left">&nbsp;</em> History</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User List</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User List</h1>
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
		  
			<!-- Add User button with margin -->
			<button style="background-color: #7370c9; border: none; border-radius: 5px; padding: 5px 10px; margin-left: 10px; height: 30px;" 
			onclick="alert('Add User button clicked!')">Add User</button>
		  </div>		  

		<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">ID Number</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Contact No.</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Type</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Action</th>
				</tr>
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">200451</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Aisyah Su</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">0198523648</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Student</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button style="background-color: #007BFF; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Info</button>
                    </td>
				</tr>
				
				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">200685</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Hazreen Rosli</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">0196325847</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Student</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button style="background-color: #007BFF; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Info</button>
                    </td>
				</tr>

				<tr>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">10035</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Faiz Mansor</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">0172589643</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Lecturer</td>
					<td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button style="background-color: #007BFF; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Info</button>
                    </td>
				</tr>
			</table>
		</div>
			
		<?php
			include '../admin/footer.php';
		?>
		
		</div><!-- /.row -->
	</div><!--/.main-->

