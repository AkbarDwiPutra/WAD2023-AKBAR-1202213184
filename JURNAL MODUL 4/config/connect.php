<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin

$servername = "localhost";
$username = "username";
$password = "password";
$dbnama = "db_modul4";

$conn = new mysqli($servername, $username, $password, $dbnama);

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi

if ($conn ->connect_error){
    die("Connection Failed :" . $conn->connect_error);
}
echo "connected succesfully";
?>