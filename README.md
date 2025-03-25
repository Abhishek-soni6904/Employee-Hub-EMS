# 🚀 Employee Management System

The **Employee Management System** is a web-based application designed to manage employee records efficiently. It provides features such as adding, editing, deleting, and viewing employee details, generating reports, and managing user authentication.

## 🌐 Live Demo

🔗 [Employee Management System Live Demo](http://employee-hub.devbyabhishek.infinityfreeapp.com)

## 📌 Table of Contents

- [Features](#features)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Technologies Used](#technologies-used)
- [Screenshots](#screenshots)
- [Author](#author)
- [GitHub Repository](#github-repository)

---

## ✨ Features

### 🔐 Authentication
   - Admin login with secure password hashing.
   - Session-based authentication.

### 👨‍💼 Employee Management
   - Add new employees.
   - Edit existing employee details.
   - Delete employees.
   - View employee records with pagination, sorting, and search functionality.

### 📊 Reports
   - Department-wise employee count and average salary.
   - Role-wise salary distribution (min, max, average).
   - Interactive charts using Chart.js.

### 📈 Dashboard
   - Overview of total employees, departments, and average salary.
   - Recent hires list.
   - Department-wise recruitment chart.

---

## 📂 Project Structure

```
Employee_management/
├── add_employee.php        # Add or edit employee details
├── dashboard.php           # Admin dashboard
├── delete_employee.php     # Delete employee functionality
├── employees.php           # Employee management page
├── index.php               # Login page
├── logout.php              # Logout functionality
├── reports.php             # Reports page
├── employee_management.sql # Database schema and sample data
├── css/                    # Stylesheets
│   ├── add_employee.css
│   ├── dashboard.css
│   ├── employees.css
│   ├── login.css
│   ├── main.css
│   └── reports.css
├── include/                # Includes for reusable components
│   ├── db_config.php       # Database configuration and session handling
│   ├── login_process.php   # Login processing script
│   └── sidebar.php         # Sidebar navigation
├── script/                 # JavaScript files
│   ├── dashboard.js
│   ├── employee.js
│   └── reports.js
```

---

## ⚙️ Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/Abhishek-soni6904/Employee-Hub-EMS.git
cd Employee-Hub-EMS
```

### 2️⃣ Set Up the Database
- Create a new MySQL database.
- Import the `employee_management.sql` file into your database.
- Update the database credentials in `include/db_config.php`:

```php
<?php
$host = 'your-database-host';
$db_name = 'your-database-name';
$username = 'your-database-username';
$password = 'your-database-password';
?>
```

### 3️⃣ Start a Local Server
- Use a local server like XAMPP, WAMP, or MAMP.
- Place the project folder in the server's root directory (e.g., `htdocs` for XAMPP).

### 4️⃣ Access the Application
- Open a browser and navigate to `http://localhost/employee-management`.

---

## 🛠️ Usage

### 🔑 Login
- Use the default admin credentials:
  - **Username:** admin
  - **Password:** admin123

### 📊 Dashboard
- View total employees, departments, and average salary.
- Check recent hires and department-wise recruitment statistics.

### 👥 Manage Employees
- Navigate to the "Employees" page to view, add, edit, or delete employee records.

### 📜 Reports
- View department-wise employee count and salary distribution.
- Analyze role-wise salary statistics.

### 🚪 Logout
- Click the "Logout" button in the sidebar to end the session.

---

## 🗃️ Database Schema

### 🏛️ Tables

#### 1️⃣ `admin`
- Stores admin credentials.
- **Columns:** `id`, `username`, `password`.

#### 2️⃣ `employees`
- Stores employee details.
- **Columns:** `id`, `name`, `email`, `role`, `department`, `salary`, `hire_date`.

---

## 🛠️ Technologies Used

### 🎨 Frontend
- HTML, CSS (custom styles), JavaScript.
- Chart.js for interactive charts.
- Font Awesome for icons.

### ⚡ Backend
- PHP for server-side logic.
- MySQL for database management.

### 📌 Other
- Session-based authentication.
- Responsive design for mobile and desktop.

---

## 📸 Screenshots

### 🔹 [Login Page](Screenshots/employee-hub.devbyabhishek.infinityfreeapp.com_.png)
- Simple and secure login form.

### 🔹 [Dashboard](#)
- Overview of key statistics and recent hires.

### 🔹 [Employee Management](#)
- View, search, sort, and paginate employee records.

### 🔹 [Reports](#)
- Interactive charts and detailed tables for analysis.

---

## 👨‍💻 Author

Developed by **Abhishek Soni**. For any queries, contact **abhisheks6904@gmail.com**.

---

## 🔗 GitHub Repository

📂 [Employee-Hub-EMS GitHub Repo](https://github.com/Abhishek-soni6904/Employee-Hub-EMS)