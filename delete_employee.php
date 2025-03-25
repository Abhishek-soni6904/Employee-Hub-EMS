<?php
session_start();
require_once 'include/db_config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Check if the employee exists
    $check_stmt = $conn->prepare("SELECT id FROM employees WHERE id = ?");
    $check_stmt->bind_param('i', $employee_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Employee exists, proceed with deletion
        $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->bind_param('i', $employee_id);

        if ($stmt->execute()) {
            $_SESSION['alert'] = 'Employee deleted successfully';
            $_SESSION['alert_type'] = 'success';
        } else {
            $_SESSION['alert'] = 'Failed to delete Employee';
            $_SESSION['alert_type'] = 'error';
        }
        $stmt->close();
    } else {
        $_SESSION['alert'] = 'Employee not found!';
        $_SESSION['alert_type'] = 'error';
    }

    $check_stmt->close();
} else {
    $_SESSION['alert'] = 'Invalid request!';
    $_SESSION['alert_type'] = 'error';
}

header("Location: employees.php");
exit();
