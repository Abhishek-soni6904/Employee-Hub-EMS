<?php
require_once 'include/db_config.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | Employee Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/employees.css">
</head>

<body>
    <?php include 'include/sidebar.php'; ?>
    <main class="main-content">
        <div>
            <h1>Employees</h1>
            <p>Manage employees records efficiently</p>
        </div>

        <div class="table-container">
            <div class="table-header">
                <div>
                    <label>Show</label>
                    <select class="entries-select" id="entriesSelect">
                        <option value="5">5 entries</option>
                        <option value="10" selected>10 entries</option>
                        <option value="25">25 entries</option>
                        <option value="50">50 entries</option>
                    </select>
                </div>
                <div>
                    <label>Search</label>
                    <input type="text" class="search-input" placeholder="Search Employees..." id="searchInput">
                </div>
            </div>

            <table id="employeesTable">
                <thead>
                    <tr>
                        <th data-sort="sno">Sno <span class="sort-icon"></span></th>
                        <th data-sort="name">Name <span class="sort-icon"></span></th>
                        <th data-sort="email">Email <span class="sort-icon"></span></th>
                        <th data-sort="role">Role <span class="sort-icon"></span></th>
                        <th data-sort="department">Department <span class="sort-icon"></span></th>
                        <th data-sort="salary">Salary <span class="sort-icon"></span></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM employees";
                    $result = $conn->query($query);
                    $sno = 1;
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td data-label="Sno"><?= $sno++; ?></td>
                            <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
                            <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
                            <td data-label="Role"><?= htmlspecialchars($row['role']) ?></td>
                            <td data-label="Department"><?= htmlspecialchars($row['department']) ?></td>
                            <td data-label="Salary" data-value="<?= htmlspecialchars($row['salary']) ?>">
                                <?= '₹ ' . number_format($row['salary'], 2) ?>
                            </td>
                            <td data-label="Actions">
                                <a href="add_employee.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="delete_employee.php?id=<?= htmlspecialchars($row['id']) ?>"
                                    onclick="return confirm('Are you sure you want to delete this employee?')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="pagination">
                <div class="pagination-info">Showing <span id="startEntry">1</span> to <span id="endEntry">10</span> of <span id="totalEntries">0</span> entries</div>
                <div class="pagination-buttons">
                    <button class="pagination-button" id="prevPage" disabled>Previous</button>
                    <button class="pagination-button" id="nextPage">Next</button>
                </div>
            </div>
        </div>
    </main>
    <script src="script/employee.js"></script>
</body>

</html>