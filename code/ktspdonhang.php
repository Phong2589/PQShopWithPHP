<?php ob_start();?>
<?php 
  $idsp=$_GET['idsp'];
  include 'ketnoicsdl.php';
  $sql = "select * from donhang where (idsp=$idsp and (trangthai='Chờ xử lí' or trangthai='Đang xử lí'))";
  $result = $con->query($sql);
  if($result->num_rows > 0) echo "Sản phẩm đang được đặt bởi khách hàng, khi xóa đơn hàng vẫn tiếp tục!";
  else echo "Bạn có thực sự muốn xóa!";
  $con->close();
?>