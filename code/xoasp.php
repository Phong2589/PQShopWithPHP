<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Xóa sản phẩm</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
	<div class="cachnav">
   	<?php 
	  include 'chushopchung.php';
	  $idsp=$_GET['idsp'];
	  include 'ketnoicsdl.php';
	  $sql = "Update sanpham set daxoa=1 WHERE idsp=$idsp";
	  $result = $con->query($sql);
	  $con->close();
	?>
 	<h2 class="cautb">Xóa sản phẩm thành công!</h2>
	  </div>
  </body>
</html>