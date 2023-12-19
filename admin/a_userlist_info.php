<?php
	include 'header.php';
	include '../fetchdata/fetch.php';
	include '../class/delete.php';

	// to retrieve user id in the url
	function userInfo($userId) {
        global $pdo; 
    
        $userInfo = "SELECT * FROM user WHERE id = :userId";
        
        $stmt = $pdo->prepare($userInfo);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $data_userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['user_info'] = $data_userInfo;
    }

	// Check if the 'id' parameter exists in the URL
	if (isset($_GET['id'])) {
    // Get the ID from the URL
    $userId = $_GET['id'];

    // Call the function to retrieve information based on the ID
    userInfo($userId);

    // Check if the user_info session variable exists and has data
    if (isset($_SESSION['user_info'])) {
        $userInfoData = $_SESSION['user_info'];
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
			<li class="active"><a href="a_userlist.php"><em class="fa fa-users">&nbsp;</em> User List</a></li>
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
				<li><a href="a_userlist.php">User List</a></li>
                <li class="active">User Info</li>
			</ol>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Info</h1>
			</div>
		</div><!--/.row-->

		<!-- Content -->
		<div style="color: #fff; text-align: right; padding: 10px;">

        <div class="button-container">
            <!-- Change Status button -->
			<button id="statusUser" type="button">
				Change Status <i class="fas fa-lock"></i>
			</button>

             <!-- Delete user button -->
             <button class="btn btn-danger" type="button" id="deleteUser">
				Delete <i class="fas fa-trash-alt"></i>
			</button>
        </div>

		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table admin_info">
							<tbody>
                                <?php
                                foreach ($userInfoData as $row) {
                                    echo "<tr>";
                                    echo "<td class='success col-sm-6'>User ID</td>";
                                    echo "<td class='u_id'>" . $row['u_id'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>User Name</td>";
                                    echo "<td class='u_name'>" . $row['u_name'] . "</td>";
                                    echo "</tr>";

									echo "<td class='success col-sm-6'>Contact Number</td>";
                                    echo "<td class='u_contact'>" . $row['u_contact'] . "</td>";
                                    echo "</tr>";

									echo "<td class='col-sm-6'>User Type</td>";
                                    echo "<td class='u_type'>";
                                    if ($row['u_type'] == 1) {
                                        echo "Staff/Lecturer";
                                    } elseif ($row['u_type'] == 2) {
                                        echo "Student";
                                    } 
                                    echo "</td>";
                                    echo "</tr>";

                                    echo "<td class='success col-sm-6'>Gender</td>";
                                    echo "<td class='u_gender'>";
                                    if ($row['u_gender'] == 1) {
                                        echo "Male";
                                    } elseif ($row['u_gender'] == 2) {
                                        echo "Female";
                                    } 
                                    echo "</td>";
                                    echo "</tr>";

                                    echo "<td class='col-sm-6'>Status</td>";
                                    echo "<td class='u_status'>";
                                    if ($row['u_status'] == 1) {
                                        echo "Active";
                                    } elseif ($row['u_status'] == 2) {
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
	<script src="./js/userlist_info.js"></script>


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
