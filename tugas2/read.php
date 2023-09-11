<?php 
session_start(); 
 
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) { 
    header("location: login.php"); 
    exit(); 
} 
?>
<?php include 'conect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-10 m-auto p-3">
        <h3 class="text-center">Data</h3>
        <div class="text-end mt-4">
        <a href="create.php?id='.$id.'" class="btn btn-sm btn-success"> Create</a>
        <button onclick="logout()" class="btn btn-sm btn-danger">Logout</button> 
</div> 


<table class="table table-striped" >
  <thead>
    <tr>
      <th>Nama Produk</th>
      <th>Jenis Produk</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Harga</th>
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if (!empty($username)) {
      
    }

    $sql = "select * from toko";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while($data = mysqli_fetch_assoc($result)){
            $id = $data['id'];
            $nama_produk = $data['nama_produk'];
            $jenis_produk = $data['jenis_produk'];
            $tanggal_masuk = $data['tanggal_masuk'];
            $tanggal_keluar = $data['tanggal_keluar'];
            $harga = $data['harga'];
            echo '
            <tr> 
            <td> '.$nama_produk.'</td>
            <td> '.$jenis_produk.'</td>
            <td> '.$tanggal_masuk.'</td>
            <td> '.$tanggal_keluar.'</td>
            <td> '.$harga.'</td>
            <td class="text-center">
            <a href="update.php?id='.$id.'" class="btn btn-sm btn-primary"> Update</a>
            <button onClick="hapus('.$id.')" class="btn btn-sm btn-danger">Delete</button>  

            </td>
            </tr>';
        }
    }
    ?>
  </tbody>
</table>

  </div>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin di hapus?');
            if(yes == true) {
                window.location.href = "delete.php?id=" + id;
            }
        }

        function logout() {
            var yes = confirm('Yakin Mau Logout')
            if (yes == true) {
                window.location.href = "logout.php"; 
            }
        }
    </script>
</body>
</html>