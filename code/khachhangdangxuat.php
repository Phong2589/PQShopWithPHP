<?php ob_start();?>
<?php include 'khachhangchung.php'; ?>
<?php
session_start();

unset($_SESSION['tendangnhap']);
unset($_SESSION['luachon']);
unset($_SESSION['idkh']);
header('location:' . "../index.php");
?>