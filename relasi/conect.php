<?php
$servername = "localhost:3306";
$database = "db_sekolah";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal : " . $conn->connect_error);
} else {
    // echo "Koneksi berhasil";
}
?>