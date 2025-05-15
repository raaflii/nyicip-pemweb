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
                    echo "<div class='error-message'>";
                    if ($_GET['error'] == 'username_exists') echo "<p style='color:red;'>Username sudah digunakan. Silakan pilih yang lain.</p>";
                    else if ($_GET['error'] == 'password_mismatch') echo "<p>Password dan konfirmasi tidak cocok.</p>";
                    else if ($_GET['error'] == 'register_failed') echo "<p>Registrasi gagal. Silahkan coba lagi.</p>";
                    else if ($_GET['error'] == 'invalid_request') echo "<p>Permintaan tidak valid.";
                    echo "</div>";
                }
            ?>
            <form action="includes/register_process.php" method="POST">
                <div class="form-group">
                    <input type="text" id="username" name="username" required placeholder=" ">
                    <label for="username" class="form-label">Username</label>
                </div>

                <div class="form-group">
                    <input type="email" id="email" name="email" required placeholder=" ">
                    <label for="email" class="form-label">Email</label>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" required placeholder=" ">
                    <label for="password" class="form-label">Password</label>
                </div>

                <div class="form-group">
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder=" ">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                </div>
                <button type="submit" class="btn">Daftar</button>
            </form>
            <p class="login-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html> 