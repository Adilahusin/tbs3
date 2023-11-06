<?php
include '../class/configure/config.php';

class login {

    public function userLogin($u_id, $u_password) {

        global $pdo;
    
        $sql = "SELECT * FROM user WHERE u_id = :u_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':u_id', $u_id, PDO::PARAM_STR);
        $stmt->execute();
    
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $storedPassword = $row['u_password'];
    
            if (password_verify($u_password, $storedPassword)) {

                session_start(); 
                // Store user information in session variables
                $_SESSION['user_id'] = $row['u_id'];
                $_SESSION['user_name'] = $row['u_name'];
                echo "1";
    
                header("Location: ../user/dashboard.php");
                exit();
            } else {
                $this->showErrorMessage("Login failed. Check your username and password.");
            }
        } else {
            $this->showErrorMessage("Login failed. User not found.");
        }
    }
    
    public function adminLogin($a_username, $a_password) {
        
        global $pdo;
    
        $sql = "SELECT * FROM admin WHERE a_username = :a_username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':a_username', $a_username, PDO::PARAM_STR);
        $stmt->execute();
    
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $storedPassword = $row['a_password'];
    
            if (password_verify($a_password, $storedPassword)) {

                session_start(); // Start the session
                // Store admin information in session variables
                $_SESSION['admin_id'] = $row['a_id'];
                $_SESSION['admin_name'] = $row['a_name'];
                $_SESSION['admin_username'] = $row['a_username'];
                echo "1";
    
                header("Location: ../admin/a_dashboard.php");
                exit();
            } else {
                $this->showErrorMessage("Login failed. Check your username and password.");
            }
        } else {
            $this->showErrorMessage("Login failed. Admin not found.");
        }
    }
    
    private function showErrorMessage($message) {
        echo "<script>
            var errorMessage = '" . $message . "';
            alert(errorMessage);
            window.history.back();
        </script>";
    }
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["u_id"]) && isset($_POST["u_password"])) {
        // Get the user username and password from the form
        $u_id = $_POST["u_id"];
        $u_password = $_POST["u_password"];

        // Create a LoginHandler instance and call the user login method
        $login_function = new login($pdo);
        $login_function->userLogin($u_id, $u_password);
    
    } elseif (isset($_POST["a_username"]) && isset($_POST["a_password"])) {
        // Get the admin username and password from the form
        $a_username = $_POST["a_username"];
        $a_password = $_POST["a_password"];

        // Create a LoginHandler instance and call the admin login method
        $login_function = new login($pdo);
        $login_function->adminLogin($a_username, $a_password);
    }
}
?>
