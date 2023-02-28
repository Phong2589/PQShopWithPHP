<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cập nhật sản phẩm</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
  </head>
	
  <body>
	<?php include 'chushopchung.php'; ?>
	<?php
	  $idsp= $_GET['idsp'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM sanpham WHERE (idsp=$idsp)";
	  $result = $con->query($sql);
	  $row = $result->fetch_assoc();
	?>
	  <?php 
	  	$_SESSION['idsp']=$_GET['idsp'];
	  ?>
	<div class="cachnav">
	<div id="formdangki">
	<h1>Vui lòng điền đầy đủ thông tin để cập nhật sản phẩm!</h1>
	<table  cellspacing="0" cellpadding="10">
		<tr>
			<td>
				<form action="xulycapnhatsp.php" style="background-color: #DDD6D6" method="post" enctype="multipart/form-data" onsubmit="return kiemtra();">
				<table cellpadding="12">
					<tr>
						<td><label for="tensp">Tên sản phẩm:</label></td>
						<td><input type="text" name="tensp" id="tensp" value="<?php echo $row['tensp'];?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><p id="tensptb" class="maudo"></p></td>
					</tr>
					<tr>
						<td><label for="giasp">Giá sản phẩm:</label></td>
						<td><input type="text" name="giasp" id="giasp" value="<?php echo $row['giasp'];?>">(VNĐ)</td>
					</tr>
					<tr>
						<td></td>
						<td><p id="giasptb" class="maudo"></p></td>
					</tr>
					<tr>
						<td><label for="myfile">Ảnh sản phẩm:</label></td>
						<td><input type="file" name="myfile" id="myfile"></td>
					</tr>
					<tr>
						<td></td>
						<td><p id="myfiletb" class="maudo"></p></td>
					</tr>
					<tr>
						<td><label for="chitietsp">Chi tiết sản phẩm:</label></td>
						<td><textarea name="chitietsp" id="chitietsp" rows="4" cols="50"><?php echo $row['chitietsp'];?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><p id="chitietsptb" class="maudo"></p></td>
					</tr>
					<tr>
						<td><label for="xuatxusp">Xuất xứ sản phẩm:</label></td>
						<td><input type="text" name="xuatxusp" id="xuatxusp" value="<?php echo $row['xuatxusp'];?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><p id="xuatxusptb" class="maudo"></p></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Lưu sản phẩm" align="middle" class="botron">
							<input type="reset" value="Làm lại" class="botron">
						</td>
					</tr>
				</table>	
				</form>
			</td>
		</tr>
	</table>
	</div>
	</div>
	  <script>
		
	  	function kiemtra()
		  {
			  checksp=true;
			  //Kiểm tra tên sản phẩm
			  var tensp = document.getElementById("tensp").value;
			  if(tensp=="") 
				{document.getElementById("tensptb").innerHTML="Vui lòng nhập vào tên sản phẩm!";
				 checksp=false;}
			  else 
				{document.getElementById("tensptb").innerHTML="";}
			  //Kiểm tra giá sản phẩm
			  var gia_reg=/^[1-9][0-9]{3,15}$/;
			  var giasp = document.getElementById("giasp").value;	
			  if(gia_reg.test(giasp))
			  	{document.getElementById("giasptb").innerHTML="";}
			  else{
				if(giasp=="") 
					document.getElementById("giasptb").innerHTML="Vui lòng nhập vào giá sản phẩm!";
				else
					document.getElementById("giasptb").innerHTML="Giá sản phẩm là số và bắt đầu bằng 1 số khác 0 gồm nhiều hơn 3 số!";
				checksp=false;
				}
			  //Kiểm tra chi tiết sản phẩm
			  var chitietsp = document.getElementById("chitietsp").value;
			  if(chitietsp=="") 
				{document.getElementById("chitietsptb").innerHTML="Vui lòng nhập vào chi tiết sản phẩm!";
				 checksp=false;}
			  else 
				{document.getElementById("chitietsptb").innerHTML="";}
			  //Kiểm tra xuất xứ sản phẩm
			  var xuatxusp = document.getElementById("xuatxusp").value;
			  if(xuatxusp=="") 
				{document.getElementById("xuatxusptb").innerHTML="Vui lòng nhập vào xuất xứ sản phẩm!";
				 checksp=false;}
			  else 
				{document.getElementById("xuatxusptb").innerHTML="";}
			  return checksp;
		  }
		  
	  </script>
  </body>
</html>