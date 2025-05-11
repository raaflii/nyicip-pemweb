<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <?php
            if (isset($_GET['success'])) {
                echo '<div class="success-message">Registrasi berhasil! Silakan login.</div>';
            }
            if (isset($error)) {
                echo '<div class="error-message">' . $error . '</div>';
            }

            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'username':
                        echo "<p style='color:red;'>Username tidak ditemukan</p>";
                        break;
                    case 'password':
                        echo "<p style='color:red;'>Username atau Password salah</p>";
                        break;
                    case 'invalid_request':
                        echo "<p style='color:red;'>Permintaan tidak valid</p>";
                        break;
                }
            }
            ?>
            <form action="includes/login_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="register-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html> 