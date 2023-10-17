<!DOCTYPE html>
<html>
<head>
    <style>
        #sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            right: -300px; /* Initially hidden */
            background-color: #333;
            color: #fff;
            padding: 20px;
            transition: right 0.3s;
        }

        #content {
            margin-right: 0; /* Initially no margin */
            transition: margin-right 0.3s;
        }

        #showSidebar {
            position: fixed;
            top: 10px;
            right: 10px;
        }

        #userType {
            width: 100%;
        }
    </style>
</head>
<body>
    <button id="showSidebar">Show Sidebar</button>
    <div id="sidebar">
        <form id="userForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="userType">User Type:</label>
            <select id="userType" name="userType">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select><br>

            <button type="button" id="saveButton">Save</button>
            <button type="button" id="cancelButton">Cancel</button>
        </form>
    </div>
    <div id="content">
        <!-- Your main content goes here -->
    </div>

    <div class="sidebar-form">
		<div class="container-fluid">
			<form class="frmadd_users">
				<h4 class="alert bg-success">Add Admin</h4>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="a_name" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="a_username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="a_password" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>User Type</label>
					<select class="form-control" name="u_type" required="required">
						<option disabled selected>Please select Admin type</option>
						<option value="1">Administrator</option>
						<option value="2">Staff Assistant</option>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-danger btn-block cancel_user" type="button">
								CANCEL
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" type="submit">
								SAVE
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showSidebar").click(function() {
                $("#sidebar").css("right", "0");
                $("#content").css("margin-right", "250px");
            });

            $("#cancelButton").click(function() {
                $("#sidebar").css("right", "-300px");
                $("#content").css("margin-right", "0");
            });
        });
    </script>
</body>
</html>
