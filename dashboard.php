<?php
require_once 'include/db_config.php';
// Fetch dashboard statistics
$stats = [
    'total_employees' => $conn->query("SELECT COUNT(*) as count FROM employees")->fetch_assoc()['count'],
    'departments' => $conn->query("SELECT COUNT(DISTINCT department) as count FROM employees")->fetch_assoc()['count'],
    'avg_salary' => round($conn->query("SELECT AVG(salary) as avg FROM employees")->fetch_assoc()['avg'], 2)
];
$department_data = [];
$result = $conn->query("
    SELECT 
        department,
        COUNT(*) as count 
    FROM employees 
    WHERE hire_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
    GROUP BY department 
    ORDER BY department ASC
");

while ($row = $result->fetch_assoc()) {
    $department_data[] = $row;
}
// Recent employees
$recent_employees = [];
$result = $conn->query("SELECT name, role, department, hire_date FROM employees ORDER BY hire_date DESC LIMIT 4");
while ($row = $result->fetch_assoc()) {
    $recent_employees[] = $row;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Employee Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php include 'include/sidebar.php' ?>
    <main class="main-content">
        <div>
            <h1>Dashboard</h1>
            <p>Welcome back, Administrator</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <h5>Total Employees</h5>
                    <h3><?php echo $stats['total_employees']; ?></h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-building fa-2x"></i>
                </div>
                <div>
                    <h5>Departments</h5>
                    <h3><?php echo $stats['departments']; ?></h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-money-bill fa-2x"></i>
                </div>
                <div>
                    <h5>Avg. Salary</h5>
                    <h3>₹ <?php echo number_format($stats['avg_salary'], 2); ?></h3>
                </div>
            </div>
        </div>

        <div class="dashboard-flex">
            <div class="card">
                <h3>Last Year's Recruitment Overview</h3>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>

            <!-- Recent Hires Card -->
            <div class="card">
                <h3>Recent Hires</h3>
                <div class="recent-hires-list">
                    <?php foreach ($recent_employees as $employee): ?>
                        <div class="hire-item">
                            <div class="hire-item-header">
                                <h4><?php echo htmlspecialchars($employee['name']); ?></h4>
                                <span><?php echo date('M d, Y', strtotime($employee['hire_date'])); ?></span>
                            </div>
                            <p class="hire-item-info">
                                <i class="fas fa-briefcase"></i>
                                <?php echo htmlspecialchars($employee['role']); ?> - <?php echo htmlspecialchars($employee['department']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <script>
// Replace the existing chart code with this:
const departmentData = <?php echo json_encode($department_data); ?>;
</script>
    <script src="script/dashboard.js"></script>
</body>

</html>