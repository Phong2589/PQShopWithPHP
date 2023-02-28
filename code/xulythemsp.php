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
	<title>Xử lý thêm sản phẩm</title>
</head>

<body>
	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	//lấy dữ liệu
	$idcs= $_SESSION['idcs'];
	$tensp = $_POST['tensp'];
	$giasp=$_POST['giasp'];
	$chitietsp = $_POST['chitietsp'];
	$xuatxusp = $_POST['xuatxusp'];
	//tải hình lên thư mục
	$duongdan="./img/" . $_FILES['myfile']['name'];
	$nameimg=$_FILES['myfile']['name'];
	move_uploaded_file($_FILES['myfile']['tmp_name'], $duongdan);
	//csdl
	include 'ketnoicsdl.php';
	//cau lenh sql
	$sql = "INSERT INTO sanpham (idcs, tensp, giasp, hinhanh, chitietsp, xuatxusp,conhang) VALUES ($idcs,'$tensp',$giasp,'$duongdan', '$chitietsp','$xuatxusp','Còn')";
	$result = $con->query($sql);
	$con->close();
	echo "<p class='cautb'>Thêm sản phẩm thành công!</p>";
	?>
	</div>
</body>
</html>