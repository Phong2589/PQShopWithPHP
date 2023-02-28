<?php ob_start();?>
<?php include 'chushopchung.php'; ?>
<?php
session_start();

unset($_SESSION['tendangnhap']);
unset($_SESSION['luachon']);
unset($_SESSION['idcs']);
header('location:' . "../index.php");
?>