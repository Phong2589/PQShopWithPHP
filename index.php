<?php ob_start();?>
<?php session_start();
$_SESSION['tongtien'] = 0;?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PQ shop</title>
	<link rel="icon" href="./code/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./code/dinhdang.css">

  </head>
	
  <body>
   	<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		
  		<div class="container">
			<div class="navbar-header">
<!--				<a href="index.php" class="navbar-brand d-sm-block d-none "><img  src="./code/img/logo.png" id="logo" alt="Lỗi không thể tải ảnh" /></a>-->
			</div>
			
			<div class="chungtieude navbar-collapse collapse" id="navbarSupportedContent">
				<div>
				<ul class="nav navbar-nav">
					<li class="nav-item">
						<a href="index.php" class="nav-link">Trang chủ</a>	
					</li>
					<li class="nav-item">
						<a href="./code/dangki.php" class="nav-link">Đăng kí</a>	
					</li>
					<li class="nav-item">
						<a href="./code/dangnhap.php" class="nav-link">Đăng nhập</a>	
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sắp xếp</a>
						<div class="dropdown-content">
							<a class="dropdown-item" href="index.php?az=1"></a>
							<a class="dropdown-item" href="index.php?za=1">Từ z-a</a>
							<a class="dropdown-item" href="index.php?giam=1">Giá giảm dần</a>
							<a class="dropdown-item" href="index.php?tang=1">Giá tăng dần</a>
						</div>
					</li>
				</ul>
				</div>
				<div class="nav navbar-nav mx-auto">
					<form method="get" action="index.php"><input type='text' class='ndtimkiem' name='ndtimkiem' placeholder="Tìm sản phẩm">&nbsp;&nbsp;<input type='submit' value='Tìm kiếm' id='tksubmit'></form>
				</div>
				<div>
