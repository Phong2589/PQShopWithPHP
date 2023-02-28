<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Thông tin cá nhân</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
	<div class="cachnav">
   	<?php include 'khachhangchung.php'; ?>
	<div class="container">
	<?php
	  $idkh= $_SESSION['idkh'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM khachhang WHERE (idkh=$idkh)";
	  $result = $con->query($sql);
	  $row = $result->fetch_assoc();
	  echo "
	  		Tên đăng nhập: <b>".$row['tendangnhap']."</b><br>
			Số điện thoại: <b>".$row['sdt']."</b><br>
			Họ và tên: <b>".$row['hoten']."</b><br>
			Giới tính: <b>".$row['gioitinh']."</b><br>
			Địa chỉ: <b>".$row['diachi']."</b><br>
			<a href='./khachhangcapnhatcanhan.php' style='text-decoration: none;'>Cập nhật thông tin cá nhân</a>
			";
	  $con->close();
	?>
	
	</div>
	</div>
  </body>
</html>