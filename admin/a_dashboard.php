<?php
	require_once 'session.php';
?>

<!-- Header -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UiTM Tools Borrowing System</title>
	
	<!-- bootstrap -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<!--<link href="../assets/custom/css/styles.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<!-- Icon Browser -->
    <link rel="shortcut icon" type="x-icon" href="uitm.png">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Calendar -->
	<link rel="stylesheet" type="text/css" href="../assets/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/datetimepicker/datetimepicker.css">

	<!-- toastr -->
	<link rel="stylesheet" type="text/css" href="../assets/toastr/css/toastr.css">

	<!-- Sidebar CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css-sidebar/css-sidebar.css">

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Include DataTables library -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </button>
				
                <a class="navbar-brand" href="#"><span>UiTM</span>TBS</a>
				
				<ul class="nav navbar-top-links navbar-right">					
				<!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<em class="fa-solid fa-clock"></em><span class="label label-danger"></span>
				</a> -->
						
					<!-- Due Borrow -->
					<!-- <ul class="dropdown-menu dropdown-messages">
						<li>
							<div class="dropdown-messages-box">
								<div class="message-body">
									<a href="#"><strong>Aisyah Su</strong> reserved LCD.</a>
								</div>
							</div>
						</li>
						</ul>
				</li> -->

					<!-- Reservation -->
					<!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info"></span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message</div>
							</a></li>
						</ul>
					</li> -->

                    <!-- Account -->
                    <li class="dropdown"><a class="" data-toggle="dropdown" href="#">
						<em class="fas fa-user"></em>
					</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../class/logout.php" id="logout-link"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				
                </ul>

			</div>
		</div><!-- /.container-fluid -->
	</nav>

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
				<h4><?php echo ("Welcome " . $_SESSION['admin_name'] . " !"); ?></h4>
			</div>
		</div>
		
		<!-- Content -->
		<div class="panel panel-container">
			<div class="row">

			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding">
						<em class="fa fa-xl solid fa-boxes-stacked color-#008000;"></em>
						<div class="large" id="totalQuantity"></div>
						<div class="text-muted">Items</div>
					</div>
				</div>
			</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div class="large" id="totalUsers"></div>
							<div class="text-muted">Borrowers</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl solid fa-box-open color-orange"></em>
							<div class="large">*</div>
							<div class="text-muted">Things Borrowed</div>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fas fa-xl fa-user color-red"></em>
						<div class="large" id="totalAdmin"></div>
							<div class="text-muted">Admin</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div style="text-align: center; font-size: 24px;">
			Calendar
		</div>

		<div style="display: flex; align-items: center; justify-content: center; flex-direction: column; height: 100%; margin: 0;">
    <div class="calendar-container" style="position: relative; display: flex; flex-direction: column; align-items: center;">
        <div id="calendar" style="width: 300px; height: 300px; border: 1px solid #ccc; z-index: 0;"></div>
    </div>
</div>

<?php include '../admin/footer.php'; ?>

</div>

	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="./js/dashboard.js"></script>

	</body>
</html>