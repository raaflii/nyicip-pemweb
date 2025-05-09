<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    $hash_password = password_hash($password, PASSWORD_BCRYPT);

    $checkUsernameStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkUsernameStmt->bind_param("s", $username);
    $checkUsernameStmt->execute();
    $checkUsernameStmt->store_result();


    if ($checkUsernameStmt->num_rows > 0) {
        $message = "Username already exists";
        $toastClass = "#007bff"; // Primary color
    } else if ($password !== $confirm_password) {
        $message = "Passwords do not match";
    }
    else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hash_password);

        if ($stmt->execute()) {
            $message = "Account created successfully";
            $toastClass = "#28a745"; 
        } else {
            $message = "Error: " . $stmt->error;
            $toastClass = "#dc3545"; 
        }

        $stmt->close();
    }
}
?> 