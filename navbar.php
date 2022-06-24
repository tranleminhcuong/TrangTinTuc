<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#00bfff;">
	<a class="navbar-brand" href="index.php">
		<img src="images/inews.png" width="30" height="30" class="d-inline-block align-top" alt="" />
		Tin 24h
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
			<?php
				if(!isset($_SESSION['ID']))
				{
					
			?>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-info-circle"></i> Trang chủ</a></li>
						<li class="nav-item"><a class="nav-link" href="baiviet_moinhat.php">Tin mới nhất</a></li>
					</ul>
					<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="dangky.php">Đăng ký</a></li>
						<li class="nav-item active">
							<a class="nav-link" href="dangnhap.php">
								<i class="fad fa-sign-in-alt"></i> Đăng nhập
							</a>
						</li>
					</ul>
			<?php
				}
				else
				{
					if($_SESSION['QuyenHan'] == 1)
					{
			?>			<ul class="navbar-nav mr-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-info-circle"></i> Trang chủ</a></li>
							<li class="nav-item"><a class="nav-link" href="baiviet_moinhat.php">Tin mới nhất</a></li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="chude.php">Quản lý chủ đề</a>
									<a class="dropdown-item" href="baiviet.php">Quản lý bài viết</a>
									<a class="dropdown-item" href="nguoidung.php">Quản lý người dùng</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['HoVaTen']; ?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="doimatkhau.php">Đổi mật khẩu</a>
								<a class="dropdown-item" href="#">Cập nhật hồ sơ</a>
								<a class="dropdown-item" href="baiviet_them.php">Đăng bài viết</a>
								<a class="dropdown-item" href="baiviet_nguoidung.php">Bài viết của tôi</a>
							</div>
							</li>
							<li class="nav-item"><a class="nav-link" href="dangxuat.php">Đăng xuất</a></li>
						</ul>
			<?php
					}
					else
					{	
			?>
					<ul class="navbar-nav mr-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-info-circle"></i> Trang chủ</a></li>
							<li class="nav-item"><a class="nav-link" href="baiviet_moinhat.php">Tin mới nhất</a></li>
							<li class="nav-item"><a class="nav-link" href="baiviet_nguoidung.php">Bài viết</a></li>
					</ul>
					<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['HoVaTen']; ?></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="doimatkhau.php">Đổi mật khẩu</a>
							<a class="dropdown-item" href="#">Cập nhật hồ sơ</a>
							<a class="dropdown-item" href="baiviet_them.php">Đăng bài viết</a>
							<a class="dropdown-item" href="baiviet_nguoidung.php">Bài viết của tôi</a>
						</div>
					</li>
			
					<li class="nav-item"><a class="nav-link" href="dangxuat.php">Đăng xuất</a></li>
					</ul>
			<?php
					}
				}
			?>
		</ul>
	
</nav>