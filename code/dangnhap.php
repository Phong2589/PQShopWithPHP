<?php ob_start();?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
    <title>Đăng nhập</title>
</head>

<body id="dangnhap">
	<?php
			if(isset($_GET['tbloi']))
			{
				echo "<script type='text/javascript'>alert('Đăng nhập thất bại! Tên đăng nhập hoặc mật khẩu không đúng!');</script>";
			}
		?>
	<div id="formdangnhap">
	
	<h2 style="text-align: center;">Vui lòng đăng nhập để tiếp tục sử dụng!</h2>
	<br>
	
	<form action="xulydangnhap.php" method="post" style="background-color: #DDD6D6; border-radius: 30px;" onsubmit="return kiemtra()">
	<table cellpadding="12" align="center">
		<tr>
			<td><label for="luachon">Lựa chọn:</label></td>
			<td>
				<input type="radio" name="luachon" value="Khách hàng" checked>Khách hàng
				<input type="radio" name="luachon" value="Chủ shop">Chủ shop
			</td>
		</tr>
		<tr>
			<td></td>
			<td><p id="luachontb"></p></td>
		</tr>
		<tr>
			<td><label for="tendangnhap">Tên đăng nhập:<span class="maudo">*</span></label><P></p></td>
			<td><input type="text" name="tendangnhap" id="tendangnhap"></td>
		</tr>
		<tr>
			
			<td class="maudo" colspan="2"><p id="tendangnhaptb"></p></td>
		</tr>
		<tr>
			<td><label for="matkhau">Mật khẩu:<span class="maudo">*</span></label><P></p></td>
			<td><input type="password" name="matkhau" id="matkhau"></td>
		</tr>
		<tr>
			
			<td class="maudo" colspan="2"><p id="matkhautb"></p></td>
		</tr>
		<tr>
			<td><center>
			<a href="./dangki.php" style="text-align: left;">Đăng kí</a>&nbsp;|&nbsp;
			<a href="./quenmatkhau.php" style="text-align: rightt;">Quên mật khẩu</a></center>
			</td>
			<td><center><input type="submit" value="Đăng nhập" class="botron"></center></td>
<!--			<td><center><input type="reset" value="Nhập lại" class="botron"></center></td>-->
		</tr>
		<tr>
			<td></td>
			<td><P id="submitform"></p></td>
		</tr>
<!--
		<tr>
			<td colspan="2">
				<div style='display:flex;justify-content: space-between;'>
					<p><a href="../index.php">Trang chủ</a></p>
					<p><a href="./dangki.php" style="text-align: left;">Đăng kí</a></p>
					<p><a href="./quenmatkhau.php" style="text-align: rightt;">Quên mật khẩu</a></p>
				</div>
			</td>
			<td></td>
			
		</tr>
-->
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><center><a href="#"><img src="./img/gg.png" style="width: 100%;height: 80%; border-radius: 20px;"></a></center></td>
			<td><center><a href="#"><img src="./img/face.png" style="width: 100%;height: 80%;  border-radius: 20px;"></a></center></td>
		</tr>
		
	</table>
		</form>
	</div>
	<script>
		var kt=true;
		function kiemtra()
		{
			var tdn = document.getElementById("tendangnhap").value;
			if(tdn=="") 
				{document.getElementById("tendangnhaptb").innerHTML="Vui lòng nhập vào tên đăng nhập!";
				 kt=false;}
			else 
				{document.getElementById("tendangnhaptb").innerHTML="";
				 kt=true;}
			var mk = document.getElementById("matkhau").value;
			if(mk=="") 
				{document.getElementById("matkhautb").innerHTML="Vui lòng nhập vào mật khẩu!";
				 kt=false;}
			else 
				{document.getElementById("matkhautb").innerHTML="";
				 kt=true;}
			return kt;
		}
	</script>
</body>
</html>
