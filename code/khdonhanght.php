<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Đơn hàng</title>
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
	  $sql="SELECT * FROM donhang WHERE (idkh=$idkh and (xacnhankh='Hoàn thành' or trangthai='Hủy'))";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
	echo "<table border='1' cellpadding='10 ' class='cangiua'>";
	echo "<tr>
	<th>Tên sản phẩm</th>
	<th>Số lượng</th>
	<th>Tổng tiền</th>
	<th><center>Chủ shop</center></th>
	<th>Số điện thoại</th>
	<th>Chi tiết đơn hàng</th>
	<th>Trạng thái đơn hàng</th>
	</tr>";
	while($row = $result->fetch_assoc())
	{
		if($row['xacnhankh'] == "Hoàn thành") $trangthai=$row['xacnhankh'];
		else $trangthai=$row['trangthai'];
		$idsp = $row['idsp'];
		$idcs = $row['idcs'];
		$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
	  	$result1 = $con->query($sql1);
		$row1 = $result1->fetch_assoc();
		$sql2="SELECT * FROM chushop WHERE idcs=$idcs";
	  	$result2 = $con->query($sql2);
		$row2 = $result2->fetch_assoc();
		echo "<tr>
			<td>".$row1['tensp']."</td>
			<td><center>".$row['soluong']."</center></td>
			<td><center>".$row['tongtien']."</center></td>
			<td><center>".$row2['hoten']."</center></td>
			<td><center>".$row2['sdt']."</center></td>
			<td><center><button class='botron'><a href='./chitietspdonhang.php?iddh=".$row['iddh']."' style='text-decoration: none;'>Chi tiết<a></button></center></td>
			<td><center>".$trangthai."</center></td>
			</tr>";
	}
	
	echo "</table>";
}
else 
{
	echo "<h1>Bạn chưa có đơn hàng nào hoàn thành!</h1><br>";
}

	  $con->close();
	?>
	  </div>
	  <script>
	  	function xacnhan()
		  {
			  var tb = confirm("Bạn có thực sự muốn xóa!");
			  if(tb==1) return true;
			  else return false;
		  }
	  </script>
  </body>
</html>