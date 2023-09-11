<?php
$servername = "localhost:3306";
$database_name = "db_sekolah";
$username_db = "root";
$password_db = "";

// $connection = mysqli_connect("$servername", "$username_db", "$password_db");
// $select_db = mysqli_select_db($connection, $database_name);

$conn = new mysqli($servername, $username_db, $password_db, $database_name);

// if (!$select_db) {
//     echo ("connection terminated");
// }

if ($conn->connect_error) {
    die("Koneksi gagal : " . $conn->connect_error);
}
?>