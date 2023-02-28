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
	<title>Đổi mật khẩu</title>
</head>

<body>
	<?php
	
		$luachon = $_POST['luachon'];
		$tendangnhap=$_POST['tendangnhap'];
		$sdt = $_POST['sdt'];
		include 'ketnoicsdl.php';
		if($luachon == "Khách hàng")
			{
				$sql="SELECT * FROM khachhang WHERE tendangnhap='$tendangnhap'";
			}
		else 
			{
			$sql="SELECT * FROM chushop WHERE tendangnhap='$tendangnhap'";
			}
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		if ($result->num_rows > 0) 
			{
				if($row['sdt'] == $sdt)
				{
					$_SESSION['tendoimk'] = $tendangnhap;
					$_SESSION['luachondoimk'] = $luachon;
					header('location: doimkquen.php');
				}
				else
				{
					include 'chuadangnhapchung.php';
					echo "<div class='cachnav'><p class='cautb'>Số điện thoại nhập vào sai!<p></div>";
				}
			}
		else
		{
			include 'chuadangnhapchung.php';
			echo "<div class='cachnav'><p class='cautb'>Tên đăng nhập sai!<p></div>";
		}
		$con->close();
	?>
</body>
</html>