<?php
include './ketnoicsdl.php';
$sql="select year(now()) nam";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
  		<div class="container">
			<div class="navbar-header ">
				<a href="./chushop.php" class="navbar-brand d-sm-block d-none"><img src="./img/logo.png" id="logo" alt="Lỗi không thể tải ảnh" /></a>
			</div>
			<div class="navbar-collapse collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav">
					<li class="nav-item">
						<a href="./chushop.php" class="nav-link">Trang chủ</a>	
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Thông tin cá nhân</a>
					 	<div class="dropdown-content">
							<a class="dropdown-item" href="./chushopcanhan.php">Xem thông tin cá nhân</a>
							<a class="dropdown-item" href="./chushopcapnhatcanhan.php">Cập nhật thông tin cá nhân</a>
							<a class="dropdown-item" href="./csdoimk.php">Thay đổi mật khẩu</a>
						</div>
					</li>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm</a>
					 	<div class="dropdown-content">
							<a class="dropdown-item" href="chushopthemsanpham.php">Thêm sản phẩm</a>
							<a class="dropdown-item" href="danhsachsp.php">Danh sách sản phẩm</a>
						</div>
					</li>
					
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng</a>
					 	<div class="dropdown-content">
							<a class="dropdown-item" href="./cschoxuli.php">Chờ xử lí</a>
							<a class="dropdown-item" href="./chushopdonhang.php">Đang xử lí</a>
							<a class="dropdown-item" href="./csdonhangls.php">Lịch sử</a>
							<a class="dropdown-item" href="./csthongbao.php">Thông báo</a>
							<a class="dropdown-item" href="thongke.php?nam=<?php echo $row['nam']; ?>">Thống kê doanh thu</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="./chushopdangxuat.php" class="nav-link">Đăng xuất</a>	
					</li>
				</ul>
			<div class="nav navbar-nav mx-auto">
					<form method="get" action="chushop.php"><input type='text' class='ndtimkiem' name='ndtimkiem' placeholder="Tìm sản phẩm">&nbsp;&nbsp;<input type='submit' value='Tìm kiếm' id='tksubmit'></form>
			</div>
			</div>
		</div>
	</nav>
	<?php if(isset($_SESSION['idcs'])==false) header('location:' . "./dangnhap.php");?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>