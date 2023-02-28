<?php ob_start();?>
<?php session_start();
$_SESSION['tongtien'] = 0;?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Giỏ hàng</title>
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
	  <div id='giohang'>
		<?php
		if(!empty($_SESSION["giohang"])){
		include './ketnoicsdl.php';
		$sql="SELECT * FROM sanpham WHERE idsp in (".implode(',',array_keys($_SESSION['giohang'])).")";
		$result = $con->query($sql);
		if($result->num_rows > 0)
	{
		echo "<p style='font-size:30px; line-height:50px; font-weight:bold; text-align:center;'>Danh sách sản phẩm</p>";
		echo "<table border='1' cellpadding='10 ' class='cangiua'>";
		echo "<tr align='center' style='font-weight:bold;'>
		<td>Tên sản phẩm</td>
		<td>Giá sản phẩm</td>
		<td>Hình ảnh</td>
		<td>Xem chi tiết</td>
		<td>Số lượng</td>
		<th>Đơn giá</th>
		<td>Xóa</td>
		<td>Mua ngay</td>
		<td>Chọn mua</td>
		</tr>";
		while($row = $result->fetch_assoc())
		{
			if($_SESSION['giohang'][$row['idsp']]>0){
				$name = $row['tensp'];
			echo "<tr>
				<td><b>".$row['tensp']."</b></td>
				<td><center><b>".number_format ($row['giasp'] ,0 , "." , ",")." VNĐ</b></center></td>
				<td><img src='".$row['hinhanh']."' style='height:100px;width: 150px;'/></td>
				<td><center><button class='botron'><a href='./chitietsptronggiohang.php?idsp=".$row['idsp']."' style='text-decoration: none;' class='xemchitiet'>Chi tiết</a></button></center></td>
				
				<td><center><button onclick='giamsl(".$row['idsp'].")' style='border: 2px solid black;
	border-radius: 6px;'>-</button>&nbsp;<input value=".$_SESSION['giohang'][$row['idsp']]." id='".$row['idsp']."' style='width:30%; text-align:center;' onchange='nhapsoluong(".$row['idsp'].",this.value)'>&nbsp;<button onclick='tangsl(".$row['idsp'].")' style='border: 2px solid black;
	border-radius: 6px;'>+</button></center></td>
				
				<td><center><b>".number_format ($_SESSION['giohang'][$row['idsp']]*$row['giasp'] ,0 , "." , ",")."&nbsp;VNĐ</b></center></td>
				
				<td><button onclick='xoasp(".$row['idsp'].")' class='botron'><center>Xóa</center></button></td>
				
				<td><center><button class='botron'><a href='ttdathang.php?idsp=".$row['idsp']."&muangay=1' style='text-decoration: none;' class='xemchitiet' onclick='return muangay(`".$name."`)'>Mua ngay</a></button></center></td>
				
				<td><center><input type='checkbox'></center></td>
				
				</tr>";
				$_SESSION['tongtien'] = $_SESSION['tongtien']  + $_SESSION['giohang'][$row['idsp']]*$row['giasp'];
			}
		}
		echo "<tr>
          <td colspan='5'><center><b>Tổng cộng:</b></center></td>
		<th><center><b>".number_format ($_SESSION['tongtien'] ,0 , "." , ",")."&nbsp;VNĐ</b></center></th>
		<td></td><td></td><td></td>
		</tr>";
		echo "
			<tr>
				<td colspan='9'><center><button class='botron'><a href='ttdathang.php?tatca=1' style='text-decoration: none;' class='xemchitiet' onclick='return dathang()'>Đặt tất cả</a></button></center></td>
			</tr>
		";
		echo "</table>";
	}
		
		  $con->close();
	}//cua if session
	else
		{
			echo "<p class='cautb'>Giỏ hàng trống</p>";
		}
		?>
	</div>
	</div>
    
	<p id = "test"></p>
	<script>
		function giamsl(idsp)
		{
			var gt = document.getElementById(idsp).value;
			var kt = "1";
			var kq = gt.localeCompare(kt);
			if( kq == 0)
				{
					var tb1 = confirm("Bạn có chắc muốn xóa sản phẩm khỏi giỏ!");
					if(tb1==1) 
						{
							var xmlhttp;
							xmlhttp=new XMLHttpRequest();
							xmlhttp.open("GET","./giamsl.php?idsp="+idsp,true);
							xmlhttp.send();
							location.reload();
						}
				}
			else 
			{
				var xmlhttp;
				xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","./giamsl.php?idsp="+idsp,true);
				xmlhttp.send();
			}
			location.reload();
		}
		
		function tangsl(idsp)
		{
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			
			xmlhttp.open("GET","./tangsl.php?idsp="+idsp,true);
			xmlhttp.send();
			location.reload();
		}
		function xoasp(idsp)
		{
			var tb = confirm("Bạn có chắc muốn xóa sản phẩm khỏi giỏ!");
			if(tb==1) 
				{
					var xmlhttp;
					xmlhttp=new XMLHttpRequest();
					
					xmlhttp.open("GET","./xoaspkhoigio.php?idsp="+idsp,true);
					xmlhttp.send();
				}
			location.reload();
		}
		function dathang()
		{
			var tb = confirm("Bạn có chắc muốn mua tất cả các sản phẩm trong giỏ hàng!");
			if(tb==1) 
				return true;
			else return false;
		}
		function muangay(name)
		{
			var tb = confirm("Bạn có chắc muốn mua sản phẩm "+name+" !");
			if(tb==1) 
				return true;
			else return false;
		}
		function nhapsoluong(idsp,gt)
		{
			var sl = Number(gt);
			if(sl==0) 
				{
					var tb = confirm("Bạn có thực muốn xóa sản phẩm!");
					if(tb==1)
					{
						var xmlhttp;
						xmlhttp=new XMLHttpRequest();
						xmlhttp.open("GET","./xoaspkhoigio.php?idsp="+idsp,true);
						xmlhttp.send();
					}
					location.reload();
				}
			else if(sl>0) 
				{
					var xmlhttp;
					xmlhttp=new XMLHttpRequest();
					xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("test").innerHTML="";} }
					xmlhttp.open("GET","./capnhatslmoi.php?idsp="+idsp+"&gt="+sl,true);
					xmlhttp.send();
					location.reload();
				}
					else 
					{
						location.reload();
						alert("Bạn nhập vào không đúng định dạng!");
					}
			
		}
	</script>
  </body>
</html>