<?php
include 'conect.php';
$id = $_GET['id'];
$get_data = "select * from siswa where id_siswa=$id";
$result_data = mysqli_query($conn, $get_data);
$row = mysqli_fetch_assoc($result_data);
$nama_siswa = $row['nama_siswa'];
$nisn = $row['nisn'];
$gender = $row['gender'];

// code for update data siswa
if (isset($_POST['submit'])) {
    $input_nama_siswa = $_POST['nama'];
    $input_nisn = $_POST['nisn'];
    $input_gender = $_POST['gender'];
    $input_id_kelas = $_POST['id_kelas'];
    $sql = "update siswa set id_siswa=$id, nama_siswa='$input_nama_siswa', nisn='$input_nisn', gender='$input_gender', id_kelas='$input_id_kelas' where id_siswa=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:siswa.php');
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
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input value="<?php echo $nama_siswa ?>" type="text" class="form-control" id="nama" name="nama" aria-describedby="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">Nisn</label>
                <input value="<?php echo $nisn ?>" type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Gender</option>
                    <option value="<?php echo $gender ?>" selected><?php echo $gender ?></option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select" aria-label="Default select example">
                    <option selected>pilih kelas</option>
                    <?php
                    $sql = "select * from kelas";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $row):
                        ?>
                        <option value="<?= $row['id'] ?>"><?= $row['tingkat_kelas'].''.$row['jurusan_kelas']; ?> </option>
                    <?php endforeach; ?>
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>

</body>

</html>