<?php ob_start();?>
<?php 
session_start();
$idsp = $_GET['idsp'];
if($_SESSION["giohang"][$idsp] == 1)
{
	unset($_SESSION["giohang"][$idsp]);
}
else $_SESSION["giohang"][$idsp] = $_SESSION["giohang"][$idsp] - 1;
echo "";
?>