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
		
	  $idspht = $idsp;
	  $sqlht="SELECT * FROM donhang where (idsp=$idspht and xacnhankh='Hoàn thành')";
	  if($resultht = $con->query($sqlht))	$daban = $resultht->num_rows;
	  else $daban=0;
		
	  if($result->num_rows > 0)
{
	echo "<table cellpadding='10' class='cangiua'>";
	$row = $result->fetch_assoc();
	$idcs = $row['idcs'];
    $sql1="SELECT * FROM chushop WHERE (idcs=$idcs)";
    $result1 = $con->query($sql1); 
	$gia = number_format ($row['giasp'] ,0 , "." , ",");
	$row1 = $result1->fetch_assoc();
	echo "<tr>
		<td><img src='".$row['hinhanh']."' style='width:250px; height:250px;'></td>
		<td><b>".$row['tensp']."</b><br>
		Giá: <b>".$gia." VNĐ</b><br>
		Đã bán: <b>$daban</b><br>
		Mô tả chi tiết: ".$row['chitietsp']."<br>
		Xuất xứ: ".$row['xuatxusp']."<br>
		Thuộc shop: <b>".$row1['hoten']."</b><br>
		Thông tin liên hệ shop: <b>".$row1['sdt']."</b><br>
		Vị trí shop: ".$row1['diachi']."<br><br>
		<p style='text-align:center;'><button onclick='themvaogio(".$row['idsp'].")' class='botron'>Thêm vào giỏ</button><p>
		</td>
		</tr>";
	
	echo "</table>";
}
	  $con->close();
	?>
	  </div>
	  <script>
		function themvaogio(idsp)
		{
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) { 
			alert("Sản phẩm " + xmlhttp.responseText + "đã được thêm vao giỏ hàng!");} }

			xmlhttp.open("GET","./themvaogio.php?idsp="+idsp,true);
			xmlhttp.send();
			
		}
	</script>
  </body>
</html>