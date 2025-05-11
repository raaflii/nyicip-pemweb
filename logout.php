<?php
session_start();

// Hapus semua session variables, destroy the session, lalu redirect ke halaman login

setcookie(session_name(), "", time() - 3600);

session_unset();
session_destroy();
header("Location: login.php");


exit;