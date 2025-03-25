<?php
$host = 'localhost';
$db_name = 'employee_management';
$username = 'root';
$password = '';

// Create a MySQLi connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) !== 'login_process.php') {
    $_SESSION['alert'] = 'Unauthorized access';
        $_SESSION['alert_type'] = 'error';
    header("Location: index.php");
    exit();
}
?>
