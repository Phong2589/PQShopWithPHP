<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Xác nhận hủy đơn</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
			if(!empty($_GET['iddh']))
			{
				$iddh=$_GET['iddh'];
				include 'ketnoicsdl.php';
				$sql1 = "select * from donhang where iddh=$iddh";
				$result1 = $con->query($sql1);
				$row = $result1->fetch_assoc();

				if($row['trangthai'] == 'Đang xử lí' and $row['xacnhankh'] == 'Hủy đơn')
				{
					$sql = "UPDATE donhang SET trangthai='Hủy đơn',tgcs=now() where iddh=$iddh";
					$result = $con->query($sql);
					header('location: chushopdonhang.php');
				}
				else 
				{
					$tbloi="loi";
					header('location: chushopdonhang.php?tbloi='.$tbloi);
				}
			}
		else
		{
			$iddhxl=$_GET['iddhxl'];
			include 'ketnoicsdl.php';
			$sql = "UPDATE donhang SET xacnhankh='Hủy đơn',trangthai='Hủy đơn',tgcs=now(),tgkh=now() where iddh=$iddhxl";
			$result = $con->query($sql);
			header('location: cschoxuli.php');
		}

				$con->close();
	?>
	  </div>
	  
  </body>
</html>