<?php ob_start();?>
<?php 
session_start();
$idsp = $_GET['idsp'];
unset($_SESSION["giohang"][$idsp]);
echo "";
?>