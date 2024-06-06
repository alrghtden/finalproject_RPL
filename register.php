<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacakin - Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php
    session_start();
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
    unset($_SESSION['error_message']);
    ?>
    
    <div class="register-container">
        <h2>Register</h2>
        <?php if ($error_message): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="proses_register.php" method="POST">
            <div class="input-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="input-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" required>
            </div>
            <div class="input-group">
                <label for="phone_number">Nomor Telepon</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
