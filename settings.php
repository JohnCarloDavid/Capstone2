<?php
// Start the session
session_start();

// Include database connection file
include('db_connection.php');

// Check if the user is logged in, if not then redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - GSL25 Inventory Management System</title>
    <link rel="icon" href="img/GSL25_transparent 2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        /* Body and general styling */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            margin: 0;
            color: #2c3e50;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark-mode {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(145deg, #34495e, #2c3e50);
            color: #ecf0f1;
            padding: 30px 20px;
            height: 100vh;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .sidebarHeader h2 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .sidebarNav ul {
            list-style: none;
            padding: 0;
        }

        .sidebarNav ul li {
            margin: 1.2rem 0;
        }

        .sidebarNav ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .sidebarNav ul li a:hover {
            background-color: #2980b9;
        }

        .sidebarNav ul li a i {
            margin-right: 15px;
        }

        .mainContent {
            margin-left: 280px;
            padding: 30px;
            width: calc(100% - 280px);
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .mainHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mainHeader h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .headerActions .button {
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .headerActions .button i {
            margin-right: 8px;
        }

        .headerActions .button:hover {
            background-color: #2980b9;
        }

        .settingsContent {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .settingsContent h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .settingsContent form {
            display: flex;
            flex-direction: column;
        }

        .settingsContent label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .settingsContent input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .settingsContent .button {
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .settingsContent .button:hover {
            background-color: #2980b9;
        }

        .dark-mode .settingsContent {
            background: #34495e;
        }

        .dark-mode .settingsContent label {
            color: #ecf0f1;
        }

        .dark-mode .settingsContent input {
            background: #2c3e50;
            color: #ecf0f1;
            border: 1px solid #34495e;
        }

        @media (max-width: 768px) {
            .mainContent {
                margin-left: 0;
                width: 100%;
            }
        }

        .icon {
            font-size: 2rem;
            cursor: pointer;
            color: #3498db;
            transition: color 0.3s ease;
        }

        .icon:hover {
            color: #2980b9;
        }

        #passwordForm {
            display: none;
        }
        .success {
    color: #27ae60; 
    font-size: 1rem;
    margin-top: 10px;
}

.error {
    color: #e74c3c; 
    font-size: 1rem;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebarHeader">
            <h2>GSL25 Dashboard</h2>
        </div>
        <nav class="sidebarNav">
            <ul>
                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="inventory.php"><i class="fa fa-box"></i> Inventory</a></li>
                <li><a href="orders.php"><i class="fa fa-receipt"></i> Orders</a></li>
                <li><a href="reports.php"><i class="fa fa-chart-line"></i> Reports</a></li>
                <li><a href="settings.php" class="active"><i class="fa fa-cog"></i> Settings</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="mainContent">
        <header class="mainHeader">
            <h1>Settings</h1>
            <div class="headerActions">
                <a href="logout.php" class="button">Logout</a>
            </div>
        </header>

        <!-- Settings Content -->
        <section class="settingsContent">
        <div class="settingOption">
            <h2>Change Password</h2>
        <div id="toggleChangePassword" class="icon" onclick="togglePasswordForm()">
            <i class="fa fa-key"></i>
        </div>
        <div id="passwordForm">
            <form method="post" action="settings.php">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>

                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <button type="submit" class="button">Change Password</button>

                <?php if (isset($success_message)) : ?>
                    <p class="success"><?php echo $success_message; ?></p>
                <?php endif; ?>

                <?php if (isset($error_message)) : ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
            }
        });

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        }

        function togglePasswordForm() {
            var passwordForm = document.getElementById('passwordForm');
            var displayStyle = passwordForm.style.display === 'none' ? 'block' : 'none';
            passwordForm.style.display = displayStyle;
        }
    </script>
</body>
</html>