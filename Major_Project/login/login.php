<?php
    session_start(); // Start the session to store user data
    require_once "db.php";

    // 1. Validation & Sanitization
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        die("Please enter both username and password.");
    }

    // 2. Fetch User via Prepared Statement
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // 3. Verify Password
        if (password_verify($password, $row['password'])) {
            
            // ---> FIXED: Regenerate session ID on successful login <---
            session_regenerate_id(true);
            
            // 4. Store user data in Session
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $row['id']; // Assuming your table has an 'id' column
            $_SESSION['username'] = $row['username'];
            
            // Redirect to a secure dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "User not found";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>