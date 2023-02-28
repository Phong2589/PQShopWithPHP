<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
	<title>Kiểm tra mật khẩu</title>
  </head>
	
  <body>
	<?php
	  $mknhan = md5($_GET['mk']);
	  $idkh= $_SESSION['idkh'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM khachhang WHERE (idkh=$idkh)";
	  $result = $con->query($sql);
	  $row = $result->fetch_assoc();
	  $mkcu = $row['matkhau'];
		
	  if($mknhan == $mkcu) 
	  {
		  echo "";
	  }
	  else 
	  {
		  echo "Mật khẩu nhập vào không đúng!";
	  }
	  $con->close();
	?>
  </body>
</html>