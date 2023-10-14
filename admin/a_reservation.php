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
					<li><a class="active" href="a_reservation.php">
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
			<li><a href="a_history.php"><em class="fa-solid fa-clock-rotate-left">&nbsp;</em> History</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
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
			<p>
				<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
			<table style="width: 100%; border-collapse: collapse;">
				<tr>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Model</th>
					<th style="background-color: #c6c4fc; color: black; border: 1px solid #ddd; padding: 8px; text-align: left;">Category</th>
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

		<div id="Accepted" class="tabcontent">
			<p>This is the content for the Accepted Reservation tab.</p>
		</div>

		<?php
			include '../admin/footer.php';
		?>

		</div>
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
	  

</body>
</html>
