<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hủy đơn</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'khachhangchung.php';?>
	<div class="cachnav">
	<?php
			if(!empty($_GET['iddh']))
			{
				$iddh=$_GET['iddh'];
				include 'ketnoicsdl.php';
				$sql1 = "select * from donhang where iddh=$iddh";
				$result1 = $con->query($sql1);
				$row = $result1->fetch_assoc();
				echo $iddh;
				if($row['xacnhankh'] == 'Đang xử lí' and $row['trangthai'] == 'Đang xử lí')
				{
					$sql = "UPDATE donhang SET xacnhankh='Hủy đơn',tgkh=current_timestamp() where iddh=$iddh";
					$result = $con->query($sql);
					header('location: khdonhang.php');
				}
				else if($row['xacnhankh'] == 'Chờ xử lí' and $row['trangthai'] == 'Chờ xử lí')
				{
					$sql = "UPDATE donhang SET xacnhankh='Hủy đơn',tgkh=now() where iddh=$iddh";
					$result = $con->query($sql);
					header('location: khchoxuli.php');
				}
				else 
				{
					$tbloi="loi";
					header('location: khdonhang.php?tbloi='.$tbloi);
				}
			}
			else
			{
				$iddhxl=$_GET['iddhxl'];
				include 'ketnoicsdl.php';
				$sql = "UPDATE donhang SET xacnhankh='Hủy đơn',trangthai='Hủy đơn',tgkh=now(),tgcs=now() where iddh=$iddhxl";
				$result = $con->query($sql);
				header('location: khchoxuli.php');
			}
	  		
	  		$con->close();
	?>
		
	  </div>
	  
  </body>
</html>