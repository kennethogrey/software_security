<?php
require "conn.php";
session_start();

if (isset($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $pwd = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username' AND pwd = '$pwd'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["login_type"] = "Logged in with insecure form";
            header('Location:http://localhost/security_assignment2/welcome.php');
        } else {
            $_SESSION['status'] = 'Invalid Email or Password.';
            header('Location:http://localhost/security_assignment2/login.php');
        }
    } else {
        $_SESSION['status'] = 'Invalid Email or Password.';
        header('Location:http://localhost/security_assignment2/login.php');
    }
} else {
    header('Location:http://localhost/security_assignment2/index.php');
}