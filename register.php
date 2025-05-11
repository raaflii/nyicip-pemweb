<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Registrasi</h2>
            <?php
                if (isset($error)) {
                    echo '<div class="error-message">' . $error . '</div>';
                }
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'username_exists') echo "Username sudah digunakan.";
                    else if ($_GET['error'] == 'password_mismatch') echo "Password tidak cocok.";
                    else if ($_GET['error'] == 'register_failed') echo "Registrasi gagal.";
                    else if ($_GET['error'] == 'invalid_request') echo "Permintaan tidak valid.";
                }
            ?>
            <form action="includes/register_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn">Daftar</button>
            </form>
            <p class="login-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html> 