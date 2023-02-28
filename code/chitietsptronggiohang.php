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
	  
   	<?php 
	  if(isset($_SESSION['idkh']))
		  include 'khachhangchung.php';
	  else 
		  include 'chuadangnhapchung.php'; ?>
	<div class="cachnav">
	<?php
	  $idsp=$_GET['idsp'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM sanpham WHERE (idsp=$idsp)";
	  $result = $con->query($sql);
	  if($result->num_rows > 0)
{
	echo "<table cellpadding='12' class='cangiua'>";
	$row = $result->fetch_assoc();
	$idcs = $row['idcs'];
    $sql1="SELECT * FROM chushop WHERE (idcs=$idcs)";
    $result1 = $con->query($sql1); 
	$row1 = $result1->fetch_assoc();
	echo "<tr>
		<td><img src='".$row['hinhanh']."' style='width:250px; height:250px;'></td>
		<td><b>".$row['tensp']."</b><br>
		Giá: <b>".number_format ($row['giasp'] ,0 , "." , ",")." VNĐ</b><br>
		Số lượng: <b>".$_SESSION['giohang'][$idsp]."</b><br>
		Mô tả chi tiết: ".$row['chitietsp']."<br>
		Xuất xứ: ".$row['xuatxusp']."<br>
		Thuộc shop: <b>".$row1['hoten']."</b><br>
		Thông tin liên hệ shop: <b>".$row1['sdt']."</b><br>
		Vị trí shop: ".$row1['diachi']."<br><br>
		
		<p style='text-align:center;'><button onclick='xoasp(".$row['idsp'].")' class='botron'><center>Xóa</center></button><p>
		</td>
		</tr>";
	
	echo "</table>";
}
	  $con->close();
	?>
	  </div>
	  <script>
		function xoasp(idsp)
		{
			var tb = confirm("Bạn có thực sự muốn xóa sản phẩm khỏi giỏ!");
			if(tb==1) 
				{
					var xmlhttp;
					xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","./xoaspkhoigio.php?idsp="+idsp,true);
					xmlhttp.send();
					window.location="giohang.php";
				}
			
		}
	</script>
  </body>
</html>