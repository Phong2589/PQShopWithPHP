<?php ob_start();?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PQ shop</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <!-- Bootstrap và CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./dinhdang.css">
  </head>
	
  <body>
   	<?php include 'khachhangchung.php'; ?>
	<div class="cachnav">
	<?php
		$soluong = 12;
		if(!empty($_GET['page'])) $page = $_GET['page'];
		else $page = 1;
		$vtbd = ($page - 1) * $soluong;
		include './ketnoicsdl.php';
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
			$sql = "SELECT * FROM sanpham where (conhang='Còn' and daxoa=0) ORDER BY tensp DESC LIMIT ".$soluong." OFFSET ".$vtbd;
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
			$sql = "SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and (conhang='Còn' and daxoa=0)) ORDER BY 'id' ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and (conhang='Còn' and daxoa=0))";
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
		  	<div class='col-md-3 col-sm-6 col-12 indam' onmouseover='hienkhung(".$row['idsp'].")' onmouseout='ankhung(".$row['idsp'].")' id='".$row['idsp']."'>
				<img src='".$row['hinhanh']."' class='ktanh'/>
				<div style='display:flex;justify-content: space-between;' class='indam'><p>".$row['tensp']."</p><p style='text-align:right;'>Đã bán: ".$daban."</p></div>
				<p>Giá sản phẩm: ".$gia." VNĐ</p>
				
				<div style='display:flex;justify-content: space-between;'>
				<p><button class='botron'><a href='./chitietspkh.php?idsp=".$row['idsp']."' style='text-decoration: none;' class='xemchitiet'>Chi tiết</a></button></p>
					
				<p><button onclick='themvaogio(".$row['idsp'].")' class='botron'>Thêm vào giỏ</button></p></div>
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
	  </div>
	  <script>
		function themvaogio(idsp)
		{
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) { 
			alert("Sản phẩm " + xmlhttp.responseText + "đã được thêm vao giỏ hàng!");} }

			xmlhttp.open("GET","./themvaogio.php?idsp="+idsp,true);
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