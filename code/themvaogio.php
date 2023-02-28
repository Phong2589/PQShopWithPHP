<?php ob_start();?>
<?php 
session_start();
if(!isset($_SESSION["giohang"]))
{
	$_SESSION["giohang"] = array();
}
$idsp = $_GET['idsp'];
if(!isset($_SESSION["giohang"][$idsp]))	$_SESSION["giohang"][$idsp] = 1;
else $_SESSION["giohang"][$idsp] = $_SESSION["giohang"][$idsp] + 1;
include './ketnoicsdl.php';
$sql="SELECT * FROM sanpham WHERE idsp = $idsp";
$result = $con->query($sql);
$row = $result->fetch_assoc();
echo $row['tensp'];
?>

