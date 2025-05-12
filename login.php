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
                echo "<div style='border: 1px solid red; background-color: #ffe6e6; color: red; padding: 10px; margin-bottom: 10px; border-radius: 5px; font-size: 12px'>";
                switch ($_GET['error']) {
                    case 'username':
                        echo "Username tidak ditemukan</p>";
                        break;
                    case 'password':
                        echo "Username atau Password salah</p>";
                        break;
                    case 'invalid_request':
                        echo "Permintaan tidak valid</p>";
                        break;
                }
                echo "</div>";
            }
            ?>
            <form action="includes/login_process.php" method="POST">
                <div class="form-group">
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="register-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html> 