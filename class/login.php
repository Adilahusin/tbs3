<?php
include '../class/configure/config.php';

// Function to check user login
function login($u_id, $u_password, $pdo) {
    $sql = "SELECT u_id, u_password FROM user WHERE u_id = :u_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':u_id', $u_id, PDO::PARAM_STR);
    $stmt->execute();

    $authenticationState = "";

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedPassword = $row['u_password'];
        $authenticationState = "user_exists";
    } else {
        $authenticationState = "user_not_found";
    }

    switch ($authenticationState) {
        case "user_exists":
            if (password_verify($u_password, $storedPassword)) {
                header("Location: ../user/dashboard.php");
                exit();
            } else {
                echo "<script>
                    var errorMessage = 'Login failed. Check your username and password.';
                    alert(errorMessage);
                    window.history.back();
                </script>";
            }
            break;

        case "user_not_found":
            echo "<script>
                var errorMessage = 'Login failed. User not found.';
                alert(errorMessage);
                window.history.back();
            </script>";
            break;

        default:
            echo "<script>
                var errorMessage = 'Login failed. An error occurred.';
                alert(errorMessage);
                window.history.back();
            </script>";
            break;
    }
}

// Function to check admin login
function adminlogin($a_username, $a_password, $pdo) {
    $sql = "SELECT a_username, a_password FROM admin WHERE a_username = :a_username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':a_username', $a_username, PDO::PARAM_STR);
    $stmt->execute();

    $authenticationState = "";

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedPassword = $row['a_password'];
        $authenticationState = "admin_exists";
    } else {
        $authenticationState = "admin_not_found";
    }

    switch ($authenticationState) {
        case "admin_exists":
            if (password_verify($a_password, $storedPassword)) {
                header("Location: ../admin/a_dashboard.php");
                exit();
            } else {
                echo "<script>
                    var errorMessage = 'Login failed. Check your username and password.';
                    alert(errorMessage);
                    window.history.back();
                </script>";
            }
            break;

        case "admin_not_found":
            echo "<script>
                var errorMessage = 'Login failed. Admin not found.';
                alert(errorMessage);
                window.history.back();
            </script>";
            break;

        default:
            echo "<script>
                var errorMessage = 'Login failed. An error occurred.';
                alert(errorMessage);
                window.history.back();
            </script>";
            break;
    }
}

// Check if the form has been submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["u_id"]) && isset($_POST["u_password"])) {
        // Get the user username and password from the form
        $u_id = $_POST["u_id"];
        $u_password = $_POST["u_password"];

        // Call the user login function 
        login($u_id, $u_password, $pdo);

    } elseif (isset($_POST["a_username"]) && isset($_POST["a_password"])) {
        // Get the admin username and password from the form
        $a_username = $_POST["a_username"];
        $a_password = $_POST["a_password"];

        // Call the admin login function
        adminlogin($a_username, $a_password, $pdo);
    }
}
?>
