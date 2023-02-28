<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cập nhật thông tin cá nhân</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	  $tendangnhap = $_SESSION['tendangnhap'];
	  $idcs= $_SESSION['idcs'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM chushop WHERE (idcs=$idcs)";
	  $result = $con->query($sql);
	  $row = $result->fetch_assoc();
	?>
	<div id="formdangki">
	<h2 style="text-align: center;">Điền vào thông tin cần cập nhật</h2>
	<form action="chushopxulycapnhat.php" style="background-color: #DDD6D6; border-radius: 40px;" method="post" onsubmit="return kiemtra()"> 
	<table cellpadding="12" align="center">
		<tr>
			<td><label for="hoten">Họ và tên</label></td>
			<td><input type="text" name="hoten" id="hoten" value="<?php echo $row['hoten'];?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="maudo"><P id="hotentb"></p></td>
		</tr>
		<tr>	
			<td><label for="sdt">Số điện thoại:</label></td>
			<td><input type="text" name="sdt" id="sdt" value="<?php echo $row['sdt'];?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="maudo"><P id="sdttb"></p></td>
		</tr>
		<tr>	
			<td><label for="diachi">Địa chỉ:</label></td>
			<td><input type="text" name="diachi" id="diachi" value="<?php echo $row['diachi'];?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="maudo"><P id="diachitb"></p></td>
		</tr>

		<tr>
			<td><label for="gioitinh">Giới tính:</label></td>
			<td>
				<input type="radio" name="gioitinh" value="nam" <?php if($row['gioitinh'] == "nam") echo "checked";?>/>Nam
				<input type="radio" name="gioitinh" value="nữ" <?php if($row['gioitinh'] == "nữ") echo "checked";?> />Nữ
				<input type="radio" name="gioitinh" value="khác" <?php if($row['gioitinh'] == "khác") echo "checked";?> />Khác
			</td>
		</tr>
		<tr>
			<td></td>
			<td><P id="gioitinhtb"></p></td>
		</tr>

		<tr>
			<td><center><input type="submit" value="Cập nhật" align="middle" class="botron"></center></td>
			<td>
				<center><input type="reset" value="Làm lại" class="botron"></center>
				
			</td>
		</tr>

	</table>

	</form>
			
	</div>
	<script>
		
	  	function kiemtra()
		  {  
			  var check=true;
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
			  return check;
		  }
		  
	  </script>
	</div>
  </body>
</html>
</html>