<!--					<a href="./code/giohang.php" class="nav-link"><img src="./code/img/shoppingcart.png" id="cart"/></a>-->
				</div>
			</div>
		</div>
	  </nav>
	<div class="cachnav">
	<?php
		include './code/ketnoicsdl.php';
		$soluong = 12;
		if(empty($_GET['page']) || ($_GET['page'] <0) || !is_numeric($_GET['page'])) $page=1;
		else $page = $_GET['page'];
		$vtbd = ($page - 1) * $soluong;
		if(isset($_GET['az']))
		{
			$sql = "SELECT * FROM sanpham where (conhang='Còn' and daxoa=0) ORDER BY tensp ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else if(isset($_GET['za']))
		{
			$sql = "SELECT * FROM sanpham where conhang='Còn' ORDER BY tensp DESC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else if(isset($_GET['giam']))
		{
			$sql = "SELECT * FROM sanpham where (conhang='Còn' and daxoa=0) ORDER BY giasp DESC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else if(isset($_GET['tang']))
		{
			$sql = "SELECT * FROM sanpham where (conhang='Còn' and daxoa=0) ORDER BY giasp ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else if(isset($_GET['ndtimkiem']))
		{
			$tk = $_GET['ndtimkiem'];
			$sql = "SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and conhang='Còn'and daxoa=0) ORDER BY 'id' ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else
		{
			$sql="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0) ORDER BY 'id' ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where (conhang='Còn' and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		echo "
			<div class='container'>
			<div class='row'>
		";
		while($row = $result->fetch_assoc())
		  {
			$idspht = $row['idsp'];
			$sqlht="SELECT * FROM donhang where (idsp=$idspht and xacnhankh='Hoàn thành')";
			if($resultht = $con->query($sqlht))	$daban = $resultht->num_rows;
			else $daban=0;
			$gia = number_format ($row['giasp'] ,0 , "." , ",");
			  echo "
				<div class='col-md-3 col-sm-6 col-12' onmouseover='hienkhung(".$row['idsp'].")' onmouseout='ankhung(".$row['idsp'].")' id='".$row['idsp']."'>
					
					<img src='./code/".$row['hinhanh']."' class='ktanh'/>
					<div style='display:flex;justify-content: space-between;' class='indam'><p>".$row['tensp']."</p><p style='text-align:right;'>Đã bán: ".$daban."</p></div>
					<p>Giá sản phẩm: <b>".$gia." VNĐ</b></p>
					<div style='display:flex;justify-content: space-between;'>
					<p><button class='botron'><a href='./code/chitietspkh.php?idsp=".$row['idsp']."' style='text-decoration: none;' class='xemchitiet'>Chi tiết</a></button></p>
					
					<p><button onclick='themvaogio(".$row['idsp'].")' class='botron'>Thêm vào giỏ</button></p>
					</div>
				</div>
			  ";
		  }
		  $con->close();
		echo "</div></div>";
		echo "<p></p>";
		if($tongtrang>0)
		{
			if(isset($_GET['az']))
			{
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."&az=1' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."&az=1' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
			else if(isset($_GET['za']))
			{
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."&za=1' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."&za=1' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
			else if(isset($_GET['giam']))
			{
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."&giam=1' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."&giam=1' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
			else if(isset($_GET['tang']))
			{
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."&tang=1' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."&tang=1' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
			else if(isset($_GET['ndtimkiem']))
			{
				$ndtk = $_GET['ndtimkiem'];
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."&ndtimkiem=".$ndtk."' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."&&ndtimkiem=".$ndtk."' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
			else
			{
				echo "<p style='text-align:right; margin-right:20px;'><b>Danh sách trang:</b>&nbsp;&nbsp;&nbsp;";
				for($i=1;$i<=$tongtrang;$i++)
				{
					if($i!=$page) 
						echo "<button class='botron'><a href='?page=".$i."' style='text-decoration: none;'>".$i."</a></button>&nbsp;";
					else 
						echo "<button style='background-color:black;' class='botron'><a href='?page=".$i."' style='text-decoration: none;' >".$i."</a></button>&nbsp;";
				}
				echo "</p>";
			}
		}
		else
		{
			echo "<p class='cautb'>Không tìm thấy kết quả!</p>";
		}
		echo "<p></p>";
		echo "<p></p>";
	?>
		<?php
		include './code/ketnoicsdl.php';
		$sql="SELECT * FROM donhang where (trangthai='Hoàn thành'and xacnhankh='Đang xử lí')";
		$result = $con->query($sql);
		while($row = $result->fetch_assoc())
		{
			$iddh = $row['iddh'];
			$sql1 = "SELECT DATEDIFF(now(), (select tgcs from donhang where iddh  = $iddh)) ngay";
			$result1 = $con->query($sql1);
			$row1 = $result1->fetch_assoc();
			if($row1['ngay'] > 7)
			{
				$sql2 = "UPDATE donhang SET xacnhankh='Hoàn thành',tgkh=now() where iddh=$iddh";
		    	$result2 = $con->query($sql2);
			}
		}
		$con->close();
		?>
	</div>
	  <?php 
	  if(!empty($_GET['page']))
	  {
		  if(($_GET['page'] > $tongtrang)) header('location: index.php?page=1');
	  }
	  ?>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		function themvaogio(idsp)
		{
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			alert("Sản phẩm " + xmlhttp.responseText + "đã được thêm vao giỏ hàng!");} }
			xmlhttp.open("GET","./code/themvaogio.php?idsp="+idsp,true);
			xmlhttp.send();
			
		}
		function hienkhung(idsp)
		  {
			  document.getElementById(idsp).style.backgroundColor="#ffff7c";
			  document.getElementById(idsp).style.border="2px solid #56ff56"
		  }
		  function ankhung(idsp)
		  {
			  document.getElementById(idsp).style.backgroundColor="#e9ffb9";
			  document.getElementById(idsp).style.border="none";
		  }
	</script>
  </body>
</html>