<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
	<title>Cập nhật số lượng sản phẩm</title>
</head>

<body>
	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	//lấy dữ liệu
	$idsp= $_GET['idsp'];
	//csdl
	include 'ketnoicsdl.php';
	$sql1 = "select * from sanpham where idsp=$idsp";
	$result1 = $con->query($sql1);
	$row = $result1->fetch_assoc();
	if($row['conhang'] == 'Còn')
	{
		$sql = "UPDATE sanpham SET conhang='Hết' where idsp=$idsp";
		$result = $con->query($sql);
	}
	else
	{
		$sql = "UPDATE sanpham SET conhang='Còn' where idsp=$idsp";
		$result = $con->query($sql);
	}
	$con->close();
	?>
	</div>
</body>
</html>