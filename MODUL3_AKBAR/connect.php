<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->
<?php
$host = "localhost";
$username = "root";
$password = "";
$nama_database = "db_wad_modul3";
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin

$connect = mysqli_connect("$host", "$username","$password", "$nama_database" );
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya

if (!$connect){
    die("Koneksi Gagal: ". mysqli_connect_error());
}
echo "Koneksi berhasil";
mysqli_close($connect)
?>