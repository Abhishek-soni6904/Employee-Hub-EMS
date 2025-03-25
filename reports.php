<?php
require_once 'include/db_config.php';

// Department-wise employee count
$dept_query = "SELECT department, COUNT(*) as employee_count, AVG(salary) as avg_salary FROM employees GROUP BY department";
$dept_result = $conn->query($dept_query);

if (!$dept_result) {
    die("Error executing query: " . $conn->error);
}
$department_stats = $dept_result->fetch_all(MYSQLI_ASSOC);

// Salary distribution by role
$role_query = "SELECT role, COUNT(*) as employee_count, AVG(salary) as avg_salary, MIN(salary) as min_salary, MAX(salary) as max_salary FROM employees GROUP BY role";
$role_result = $conn->query($role_query);

if (!$role_result) {
    die("Error executing query: " . $conn->error);
}
$role_stats = $role_result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports | Employee Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/reports.css">
</head>

<body>
    <?php include 'include/sidebar.php' ?>

    <main class="main-content">
        <div>
            <h1>Reports</h1>
            <p>Overview of employee distribution and salary averages.</p>
        </div>

        <div class="dashboard-grid">
            <div class="card">
                <div class="card-header">Department-wise Employee Count</div>
                <div class="chart-container">
                    <canvas id="departmentChart"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Average Salary by Role</div>
                <div class="chart-container">
                    <canvas id="salaryByRoleChart"></canvas>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 1.5rem;">
            <div class="card-header">Detailed Department Statistics</div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Employee Count</th>
                            <th>Average Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($department_stats as $stat): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($stat['department']); ?></td>
                                <td><?php echo $stat['employee_count']; ?></td>
                                <td>₹<?php echo number_format($stat['avg_salary'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
      const departmentData = <?php echo json_encode($department_stats); ?>;
      const roleData = <?php echo json_encode($role_stats); ?>;
    </script>
    <script src="script/reports.js"></script>
</body>

</html>