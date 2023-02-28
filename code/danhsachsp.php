<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Danh sách sản phẩm</title>
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
	  $sql="SELECT * FROM sanpham WHERE (idcs=$idcs and and daxoa=0)";
	  $result = $con->query($sql);
	  $stt=1;
	  if($result->num_rows > 0)
{
	echo "<table border='1' cellpadding='10 ' class='cangiua' style='text-align:center;'>";
	echo "<tr>
	<th>STT</th>
	<th>Tên sản phẩm</th>
	<th>Giá sản phẩm</th>
	<th>Đã bán</th>
	<th>Còn hàng</th>
	<th>Xem chi tiết</th>
	<th>Cập nhật sản phẩm</th>
	<th>Xóa sản phẩm</th>
	<th>Cập nhật còn hàng</th>
	</tr>";
	while($row = $result->fetch_assoc())
	{
		$idspht = $row['idsp'];
		$sqlht="SELECT * FROM donhang where (idsp=$idspht and xacnhankh='Hoàn thành')";
		if($resultht = $con->query($sqlht))	$daban = $resultht->num_rows;
		else $daban=0;
		if($row['conhang'] == 'Còn') $xacnhanslh="Hết hàng";
		else $xacnhanslh = "Còn hàng";
		echo "<tr>
			<td>".$stt."</td>
			<td>".$row['tensp']."</td>
			<td>".number_format ($row['giasp'] ,0 , "." , ",")." VNĐ</td>
			<td>".$daban."</td>
			<td>".$row['conhang']."</td>
			<td><center><button class='botron'><a href='chitietsp.php?idsp=".$row['idsp']."' style='text-decoration: none;'>Xem</a></button></center></td>
			<td><center><button class='botron'><a href='capnhatsp.php?idsp=".$row['idsp']."' style='text-decoration: none;'> Sửa</a></button></center></td>
			<td><center><button class='botron'><a href='xoasp.php?idsp=".$row['idsp']."' onclick='return xacnhan()' style='text-decoration: none;'>Xóa</a></button></center></td>
			
			<td><center><button onclick='xacnhansl(".$row['idsp'].")' id='".$row['idsp']."' class='botron'>".$xacnhanslh."</button></center></td>
			</tr>";
		$stt++;
	}
	
	echo "</table>";
}
else 
{
	echo "<p class='cautb'>Bạn chưa có sản phẩm nào!</p><br>";
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
		  
		  function xacnhansl(idsp)
		  {
			  var sl = document.getElementById(idsp).innerHTML;
			  var tbsl = confirm("Bạn có chắc muốn xác nhận "+sl);
			  
			  if(tbsl == 1) 
				  {
					    
					    var xmlhttp;
						xmlhttp=new XMLHttpRequest();
						xmlhttp.onreadystatechange=function() {
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						location.reload();
						} }
						
						xmlhttp.open("GET","capnhatsl.php?idsp="+idsp,true);
						xmlhttp.send();
				  }
		  }
	  </script>
  </body>
</html>