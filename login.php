<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacakin - Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
    session_start();
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
    unset($_SESSION['error_message']);
    ?>

    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error_message): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="proses_login.php" method="POST">
            <div class="input-group">
                <label for="username">Email / NPM</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar sekarang!</a></p>
    </div>
</body>
</html>
