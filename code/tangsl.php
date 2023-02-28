<?php ob_start();?>
<?php 
session_start();
$idsp = $_GET['idsp'];
$_SESSION["giohang"][$idsp] = $_SESSION["giohang"][$idsp] + 1;
echo "";
?>