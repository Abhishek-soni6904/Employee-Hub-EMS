<?php 
$current_page = basename($_SERVER['PHP_SELF']); 
if (isset($_SESSION['alert']) && isset($_SESSION['alert_type'])) {
    echo '<div class="alert ' . $_SESSION['alert_type'] . '">' . $_SESSION['alert'] . '</div>';
    unset($_SESSION['alert'], $_SESSION['alert_type']);
}    
?>
<nav class="sidebar collapsed">
    <ul class="nav">
        <li>
            <div class="logo-container">
                <i class="fas fa-people-group logo"></i>
                <span class="logo-title">Employee Hub</span>
            </div>
            <button id="toggle-btn" aria-label="Toggle Sidebar">
                <i class="fas fa-angles-left"></i>
            </button>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'employees.php') ? 'active' : ''; ?>" href="employees.php">
                <i class="fas fa-users"></i>
                <span>Employees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'add_employee.php') ? 'active' : ''; ?>" href="add_employee.php">
                <i class="fas fa-user-plus"></i>
                <span>Add Employee</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'reports.php') ? 'active' : ''; ?>" href="reports.php">
                <i class="fas fa-chart-bar"></i>
                <span>Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</nav>
