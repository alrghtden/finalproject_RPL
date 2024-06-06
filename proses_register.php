<?php
session_start();

$conn = new mysqli("localhost", "root", "", "lacakin");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $npm = $_POST['npm'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users WHERE full_name = '$full_name' OR npm = '$npm'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $_SESSION['error_message'] = "Nama lengkap atau NPM sudah terdaftar. Silakan gunakan nama lengkap atau NPM lain.";
        header("Location: register.php");
        exit();
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (full_name, npm, phone_number, email, password) 
                         VALUES ('$full_name', '$npm', '$phone_number', '$email', '$hashed_password')";

        if ($conn->query($insert_query) === TRUE) {
            $_SESSION['success_message'] = "Registrasi berhasil!";
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['error_message'] = "Error: " . $insert_query . "<br>" . $conn->error;
            header("Location: register.php");
            exit();
        }
    }
}

$conn->close();
?>
