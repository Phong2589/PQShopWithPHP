<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cập nhật thông tin cá nhân</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'khachhangchung.php'; ?>
	<div class="cachnav">
	<?php
	  		$idkh= $_SESSION['idkh'];
		  	$hoten = $_POST['hoten'];
			$sdt = $_POST['sdt'];
			$diachi = $_POST['diachi'];
			$gioitinh = $_POST['gioitinh'];	
			//csdl
			include 'ketnoicsdl.php';
	  		$sql = "UPDATE khachhang SET hoten='$hoten',sdt='$sdt',diachi='$diachi',gioitinh='$gioitinh' WHERE idkh=$idkh";
			$result = $con->query($sql);
	  		echo "<p class='cautb'>Cập nhật thông tin thành công</p><br>";
	  		$con->close();
	?>
	  </div>
  </body>
</html>