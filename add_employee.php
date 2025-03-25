<?php
require_once 'include/db_config.php';

// Initialize variables
$employee = [
    'name' => '',
    'email' => '',
    'role' => '',
    'department' => '',
    'salary' => '',
    'hire_date' => date('Y-m-d')
];
$edit_mode = false;

// Check if editing an existing employee
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $edit_mode = true;
    $id = $_GET['id'];
    $query = "SELECT * FROM employees WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
        $employee = mysqli_fetch_assoc($result);
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    if ($edit_mode) {
        // Update existing employee
        $query = "UPDATE employees SET name=?, email=?, role=?, department=?, salary=?, hire_date=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssdsi", $name, $email, $role, $department, $salary, $hire_date, $id);
    } else {
        // Insert new employee
        $query = "INSERT INTO employees (name, email, role, department, salary, hire_date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssds", $name, $email, $role, $department, $salary, $hire_date);
    }

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['alert'] = 'Employee ' . ($edit_mode ? 'details updated' : 'added') . ' successfully.';
        $_SESSION['alert_type'] = 'success';
        header("Location: employees.php");
        exit();
    } else {
        $_SESSION['alert'] = 'Failed to ' . ($edit_mode ? 'update' : 'add') . ' Member';
        $_SESSION['alert_type'] = 'error';
        header("Location: employees.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $edit_mode ? 'Edit' : 'Add'; ?> Employee | Employee Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/add_employee.css">
</head>

<body>
    <?php include 'include/sidebar.php' ?>
    <main class="main-content">
        <div>
            <h1><?php echo $edit_mode ? 'Edit Employee' : 'Add New Employee'; ?></h1>
            <p>Manage employee data efficiently</p>
        </div>
        <form method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo htmlspecialchars($employee['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo htmlspecialchars($employee['email']); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="Developer" <?php echo ($employee['role'] === 'Developer') ? 'selected' : ''; ?>>Developer</option>
                        <option value="Manager" <?php echo ($employee['role'] === 'Manager') ? 'selected' : ''; ?>>Manager</option>
                        <option value="HR" <?php echo ($employee['role'] === 'HR') ? 'selected' : ''; ?>>HR</option>
                        <option value="Sales" <?php echo ($employee['role'] === 'Sales') ? 'selected' : ''; ?>>Sales</option>
                        <option value="Support" <?php echo ($employee['role'] === 'Support') ? 'selected' : ''; ?>>Support</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="department">Department</label>
                    <select class="form-control" id="department" name="department" required>
                        <option value="">Select Department</option>
                        <option value="Engineering" <?php echo ($employee['department'] === 'Engineering') ? 'selected' : ''; ?>>Engineering</option>
                        <option value="Sales" <?php echo ($employee['department'] === 'Sales') ? 'selected' : ''; ?>>Sales</option>
                        <option value="HR" <?php echo ($employee['department'] === 'HR') ? 'selected' : ''; ?>>HR</option>
                        <option value="Finance" <?php echo ($employee['department'] === 'Finance') ? 'selected' : ''; ?>>Finance</option>
                        <option value="Marketing" <?php echo ($employee['department'] === 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="salary">Salary</label>
                    <div class="input-wrapper">
                        <input type="number" class="form-control" id="salary" name="salary" min="0" step="1"
                            value="<?php echo htmlspecialchars($employee['salary']); ?>">
                        <div class="spin-buttons">
                            <button type="button" class="increment">▲</button>
                            <button type="button" class="decrement">▼</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="hire_date">Hire Date</label>
                    <input type="date" class="form-control" id="hire_date" name="hire_date"
                        value="<?php echo htmlspecialchars($employee['hire_date'] ?? date('Y-m-d')); ?>"
                        max="<?php echo date('Y-m-d'); ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> <?php echo $edit_mode ? 'Update Employee' : 'Add Employee'; ?>
            </button>
        </form>
    </main>
    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('toggle-btn');
        const sidebar = document.querySelector('.sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
        document.querySelectorAll(".spin-buttons").forEach(wrapper => {
            const input = wrapper.previousElementSibling;
            wrapper.querySelector(".increment").addEventListener("click", () => input.stepUp());
            wrapper.querySelector(".decrement").addEventListener("click", () => input.stepDown());
        });
    </script>
</body>

</html>