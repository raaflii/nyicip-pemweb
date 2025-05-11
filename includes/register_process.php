<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // buat perilaku ketika username sudah ada
    if ($result->num_rows > 0) {
        echo "Registrasi gagal: Username sudah terdaftar.";
        exit;
    }

    // buat perilaku ketika password tidak sama
    if ($password !== $confirm_password) {
        echo "Registrasi gagal: Password tidak sama dengan konfirmasi password.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

     $insert_query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // buat perilaku ketika register berhasil
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../login.php?register=success");
        exit();

    // buat perilaku ketika register gagal
    } else {
        $stmt->close();
        header("Location: ../register.php?error=register_failed");
        exit();
    }

// Jika method bukan POST
} else {
    header("Location: ../register.php?error=invalid_request");
    exit();
}
?>
