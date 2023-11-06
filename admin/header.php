<?php
	require_once 'session.php';
?>

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
				<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<em class="fa-solid fa-clock"></em><span class="label label-danger">15</span>
				</a>
						
					<!-- Due Borrow -->
					<ul class="dropdown-menu dropdown-messages">
						<li>
							<div class="dropdown-messages-box">
								<div class="message-body">
									<a href="#"><strong>Aisyah Su</strong> reserved LCD.</a>
								</div>
							</div>
						</li>
						</ul>
				</li>

					<!-- Reservation -->
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message</div>
							</a></li>
						</ul>
					</li>

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

	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>
    
</body>
</html>