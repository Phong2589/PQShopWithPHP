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
	  
   	<?php include 'khachhangchung.php'; ?>
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
	$idcs = $row['idcs'];
	$sql1="SELECT * FROM sanpham WHERE idsp=$idsp";
	$result1 = $con->query($sql1);
	$row1 = $result1->fetch_assoc();
		  
	$sql2="SELECT * FROM chushop WHERE idcs=$idcs";
	$result2 = $con->query($sql2);
	$row2 = $result2->fetch_assoc();
		  
	$sql3="SELECT * FROM ttkhmuasp WHERE iddh=$iddh";
	$result3 = $con->query($sql3);
	$row3 = $result3->fetch_assoc();
	echo "<table cellpadding='12' class='cangiua'>";
	if($row3['gioitinh'] == 'nam') $gt="Anh ";
	else $gt = "Chị ";
	echo "<tr>
		<td><img src='".$row1['hinhanh']."' style='width:250px; height:250px;'></td>
		<td><b>".$row1['tensp']."</b><br><br>
		Số lượng: <b>".$row['soluong']."</b><br>
		Tổng tiền: <b>".number_format ($row['tongtien'] ,0 , "." , ",")." VNĐ</b><br>
		Mô tả chi tiết: ".$row1['chitietsp']."<br>
		Xuất xứ: ".$row1['xuatxusp']."<br>
		Thuộc shop: <b>".$row2['hoten']."</b><br>
		Thông tin liên hệ shop: <b>".$row2['sdt']."</b><br>
		Vị trí shop: ".$row2['diachi']."<br>
		Tên khách hàng: <b>".$gt.$row3['hoten']."</b><br>
		Thông tin liên hệ khách hàng: <b>".$row3['sdt']."</b><br>
		Địa chỉ: <b>".$row3['diachi']."</b><br>
		Ghi chú: <b>".$row3['ghichu']."</b><br><br>
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