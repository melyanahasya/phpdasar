<?php
include 'conect.php';
$id = $_GET['id'];
$get_data = "select * from toko where id=$id";
$result_data = mysqli_query($conn, $get_data);
$row = mysqli_fetch_assoc($result_data);
$nama_produk = $row['nama_produk'];
$jenis_produk = $row['jenis_produk'];
$tanggal_masuk = $row['tanggal_masuk'];
$tanggal_keluar = $row['tanggal_keluar'];
$harga = $row['harga'];
if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $jenis_produk = $_POST['jenis_produk'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $harga = $_POST['harga'];
    $sql = "update toko set id =$id, nama_produk='$nama_produk', jenis_produk='$jenis_produk', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', harga='$harga'  where id=$id";
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
        <h3 class="text-center">Update</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input value="<?php echo $nama_produk?>" type="text" class="form-control" id="nama" name="nama_produk" aria-describedby="nama">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Produk</label>
                <input value="<?php echo $jenis_produk?>" type="text" class="form-control" id="jenis" name="jenis_produk">
            </div>
            <div class="mb-3">
                <label for="masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" value="<?php echo $tanggal_masuk?>" type="text" class="form-control" id="masuk" name="tanggal_masuk">
            </div>
            <div class="mb-3">
                <label for="keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" value="<?php echo $tanggal_keluar?>" type="text" class="form-control" id="keluar" name="tanggal_keluar">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input value="<?php echo $harga?>" type="text" class="form-control" id="harga" name="harga">
            </div>
           
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>