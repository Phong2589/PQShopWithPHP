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
	  $idcs= $_SESSION['idcs'];
	  include 'ketnoicsdl.php';
	  $sql="SELECT * FROM chushop WHERE (idcs=$idcs)";
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