<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Chờ xử lí</title>
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
	  $sql="SELECT * FROM donhang WHERE (idkh=$idkh and (xacnhankh='Chờ xử lí' or trangthai='Chờ xử lí'))";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
	echo "<table border='1' cellpadding='10 ' class='cangiua' style='text-align:center;'>";
	echo "<tr>
	<th>Mã đơn hàng</th>
	<th>Tên sản phẩm</th>
	<th>Số lượng</th>
	<th>Tổng tiền</th>
	<th><center>Chủ shop</center></th>
	<th>Số điện thoại</th>
	<th>Trạng thái</th>
	<th>Chi tiết đơn hàng</th>
	<th>Yêu cầu hủy đơn</th>
	</tr>";
	while($row = $result->fetch_assoc())
	{
		$idsp = $row['idsp'];
		$idcs = $row['idcs'];
		$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
	  	$result1 = $con->query($sql1);
		$row1 = $result1->fetch_assoc();
		$sql2="SELECT * FROM chushop WHERE idcs=$idcs";
	  	$result2 = $con->query($sql2);
		$row2 = $result2->fetch_assoc();
		
		echo "<tr><td><center>".$row['iddh']."</center></td>
		<td>".$row1['tensp']."</td>
		<td><center>".$row['soluong']."</center></td>
		<td><center>".number_format ($row['tongtien'] ,0 , "." , ",")." VNĐ</center></td>
		<td><center>".$row2['hoten']."</center></td>
		<td><center>".$row2['sdt']."</center></td>
		<td><center>".$row['xacnhankh']."</center></td>
		<td><center><button class='botron'><a href='./chitietspdonhang.php?iddh=".$row['iddh']."' style='text-decoration: none;' class='xemchitiet'>Chi tiết<a></button></center></td>
		<td><center><button class='botron'><a href='./khhuydon.php?iddhxl=".$row['iddh']."' style='text-decoration: none;' onclick='return huydon()' class='xemchitiet'>Hủy đơn<a></button></center></td>
		</tr>";
}
	
	echo "</table>";
}
else 
{
	echo "<p class='cautb'>Bạn chưa có đơn hàng nào!</p><br>";
}

	  $con->close();
	?>
		<?php
			if(isset($_GET['tbloi']))
			{
				echo "<script type='text/javascript'>alert('Lỗi! Không thể thực hiện thao tác này!');</script>";
			}
		?>
	  </div>
	  <script>
		  function huydon()
		  {
			  var tb = confirm("Bạn có chắc muốn hủy đơn hàng!");
			  if(tb==1) return true;
			  else return false;
		  }
	  </script>
  </body>
</html>