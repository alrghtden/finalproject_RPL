<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "lacakin");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

$full_name = $npm = $phone_number = $email = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $npm = $row['npm'];
    $phone_number = $row['phone_number'];
    $email = $row['email'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacakin - Akun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <div class="main">
        <h1>Halo, <?php echo $full_name; ?>!</h1>
        <p>NPM: <?php echo $npm; ?></p>
        <p>Nomor Telepon: <?php echo $phone_number; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
