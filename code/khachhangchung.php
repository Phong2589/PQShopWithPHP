<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
	<div class="container">
		<div class="navbar-header">
			<a href="./khachhang.php" class="navbar-brand d-sm-block d-none"><img src="./img/logo.png" id="logo" alt="Lỗi không thể tải ảnh" /></a>
		</div>
		<div class="chungtieude navbar-collapse collapse" id="navbarSupportedContent">
			<div>
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a href="khachhang.php" class="nav-link">Trang chủ</a>	
				</li>
				
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Thông tin</a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="./khachhangcanhan.php">Xem thông tin cá nhân</a>
						<a class="dropdown-item" href="./khachhangcapnhatcanhan.php">Cập nhật thông tin cá nhân</a>
						<a class="dropdown-item" href="./khdoimk.php">Thay đổi mật khẩu</a>
					</div>
				</li>
				
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng</a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="khchoxuli.php">Chờ xử lí</a>
						<a class="dropdown-item" href="khdonhang.php">Đang xử lí</a>
						<a class="dropdown-item" href="khdonhangls.php">Lịch sử</a>
						<a class="dropdown-item" href="khthongbao.php">Thông báo</a>
					</div>
				</li>
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sắp xếp</a>
						<div class="dropdown-content">
							<a class="dropdown-item" href="khachhang.php?az=1">Từ a-z</a>
							<a class="dropdown-item" href="khachhang.php?za=1">Từ z-a</a>
							<a class="dropdown-item" href="khachhang.php?giam=1">Giá giảm dần</a>
							<a class="dropdown-item" href="khachhang.php?tang=1">Giá tăng dần</a>
						</div>
					</li>
				<li class="nav-item">
					<a href="khachhangdangxuat.php" class="nav-link">Đăng xuất</a>	
				</li>
			</ul>
			</div>
			
			<div class="nav navbar-nav mx-auto">
				<form method="get" action="khachhang.php"><input type='text' class='ndtimkiem' name='ndtimkiem' placeholder="Tìm sản phẩm">&nbsp;&nbsp;<input type='submit' value='Tìm kiếm' id='tksubmit'></form>
			</div>
			
			<div><a href="./giohang.php" class="nav-link" id="right">		
				<img src="./img/shoppingcart.png" id="cart"/></a>
			</div>
			
			</div>
		</div>
</nav>
	<?php if(isset($_SESSION['idkh'])==false) header('location:' . "./dangnhap.php");?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>