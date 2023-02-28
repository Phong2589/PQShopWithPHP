<?php ob_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" type="text/css" href="dinhdang.css">
    <title>Đăng kí</title>
  </head>
	
  <body id="dangki">
	<div id="formdangki">
	<h2 style="text-align: center;">Đăng kí tài khoản mới</h2>
	<h3 class="maudo" style="text-align: center;">Vui lòng điền đầy đủ thông tin bên dưới để đăng kí tài khoản mới</h3>
   
				<form action="xulydangki.php" style="background-color: #DDD6D6; border-radius: 40px;" method="post" onsubmit="return kiemtra()"> 
				<table cellpadding="12" align="center">
					<tr>
						<td><label for="luachon">Chủ shop hay khách hàng:</label></td>
						<td>
							<input type="radio" name="luachon" value="Khách hàng" checked>Khách hàng
							<input type="radio" name="luachon" value="Chủ shop">Chủ shop
						</td>
					</tr>
					<tr>
						<td></td>
						<td><P id="luachontb"></p></td>
					</tr>
					<tr>
						<td><label for="tendangnhap">Tên đăng nhập:<span class="maudo">*</span></label></td>
						<td><input type="text" name="tendangnhap" id="tendangnhap" onchange="ktten(this.value,luachon.value)"></td>
					</tr>
					<tr>
						<td colspan="2"><P id="tendangnhaptb">Tên đăng nhập từ 6 - 15 kí tự và bắt đầu bằng chữ cái!</p></td>
					</tr>
					<tr>
						<td><label for="matkhau">Mật khẩu:<span class="maudo">*</span></label></td>
						<td><input type="password" name="matkhau" id="matkhau"></td>
					</tr>
					<tr>
						<td colspan="2"><P id="matkhautb">Mật khẩu từ 6 - 15 kí tự bao gồm chữ và số!</p></td>
					</tr>
					<tr>	
						<td><label for="matkhaugolai">Nhập lại mật khẩu:<span class="maudo">*</span></label></td>
						<td><input type="password" name="matkhaugolai" id="matkhaugolai"></td>
					</tr>
					<tr>
						<td class="maudo" colspan="2"><P id="matkhaugolaitb"></p></td>
					</tr>
					<tr>
						<td><label for="hoten">Họ và tên:<span class="maudo">*</span></label></td>
						<td><input type="text" name="hoten" id="hoten"></td>
					</tr>
					<tr>
						
						<td class="maudo" colspan="2"><P id="hotentb"></p></td>
					</tr>
					<tr>	
						<td><label for="sdt">Số điện thoại:<span class="maudo">*</span></label></td>
						<td><input type="text" name="sdt" id="sdt"></td>
					</tr>
					<tr>
						
						<td class="maudo" colspan="2"><P id="sdttb"></p></td>
					</tr>
					<tr>	
						<td><label for="diachi">Địa chỉ:<span class="maudo">*</span></label></td>
						<td><input type="text" name="diachi" id="diachi"></td>
					</tr>
					<tr>
						
						<td class="maudo" colspan="2"><P id="diachitb"></p></td>
					</tr>
					<tr>
						<td><label for="gioitinh">Giới tính:</label></td>
						<td>
							<input type="radio" name="gioitinh" value="nam" checked>Nam
							<input type="radio" name="gioitinh" value="nữ">Nữ
							<input type="radio" name="gioitinh" value="khác">Khác
						</td>
					</tr>
					<tr>
						
						<td><P id="gioitinhtb" colspan="2"></p></td>
					</tr>
					
					<tr>
						<td>
							<a href="../index.php">Trở về trang chủ</a>
						</td>
						<td style="text-align: center;">
							<input type="submit" value="Đăng kí" align="middle" class="botron">
						</td>
					</tr>
					<tr>
						
						<td><P colspan="2"></p></td>
					</tr>
				</table>
					
				</form>
			
	</div>
	  <script>
	  	function kiemtra()
		  {
			  check=true;
			  document.getElementById("tendangnhaptb").style.color="red";
			  document.getElementById("matkhautb").style.color="red";
			  
			  //Kiểm tra tên đăng nhập
			  var tdn_reg=/^[A-Za-z][A-Za-z0-9]{5,15}$/;
			  var tdn = document.getElementById("tendangnhap").value;
			  if(tdn_reg.test(tdn))
			  	{document.getElementById("tendangnhaptb").innerHTML="";}
			  else
				{
					if(tdn=="") 
						document.getElementById("tendangnhaptb").innerHTML="Vui lòng nhập vào tên đăng nhập!";
					 	
					else
						document.getElementById("tendangnhaptb").innerHTML="Tên đăng nhập từ 6 - 15 kí tự và bắt đầu bằng chữ cái!";
					check=false;
				}
			  //Kiểm tra mật khẩu
			  var mk_reg=/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9]{6,15}$/;
			  var mk = document.getElementById("matkhau").value;	
			  if(mk_reg.test(mk))
			  	{document.getElementById("matkhautb").innerHTML="";}
			  else{
				if(mk=="") 
					document.getElementById("matkhautb").innerHTML="Vui lòng nhập vào mật khẩu!";
				else
					document.getElementById("matkhautb").innerHTML="Mật khẩu từ 6 - 15 kí tự bao gồm chữ và số!";
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
			  //Kiểm tra họ và tên
			  var hoten = document.getElementById("hoten").value;
			  if(hoten=="") 
				{document.getElementById("hotentb").innerHTML="Vui lòng nhập vào họ tên!";
				 check=false;}
			  else 
				{document.getElementById("hotentb").innerHTML="";}
			  //Kiểm tra số điện thoại
			  var sdt_reg=/^[0][0-9]{9,10}$/;
			  var sdt = document.getElementById("sdt").value;
			  if(sdt_reg.test(sdt))
			  	{document.getElementById("sdttb").innerHTML="";}
			  else{
				if(sdt=="") 
					document.getElementById("sdttb").innerHTML="Vui lòng nhập vào số điện thoại!";
				else
					document.getElementById("sdttb").innerHTML="Số điện thoại không hợp lệ!";
				check=false;
				}
			  //Kiểm tra địa chỉ
			  var diachi = document.getElementById("diachi").value;
			  if(diachi=="") 
				{document.getElementById("diachitb").innerHTML="Vui lòng nhập vào dịa chỉ!";
				 check=false;}
			  else 
				{document.getElementById("diachitb").innerHTML="";}
			  
			  
			  
			  if(kt==false) 
			  {
				  document.getElementById("tendangnhaptb").style.color="red";
					document.getElementById("tendangnhaptb").innerHTML="Tên đã tồn tại! Vui lòng chọn tên khác!";
				  check=false;
			  }
			  
			  
			  return check;
		  }
		  function ktten(str,luachon)
			{
			
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			
				if(xmlhttp.responseText!="")    
				{
					document.getElementById("tendangnhaptb").style.color="red";
					document.getElementById("tendangnhaptb").innerHTML=xmlhttp.responseText;
					kt = false;
				}
				else 
				{
					document.getElementById("tendangnhaptb").style.color="black";
					document.getElementById("tendangnhaptb").innerHTML = "Tên đăng nhập từ 6 - 15 kí tự và bắt đầu bằng chữ cái!";
					kt = true;
				}

			} }
			xmlhttp.open("GET","ktten.php?tendangnhap="+str+"&luachon="+luachon,true);
			xmlhttp.send();
			}
	  </script>
  </body>
</html>