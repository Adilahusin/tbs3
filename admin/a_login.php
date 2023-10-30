<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="x-icon" href="uitm.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UiTM Tools Borrowing System</title>
    
    <!-- Add any additional meta tags, CSS links, or JavaScript links here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/loginbutton.css">

    <!-- Icon Browser -->
    <link rel="shortcut icon" type="x-icon" href="uitm.png">
    
    <!-- Include the custom CSS code -->
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 100vh;
        }
        
        /* Semi-transparent background overlay on the image */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .white-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to the top vertically */
            align-items: center; /* Center horizontally */
          text-align: center;
        }
        
        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
        
        /* Logo to replace crow */
        .icon {
            width: 24px;
            height: 24px; 
            color: #007bff;
        }
        
        /* Login button */
        .btn-custom {
            background-color: #7370c9; 
            color: #fff; /* Text color */
        }
        
        .btn-custom:hover {
            background-color: #3e30a3; /* On hover */
            color: #fff; /* Text color */
        }
    </style>
</head>
<body>

<section class="bg-image-vertical" style="background-image: url('acrylic purple.jpg');">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto text-black white-container">
              
              <div class="px-5 ms-xl-4 pt-3 mt-xl-2">
                <!-- Logo and Text -->
                <i class="fas fa-solid fa-toolbox fa-2x me-3" style="color: #7370c9;"></i>
                <span class="h1 fw-bold mb-0 text-start">TBS</span>
            </div>            

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <!-- Login Form -->
                <form style="width: 25rem;" method="POST" action="./class/login.php">

                <div style="text-align: center;">
                    <h3 class="fw-normal mb-2 pb-2" style="letter-spacing: 1px; margin-top: 80px;">Admin Log In</h3>
                </div>
                    
                <hr style="width: 30%; margin: 10px auto 20px; border: 1px solid #7370c9;">
				<fieldset>
                        
                <div class="form-outline mb-4">
                    <input type="text" id="a_username" name="a_username" class="form-control form-control-lg" placeholder="Username" required autocomplete="off">
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="a_password" name="a_password" class="form-control form-control-lg" placeholder="Password" required autocomplete="off">
                    
                    <p class="small mb-2 pb-lg-2" style="text-align: left;"><a class="text-muted" style="text-decoration: none;">Forgot password?</a></p>
                </div>

                <button class="btn btn-custom btn-lg btn-block" type="submit">Login</button>

                </fieldset>
				</form>
                        
                        <!-- <form>
                        <div class="form-outline mb-4">
                            <input type="userid" id="userid" class="form-control form-control-lg" placeholder="Username" />
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                            <p class="small mb-2 pb-lg-2" style="text-align: left;"><a class="text-muted" href="#!" style="text-decoration: none;">Forgot password?</a></p>
                        </div>

                        <a href ="a_dashboard.php">
                        <button class="btn btn-custom btn-lg btn-block" type="button">Login</button>
                        </a>
                        
                        </form> -->

                        <!-- User Icon and Text -->
                        <a href="../index.php" style="position: absolute; bottom: 5px; right: 20px; display: flex; flex-direction: column; align-items: center;">
                            <i class="fas fa-solid fa-user fa-2x user-icon" style="color: black; margin-bottom: 5px;"></i>
                            <span style="color: black; font-size: 14px;">User</span>
                        </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add any additional scripts or JavaScript libraries here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
