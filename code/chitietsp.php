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
	  $idsp=$_GET['idsp'];
	  $idcs= $_SESSION['idcs'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM sanpham WHERE (idcs=$idcs and idsp=$idsp)";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
	echo "<table border='1' cellpadding='10' class='cangiua'>";
	echo "<tr>
	<th>Tên sản phẩm</th>
	<th>Giá sản phẩm</th>
	<th>Hình ảnh sản phẩm</th>
	<th>Chi tiết sản phẩm</th>
	<th>Xuất xứ sản phẩm</th>
	</tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>
			<td>".$row['tensp']."</td>
			<td>".number_format ($row['giasp'] ,0 , "." , ",")." VNĐ</td>
			<td><img src='".$row['hinhanh']."' style='width:250px; height:250px;'></td>
			<td>".$row['chitietsp']."</td>
			<td>".$row['xuatxusp']."</td>
			</tr>";
	}
	
	echo "</table>";
}
	  $con->close();
	?>
	  </div>
  </body>
</html>