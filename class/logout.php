<?php
// Start the session to access session variables
session_start();

// Determine the user type (user or admin)
$userType = '';
if (isset($_SESSION['u_id'])) {
    $userType = 'user';
} elseif (isset($_SESSION['a_username'])) {
    $userType = 'admin';
}

switch ($userType) {
    case 'user':
        // User is logged in, so log them out
        // Unset all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login form page for users
        header("Location: ../index.php");
        exit();
        break;

    case 'admin':
        // Admin is logged in, so log them out
        // Unset all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the admin login form page
        header("Location: ../admin/a_login.php");
        exit();
        break;

    default:
        // If neither user nor admin is logged in, or if $userType is empty
        header("Location: ../index.php");
        exit();
        break;
}
?>
