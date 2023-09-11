<?php
include 'conect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from toko where id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:read.php');
    }else{
        die($conn->connect_error);
    }
}
?>