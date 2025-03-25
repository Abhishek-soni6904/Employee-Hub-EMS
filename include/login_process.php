<?php
require_once 'db_config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['alert'] = 'Login successful';
        $_SESSION['alert_type'] = 'success';
        header("Location: ../dashboard.php");
        exit();
    } else {
        $_SESSION['alert'] = 'Incorrect Credentials!';
        $_SESSION['alert_type'] = 'error';
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}