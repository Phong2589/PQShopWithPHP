<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Đặt hàng</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
	<div class="cachnav">
   	<?php 
	  if(isset($_SESSION['idkh'])==false) header('location:' . "./dangnhap.php");
	  else
	  {
		  include 'khachhangchung.php';
		  $idkh=$_SESSION['idkh'];
		  include 'ketnoicsdl.php';
		  $idsp = $_GET['idsp'];
		  $sl = $_SESSION["giohang"][$idsp];
		  $sql="SELECT * FROM sanpham WHERE (idsp=$idsp)";
		  $result = $con->query($sql);
		  $row = $result->fetch_assoc();
		  $tongtien = $sl*$row['giasp'];
		  $idcs = $row['idcs'];
		  if($sl > 0) 
		  {
			  $sql1 = "INSERT INTO donhang (idkh,idcs,idsp,soluong,tongtien,trangthai,xacnhankh) VALUES ($idkh,$idcs,$idsp,$sl,$tongtien,'Chờ xử lí','Chờ xử lí')";
			  $result1 = $con->query($sql1);
		  }
		  
		  $sql2 = "select * from donhang order by iddh DESC limit 1";
		  $result2 = $con->query($sql2);
		  $row2 = $result2->fetch_assoc();
		  $iddhmoi = $row2['iddh'];
		  
		  $hoten = $_POST['hoten'];
		  $sdt = $_POST['sdt'];
	 	  $diachi = $_POST['diachi'];
		  $gioitinh = $_POST['gioitinh'];	
		  $ghichu = $_POST['ghichu'];
		  
		  $sql3 = "INSERT INTO ttkhmuasp (iddh,hoten,sdt,diachi,gioitinh,ghichu) VALUES ($iddhmoi,'$hoten','$sdt','$diachi','$gioitinh','$ghichu')";
		  $result3 = $con->query($sql3);
		  
		  unset($_SESSION['giohang'][$idsp]);
	  }
	  $con->close();
	?>
 	<p class='cautb'>Đặt đơn hàng thành công!</p>
	  </div>
  </body>
</html>