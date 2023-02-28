<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cập nhật</title>
</head>

<body>
	<?php ob_start();session_start();?>
	<?php
	$gt = $_GET['gt'];
	$idsp = $_GET['idsp'];
	$_SESSION["giohang"][$idsp] = $gt;
	?>
	<p>cap nhat</p>
</body>
</html>