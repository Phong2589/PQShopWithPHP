<?php ob_start();?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PQ shop</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
	<title>Xử lý đăng kí</title>
</head>

<body>
	
	<?php
	//lấy dữ liệu
	$luachon = $_POST['luachon'];
	$tendangnhap=$_POST['tendangnhap'];
	$matkhau = md5($_POST['matkhau']);
	$hoten = $_POST['hoten'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$gioitinh = $_POST['gioitinh'];	
	//csdl
	include 'ketnoicsdl.php';
	//cau lenh sql
	if($luachon == "Khách hàng")	
		$sql = "INSERT INTO khachhang (tendangnhap, matkhau, sdt, diachi, hoten, gioitinh) VALUES ('$tendangnhap','$matkhau','$sdt','$diachi', '$hoten','$gioitinh')";
	else
		$sql = "INSERT INTO chushop (tendangnhap, matkhau, sdt, diachi, hoten, gioitinh) VALUES ('$tendangnhap','$matkhau','$sdt','$diachi', '$hoten','$gioitinh')";
	$result = $con->query($sql);
	$con->close();
	header('location: dangnhap.php');
	?>
</body>
</html>