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
	  
   	<?php include 'khachhangchung.php'; ?>
	<div class="cachnav">
	<?php
	  $idkh= $_SESSION['idkh'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM donhang WHERE (idkh=$idkh and (trangthai='Hủy đơn' or trangthai='Hoàn thành' or trangthai='Đang xử lí')) ORDER BY tgcs DESC";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
		  while($row = $result->fetch_assoc())
		  {
			$trangthai = $row['trangthai'];
			$idsp = $row['idsp'];
			$idcs = $row['idcs'];
			$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
			$result1 = $con->query($sql1);
			$row1 = $result1->fetch_assoc();
			$sql2="SELECT * FROM chushop WHERE idcs=$idcs";
			$result2 = $con->query($sql2);
			$row2 = $result2->fetch_assoc();
			if($trangthai == 'Hủy đơn')
			{
				echo "<div class='thongbao huydon'>";
				echo "
				  Chủ shop ".$row2['hoten']." đã chấp nhận yêu cầu hủy đơn hàng có mã ".$row['iddh']." vào lúc ".$row['tgcs'];
				echo "</div>";
			}
			else if($trangthai == 'Hoàn thành')
			  {
				echo "<div class='thongbao hoanthanh'>";
				echo "
				  Chủ shop ".$row2['hoten']." đã xác nhận giao thành công đơn hàng có mã ".$row['iddh']." vào lúc ".$row['tgcs'];
				echo "</div>";
			  }
			  else if($trangthai == 'Đang xử lí')
			  {
				echo "<div class='thongbao'>";
				echo "
				  Chủ shop ".$row2['hoten']." đã xác nhận hàng có mã ".$row['iddh']." vào lúc ".$row['tgcs'];
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