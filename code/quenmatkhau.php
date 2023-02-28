<?php ob_start();?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
    <title>Quên mật khẩu</title>
</head>

<body id="dangnhap">
	
	<div id="formdangnhap">
	
	<h2 style="text-align: center;">Điền đầy đủ thông tin để tiếp tục!</h2>
	<br>
	<form action="xulyquenmk.php" method="post" style="background-color: #DDD6D6;border-radius: 30px;" onsubmit="return kiemtra()">
	<table cellpadding="5" align="center">
		<tr>
			<td><label for="luachon">Chủ shop hay khách hàng</label></td>
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
			<td><label for="tendangnhap">Tên đăng nhập:</label><P></p></td>
			<td><input type="text" name="tendangnhap" id="tendangnhap"></td>
		</tr>
		<tr>
			<td></td>
			<td class="maudo"><p id="tendangnhaptb"></p></td>
		</tr>
		<tr>	
						<td><label for="sdt">Số điện thoại:</label></td>
						<td><input type="text" name="sdt" id="sdt"></td>
					</tr>
					<tr>
						<td></td>
						<td class="maudo"><P id="sdttb"></p></td>
					</tr>
		<tr>
			<td><center><input type="submit" value="Xác nhận" class="botron"></center></td>
			<td><center><input type="reset" value="Nhập lại" class="botron"></center></td>
		</tr>
		<tr>
				<td colspan="2" align="middle"><a href="../index.php" style="text-decoration: none;">Trở về trang chủ</a></td>
		</tr>
	</table>
	</form>
	</div>
	<script>
		
		function kiemtra()
		{
			var kt=true;
			var tdn = document.getElementById("tendangnhap").value;
			if(tdn=="") 
				{document.getElementById("tendangnhaptb").innerHTML="Vui lòng nhập vào tên đăng nhập!";
				 kt=false;}
			else 
				{document.getElementById("tendangnhaptb").innerHTML="";
				 kt=true;}
			//kiem tra sdt
			 var sdt_reg=/^[0][0-9]{9,10}$/;
			  var sdt = document.getElementById("sdt").value;
			  if(sdt_reg.test(sdt))
			  	{document.getElementById("sdttb").innerHTML="";}
			  else{
				if(sdt=="") 
					document.getElementById("sdttb").innerHTML="Vui lòng nhập vào số điện thoại!";
				else
					document.getElementById("sdttb").innerHTML="Số điện thoại không hợp lệ!";
				kt=false;
				}
			return kt;
		}
	</script>
</body>
</html>
