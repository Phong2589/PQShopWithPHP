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
   	<?php include 'chushopchung.php'; ?>
	<div class="cachnav">
	<?php
	    $idcs= $_SESSION['idcs'];
		$soluong = 12;
		if(!empty($_GET['page'])) $page = $_GET['page'];
		else $page = 1;
		$vtbd = ($page - 1) * $soluong;
		include './ketnoicsdl.php';
		
		if(isset($_GET['ndtimkiem']))
		{
			$tk = $_GET['ndtimkiem'];
			$sql = "SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and daxoa=0) ORDER BY 'id' ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham where ((tensp LIKE '%".$tk."%' or chitietsp LIKE '%".$tk."%') and daxoa=0)";
			$result1 = $con->query($sql1);
			$tongsp = $result1->num_rows;
			$tongtrang= ceil($tongsp/$soluong);
		}
		else
		{
			$sql="SELECT * FROM sanpham WHERE (idcs=$idcs and daxoa=0) ORDER BY 'id' ASC LIMIT ".$soluong." OFFSET ".$vtbd;
			$result = $con->query($sql);
			$sql1="SELECT * FROM sanpham WHERE (idcs=$idcs and daxoa=0)";
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
		  echo "
		  	<div class='col-md-3 col-sm-6 col-12 indam' onmouseover='hienkhung(".$row['idsp'].")' onmouseout='ankhung(".$row['idsp'].")' id='".$row['idsp']."'>
				<img src='".$row['hinhanh']."' class='ktanh'/>
				<div style='display:flex;justify-content: space-between;' class='indam'><p>".$row['tensp']."</p><p style='text-align:right;'>Đã bán: ".$daban."</p></div>
				<p>Giá sản phẩm: ".number_format($row['giasp'] ,0 , "." , ",")." VNĐ</p>
				<div style='display:flex;justify-content: space-between;'>
				
				<div><button class='botron'><a href='chitietsp.php?idsp=".$row['idsp']."' style='text-decoration: none;'>Chi tiết</a></button></div>
				
				<div><button class='botron'><a href='capnhatsp.php?idsp=".$row['idsp']."' style='text-decoration: none;'> Sửa</a></button></div>
				
				<div><button class='botron'><a  onclick='return xacnhan(".$row['idsp'].")' style='text-decoration: none;'>Xóa</a></button></div>
				
				</div>
			</div>
		  ";
	  }
	  $con->close();
		echo "</div></div>";
		echo "<p></p>";
		if($tongsp>0){
			if(isset($_GET['ndtimkiem']))
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
			if(isset($_GET['ndtimkiem']))
			{
				echo "<p class='cautb'>Không có kết quả!<p>";
			}
			else
			{
				echo "<p class='cautb'>Bạn chưa có sản phẩm nào!<p>";
			}
			
		echo "<p></p>";
		echo "<p></p>";
	?>
	  </div>
	  <script>
	  
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
		  function xacnhan(idsp)
		  {
			    var xmlhttp;
				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					var tb1 = confirm(xmlhttp.responseText);
					if(tb1==1) return true;
					else return false;

				} }
				xmlhttp.open("GET","ktspdonhang.php?idsp="+idsp,true);
				xmlhttp.send();
		  }
	  </script>
  </body>
</html>