<?php 
session_start(); 
 
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) { 
    header("location: login.php"); 
    exit(); 
} 
?>
<?php
include 'conect.php';

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama'];
    $jenis_produk = $_POST['jenis'];
    $tanggal_masuk = $_POST['masuk'];
    $tanggal_keluar = $_POST['keluar'];
    $harga = $_POST['harga'];
    $sql = "insert into toko(nama_produk, jenis_produk, tanggal_masuk, tanggal_keluar, harga) values ('$nama_produk','$jenis_produk', '$tanggal_masuk', '$tanggal_keluar', '$harga')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:read.php');
    } else {
        die($conn->connect_error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Create</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Produk</label>
                <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="mb-3">
                <label for="masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="masuk" name="masuk">
            </div>
            <div class="mb-3">
                <label for="keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" class="form-control" id="keluar" name="keluar">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
           
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>