<?php 

// (1) Hapus cookie dengan key id 

if (isset($_COOKIE['id'])) {
    unset($_COOKIE['id']);
    setcookie('id', $dataCook['id'], time() - 3600, '/');
}

// (2) Mulai session

session_start();

// (3) Hapus semua session yang berlangsung

session_destroy();

// (4) Lakukan redirect ke halaman login awal

header('Location: ../login.php')

exit;

?>