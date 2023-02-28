<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Xác nhận hoàn thành</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'khachhangchung.php';?>
	<div class="cachnav">
	<?php
	  		$iddh=$_GET['iddh'];
		    include 'ketnoicsdl.php';
			$sql1 = "select * from donhang where iddh=$iddh";
			$result1 = $con->query($sql1);
			$row = $result1->fetch_assoc();
			if($row['xacnhankh'] == 'Đang xử lí' and $row['trangthai'] == 'Hoàn thành')
			{
				$sql = "UPDATE donhang SET xacnhankh='Hoàn thành',tgkh=now() where iddh=$iddh";
		    	$result = $con->query($sql);
				header('location: khdonhang.php');
			}
		    else 
			{
				$tbloi="loi";
				header('location: khdonhang.php?tbloi='.$tbloi);
			}
	  		$con->close();
	?>
	  </div>
	  
  </body>
</html>