<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "lacakin");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email = '$username' OR npm = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_full_name'] = $user['full_name'];
            $_SESSION['user_npm'] = $user['npm'];
            $_SESSION['user_phone_number'] = $user['phone_number'];
            header('Location: akun.php');
            exit();
        } else {
            $_SESSION['error_message'] = "Email/NPM atau password salah!";
        }
    } else {
        $_SESSION['error_message'] = "Akun tidak terdaftar!";
    }

    $conn->close();

    header('Location: login.php');
    exit();
}
?>
