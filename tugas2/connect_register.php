<?php
session_start();
$servername = "localhost:3306";
$database = "db_sekolah";
$username_db = "root";
$password_db = "";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli($servername, $username_db, $password_db, $database);

if ($conn->connect_error) {
    die("koneksi gagal : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into admin (email, username, password) values(?,?,?)");
    // md5 digunakan untuk mengubah password menjadi password random
    $stmt->bind_param("sss", $email, $username, md5($password));
    $stmt->execute();
    echo "Register Berhasil";
    $stmt->close();
    $conn->close();
}
?>