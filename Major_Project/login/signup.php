<?php
    require_once "db.php";

    // 1. Validation & Sanitization
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    $username = htmlspecialchars($username); // Prevent XSS

    // Optional: Check if username already exists
    $check_stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);
    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        die("Username already exists. Please choose another.");
    }
    mysqli_stmt_close($check_stmt);

    // 2. Hash Password and Insert User
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters ("ss" means two strings)
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page on success
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>