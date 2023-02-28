<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Thông báo</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
	  
   	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	  $idcs= $_SESSION['idcs'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM donhang WHERE (idcs=$idcs and (xacnhankh='Hủy đơn' or xacnhankh='Hoàn thành' or xacnhankh='Chờ xử lí')) ORDER BY tgkh DESC";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
		  while($row = $result->fetch_assoc())
		  {
			$trangthai = $row['xacnhankh'];
			$idsp = $row['idsp'];
			$idkh = $row['idkh'];
			$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
			$result1 = $con->query($sql1);
			$row1 = $result1->fetch_assoc();
			$sql2="SELECT * FROM khachhang WHERE idkh=$idkh";
			$result2 = $con->query($sql2);
			$row2 = $result2->fetch_assoc();
			
			if($trangthai == 'Hủy đơn')
			{
				echo "<div class='thongbao huydon'>";
				echo "
				  Khách hàng ".$row2['hoten']." yêu cầu hủy đơn hàng có mã ".$row['iddh']." vào lúc ".$row['tgkh'];
				echo "</div>";
			}
			if($trangthai == 'Hoàn thành')
			  {
				echo "<div class='thongbao hoanthanh'>";
				  echo "
				  Khách hàng ".$row2['hoten']." đã xác nhận nhận thành công được đơn hàng có mã ".$row['iddh']." vào lúc ".$row['tgkh'];
				echo "</div>";
			  }
			if($trangthai == 'Chờ xử lí')
			  {
				echo "<div class='thongbao'>";
				  echo "
				  Khách hàng ".$row2['hoten']." đã đặt đơn hàng có mã ".$row['iddh']." vào lúc ".$row['tgkh']." đang chờ bạn xác nhận.";
				echo "</div>";
			  }
		  }
}
		else 
		{
			echo "<p class='cautb'>Hiện tại bạn chưa có thông báo nào!</p>";
		}
	  $con->close();
	?>
	  </div>
	  
  </body>
</html>