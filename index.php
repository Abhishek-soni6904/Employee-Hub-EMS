<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Employee Hub</title>
    <link href="css/login.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_SESSION['alert']) && isset($_SESSION['alert_type'])) {
        echo '<div class="alert ' . $_SESSION['alert_type'] . '">' . $_SESSION['alert'] . '</div>';
        unset($_SESSION['alert'], $_SESSION['alert_type']);
    }
    ?>
    <div class="login-wrapper animated-entry">
        <div class="login-form">
            <div class="logo-container">
                <i class="fas fa-people-group logo"></i>
                <h2 class="logo-title">Employee Hub</h2>
            </div>
            <form action="include/login_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="signIn-btn">SIGN IN</button>
            </form>
        </div>
    </div>
</body>

</html>