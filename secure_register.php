<?php
require "./conn.php";
session_start();

$username = $_POST["username"];
$pwd = $_POST["password"];

// Secure SQL Injection Prevention - Prepared Statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['status'] = 'This username is already taken. Try again with a different username.';
    header('Location: http://localhost/security_assignment2/index.php');
} else {
    // Secure SQL Injection Prevention - Prepared Statement
    $stmt = $conn->prepare("INSERT INTO users (username, pwd) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $pwd);
    
    if ($stmt->execute()) {
        $_SESSION['status'] = $username . ' has been registered successfully. Please enter your login details to access the dashboard.';
        header('Location: http://localhost/security_assignment2/login.php');
    } else {
        $_SESSION["status"] = "Error registering " . $username . ". Please try again.";
        header('Location: http://localhost/security_assignment2/index.php');
    }
}

$stmt->close();
$conn->close();
?>
