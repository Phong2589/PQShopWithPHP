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
	<title>Xử lý đổi mật khẩu</title>
</head>

<body>
	<?php
	//lấy dữ liệu
	$tendn = $_SESSION['tendoimk'];
	$luachon = $_SESSION['luachondoimk'];
	$matkhau = md5($_POST['matkhau']);
	//csdl
	include 'ketnoicsdl.php';
	if($luachon == "Khách hàng")
	{
		$sql = "UPDATE khachhang SET matkhau='$matkhau' where tendangnhap='$tendn'" ;
	}
	else
	{
		$sql = "UPDATE chushop SET matkhau='$matkhau' where tendangnhap='$tendn'" ;
	}
    $result = $con->query($sql);
	header('location: dangnhap.php');
	$con->close();
	?>
</body>
</html>