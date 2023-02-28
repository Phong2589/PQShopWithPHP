<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Chi tiết sản phẩm</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
	  
   	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	  $iddh=$_GET['iddh'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM donhang WHERE (iddh=$iddh)";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$idsp = $row['idsp'];
	$idkh = $row['idkh'];
	$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
	$result1 = $con->query($sql1);
	$row1 = $result1->fetch_assoc();
		  
	$sql2="SELECT * FROM ttkhmuasp WHERE iddh=$iddh";
	$result2 = $con->query($sql2);
	$row2 = $result2->fetch_assoc();
	if($row2['gioitinh'] == 'nam') $gt="Anh ";
	else $gt = "Chị ";
	echo "<table cellpadding='10 ' class='cangiua'>";
	
	echo "<tr>
		<td><img src='".$row1['hinhanh']."' style='width:250px; height:250px;'></td>
		<td><b>".$row1['tensp']."</b><br><br>
		Số lượng: <b>".$row['soluong']."</b><br>
		Tổng tiền: <b>".number_format ($row['tongtien'] ,0 , "." , ",")." VNĐ</b><br>
		Mô tả chi tiết: ".$row1['chitietsp']."<br>
		Xuất xứ: ".$row1['xuatxusp']."<br>
		Tên khách hàng: <b>".$gt.$row2['hoten']."</b><br>
		Thông tin liên hệ khách hàng: <b>".$row2['sdt']."</b><br>
		Địa chỉ: <b>".$row2['diachi']."</b><br>
		Ghi chú: <b>".$row2['ghichu']."</b><br><br>
		</td>
		</tr>";
	
	echo "</table>";
}
	  $con->close();
	?>
	  </div>
  </body>
</html>