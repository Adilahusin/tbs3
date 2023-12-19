<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';

	// to retrieve admin id in the url
	function adminInfo($adminId) {
        global $pdo; 
    
        $adminInfoQuery = "SELECT * FROM admin WHERE id = :adminId";
        
        $stmt = $pdo->prepare($adminInfoQuery);
        $stmt->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $stmt->execute();
        $data_adminInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['admin_info'] = $data_adminInfo;
    }

	// Check if the 'id' parameter exists in the URL
	if (isset($_GET['id'])) {
    // Get the ID from the URL
    $adminId = $_GET['id'];

    // Call the function to retrieve information based on the ID
    adminInfo($adminId);

    // Check if the admin_info session variable exists and has data
    if (isset($_SESSION['admin_info'])) {
        $adminInfoData = $_SESSION['admin_info'];
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
			<li><a href="a_items.php"><em class="fa fa-box-open">&nbsp;</em> Items</a></li>
			<li><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
			<li><a href="a_room.php"><em class="fa-solid fa-door-open">&nbsp;</em> Room</a></li>
			<li><a href="a_inventory.php"><em class="fa fa-boxes-stacked">&nbsp;</em> Inventory</a></li>
			<li class="active"><a href="a_admin.php"><em class="fa-solid fa-user-gear">&nbsp;</em> Admin</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="a_dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="a_admin.php">Admin</a></li>
                <li class="active">Admin Info</li>
			</ol>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Info</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">

        <div class="button-container">
            <!-- Edit Admin button -->
			<button id="editAdmin">
				Edit Admin <i class="fas fa-edit"></i>
			</button>

			<!-- Change Status button -->
			<button id="statusAdmin" type="button">
				Change Status <i class="fas fa-lock"></i>
			</button>

             <!-- Delete admin button -->
			<button class="btn btn-danger" type="button" id="deleteAdmin">
				Delete <i class="fas fa-trash-alt"></i>
			</button>

        </div>

			<!-- Edit Admin Modal -->
			<div id="editAdminModal" class="modal">
				<div class="modal-content">
					<span class="close" id="closeEditAdminModal">&times;</span>
					<h4 class="alert bg-success">Edit Admin</h4>
					<form action="../class/update2.php" method="post">
						<table style="width: 100%;">
							<?php foreach ($adminInfoData as $row) { ?>
								<tr>
									<td style="width: 40%;"><label for="type">Name</label></td>
									<td style="width: 60%;"><input type="text" id="name" name="a_name" required style="width: 100%;" value="<?php echo htmlspecialchars($row['a_name']); ?>"></td>
									<td><input type="hidden" name="admin_id" value="<?php echo $adminId; ?>"></td> <!-- Hidden field to carry Admin ID -->
								</tr>
								<tr>
									<td><label for="username">Username</label></td>
									<td><input type="text" id="username" name="a_username" required style="width: 100%;" value="<?php echo htmlspecialchars($row['a_username']); ?>"></td>
								</tr>
								<tr>
									<td><label for="type">Type</label></td>
									<td>
                                        <select id="type" name="a_type" required style="width: 100%;">
                                            <option disabled selected>Select type</option>
                                            <option value="1" <?php if ($row['a_type'] == '1') echo 'selected'; ?>>Admin</option>
                                            <option value="2" <?php if ($row['a_type'] == '2') echo 'selected'; ?>>Staff</option>
                                        </select>
                                    </td>
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
						<table class="table admin_info">
							<tbody>
                                <?php
                                foreach ($adminInfoData as $row) {
                                    echo "<tr>";
                                    echo "<td class='success col-sm-6'>Name</td>";
                                    echo "<td class='a_name'>" . $row['a_name'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Username</td>";
                                    echo "<td class='a_username'>" . $row['a_username'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Type</td>";
                                    echo "<td class='a_type'>";
                                        if ($row['a_type'] == '1') {
                                            echo "Admin";
                                        } elseif ($row['a_type'] == '2') {
                                            echo "Staff";
                                        }
                                    echo "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>Status</td>";
                                    echo "<td class='a_status'>";
                                    if ($row['a_status'] == 1) {
                                        echo "Active";
                                    } elseif ($row['a_status'] == 2) {
                                        echo "Deactivated";
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
	<script src="./js/admin_info.js"></script>


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
