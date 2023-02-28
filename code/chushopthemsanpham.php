<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
    <title>Thêm sản phẩm</title>
  </head>
	
  <body id="dangki">
	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<div id="formdangki">
	<h2 style="text-align: center;">Vui lòng điền đầy đủ thông tin để thêm sản phẩm!</h1>
	
	<form action="xulythemsp.php" style="background-color: #DDD6D6;border-radius: 30px;" method="post" enctype="multipart/form-data" onsubmit="return kiemtra();">
	<table cellpadding="12" align="center">
		<tr>
			<td><label for="tensp">Tên sản phẩm:</label></td>
			<td><input type="text" name="tensp" id="tensp"></td>
		</tr>
		<tr>
			<td></td>
			<td><p id="tensptb" class="maudo"></p></td>
		</tr>
		<tr>
			<td><label for="giasp">Giá sản phẩm:</label></td>
			<td><input type="text" name="giasp" id="giasp">(VNĐ)</td>
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
			<td><textarea name="chitietsp" id="chitietsp" rows="4" cols="50"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><p id="chitietsptb" class="maudo"></p></td>
		</tr>
		<tr>
			<td><label for="xuatxusp">Xuất xứ sản phẩm:</label></td>
			<td><input type="text" name="xuatxusp" id="xuatxusp"></td>
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
					document.getElementById("giasptb").innerHTML="Giá sản phẩm là số và bắt đầu bằng 1 số khác 0, từ 3 - 15 số!";
				checksp=false;
				}
			  //kiểm tra hình ảnh sản phẩm
			  var myfile = document.getElementById("myfile").value;
			  if(myfile=="") 
				{document.getElementById("myfiletb").innerHTML="Vui lòng chọn ảnh cho sản phẩm!";
				 checksp=false;}
			  else 
				{document.getElementById("myfiletb").innerHTML="";}
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