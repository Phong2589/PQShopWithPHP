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
	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	//lấy dữ liệu
	$idcs = $_SESSION['idcs'];
	$matkhaucu = md5($_POST['matkhaucu']);
	$matkhau = md5($_POST['matkhau']);
	//csdl
	include 'ketnoicsdl.php';
	$sql="SELECT * FROM chushop WHERE (idcs=$idcs)";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $mkcu = $row['matkhau'];
    if($matkhaucu == $mkcu)
	{
		$sql1 = "UPDATE chushop SET matkhau='$matkhau' where idcs=$idcs" ;
		$result1 = $con->query($sql1);
		echo "<p class='cautb'>Bạn đã đổi mật khẩu thành công!</p>";
	}
 	else
	{
		echo "<p class='cautb'>Đổi mật khẩu thất bại! Mật khẩu bạn nhập vào không đúng!</p>";
	}
	$con->close();
	?>
	</div>
	
</body>
</html>