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
    <title>Đổi mật khẩu</title>
  </head>
	
  <body>
	<div id="formdangnhap">
	<h4 class="maudo" style="text-align: center; line-height: 40px;">Vui lòng điền đầy đủ thông tin bên dưới để đổi mật khẩu mới!</h4>
				<form action="xulydoimkquen.php" style="background-color: #DDD6D6; border-radius: 30px;" method="post" onsubmit="return kiemtra()"> 
				<table cellpadding="12" align="center">
					<tr>
						<td><label for="matkhau">Mật khẩu mới:</label></td>
						<td><input type="password" name="matkhau" id="matkhau"></td>
					</tr>
					<tr>
						<td></td>
						<td class="maudo"><p id="matkhautb"></p></td>
					</tr>
					<tr>	
						<td><label for="matkhaugolai">Gõ lại mật khẩu:</label></td>
						<td><input type="password" name="matkhaugolai" id="matkhaugolai"></td>
					</tr>
					<tr>
						<td></td>
						<td class="maudo"><P id="matkhaugolaitb"></p></td>
					</tr>
					<tr align="middle">
						<td><input type="submit" value="Đổi" class="botron"></td>
						<td>
							<input type="reset" value="Làm lại" class="botron">
						</td>
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
			  check=true;
			  var mk_reg=/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9]{6,15}$/;
			  //Kiểm tra mật khẩu
			  
			  var mk = document.getElementById("matkhau").value;	
			  if(mk_reg.test(mk))
			  	{document.getElementById("matkhautb").innerHTML="";}
			  else{
				if(mk=="") 
					document.getElementById("matkhautb").innerHTML="Vui lòng nhập vào mật khẩu!";
				else
					document.getElementById("matkhautb").innerHTML="Mật khẩu bao gồm từ 6 đến 15 kí tự bao gồm chữ và số!";
				check=false;
				}
			  //kiểm tra mật khẩu gõ lại
			  var mkgl=document.getElementById("matkhaugolai").value;
			  if(mk!=mkgl||mkgl=="")
				  {
					  document.getElementById("matkhaugolaitb").innerHTML="Mật khẩu sai! Vui lòng nhập lại mật khẩu!";
					  check=false;
				  }
			  else
				  {
					  document.getElementById("matkhaugolaitb").innerHTML="";
				  }
			  return check;
			}
	  </script>
  </body>
</html>