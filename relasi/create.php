<?php
    include 'conect.php';
    if (isset($_POST['submit'])) {
        // Code for get input inside tag form
        $nama_siswa = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $gender = $_POST['gender'];
        $input_id_kelas = $_POST['id_kelas'];

        // Code for add data siswa to database
        $sql = "insert into siswa(nama_siswa, nisn, gender, id_kelas) values('$nama_siswa', '$nisn', '$gender', '$input_id_kelas')";
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
        <h3 class="text-center">Create</h3>
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="nisn" class="form-label">Nisn</label>
                <input type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Gender</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_`kelas" class="form-select" aria-label="Default select example">
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

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>