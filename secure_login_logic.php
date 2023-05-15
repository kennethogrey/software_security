<?php
require "conn.php";
session_start();

if (isset($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Secure SQL Injection Prevention - Prepared Statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND pwd = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["login_type"] = "Logged in with the secure form";
            header('Location: http://localhost/security_assignment2/welcome.php');
        } else {
            $_SESSION['status'] = 'Invalid Email or Password.';
            header('Location: http://localhost/security_assignment2/login.php');
        }
    } else {
        $_SESSION['status'] = 'Invalid Email or Password.';
        header('Location: http://localhost/security_assignment2/login.php');
    }
} else {
    header('Location: http://localhost/security_assignment2/index.php');
}
