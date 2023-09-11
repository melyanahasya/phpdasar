<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<?php 
session_start();

session_unset();
$_SESSION['logout'] = 'Berhasil logout.';
header("Location: login.php");

?>