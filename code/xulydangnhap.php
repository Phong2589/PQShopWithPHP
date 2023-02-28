<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
	<title>Xử lý đăng nhập</title>
</head>

<body>
	<?php
		$luachon = $_POST['luachon'];
		$tendangnhap=$_POST['tendangnhap'];
		$matkhau = md5($_POST['matkhau']);
		include 'ketnoicsdl.php';
		if($luachon == "Khách hàng")
			{$sql="SELECT * FROM khachhang WHERE (tendangnhap='$tendangnhap' and matkhau='$matkhau')";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			if ($result->num_rows > 0) 
				{
					$_SESSION['tendangnhap'] = $tendangnhap;
					$_SESSION['idkh'] = $row['idkh'];
					header('location: khachhang.php');
				}
			else 
			{
				header('location: dangnhap.php?tbloi=1');
			}
			}
		else 
			{$sql="SELECT * FROM chushop WHERE (tendangnhap='$tendangnhap' and matkhau='$matkhau')";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			if ($result->num_rows > 0) 
				{
					$_SESSION['tendangnhap'] = $tendangnhap;
					$_SESSION['idcs'] = $row['idcs'];
					header('location: chushop.php');
				}
			else 
			{
				echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
				header('location: dangnhap.php?tbloi=1');
			}
			}
		$con->close();
	?>
</body>
</html>