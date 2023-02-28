<?php ob_start();?>
<?php
$tendangnhap = $_GET['tendangnhap'];
$luachon = $_GET['luachon'];
include 'ketnoicsdl.php';
if($luachon=="Khách hàng")
	$sql = "SELECT * FROM khachhang WHERE tendangnhap='$tendangnhap'";
else 
	$sql = "SELECT * FROM chushop WHERE tendangnhap='$tendangnhap'";
$result = $con->query($sql);
if($result->num_rows > 0) echo "Tên đã tồn tại! Vui lòng chọn tên khác!";
else echo "";
$con->close();
?>