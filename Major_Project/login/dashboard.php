<?php
session_start();

// Check if user is logged in. If not, redirect to login page.
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; text-align: center; padding: 50px; }
        .container { background-color: white; padding: 20px; border: 1px solid #ccc; width: 400px; margin: auto; }
        a.btn { display: inline-block; padding: 10px 20px; background-color: red; color: white; text-decoration: none; margin-top: 15px; }
        a.btn:hover { background-color: darkred; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Displaying Session Data -->
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Your User ID is: <strong><?php echo $_SESSION['user_id']; ?></strong></p>
        <p>You have successfully logged in.</p>
        
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>