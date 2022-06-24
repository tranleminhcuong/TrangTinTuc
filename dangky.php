<?php
	require_once "config.php";
	include_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include_once "navbar.php"; ?>
			
			<div class="card">
				<h4 class="card-header">Đăng ký thành viên</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['HoVaTen']))
						{
							$HoVaTen = addslashes($_POST['HoVaTen']);
							$TenDangNhap = addslashes($_POST['TenDangNhap']);
							$MatKhau = addslashes($_POST['MatKhau']);
							$XacNhanMatKhau = addslashes($_POST['XacNhanMatKhau']);
							
							if(trim($HoVaTen) == "")
								ThongBaoLoi("Họ và tên không được bỏ trống!");
							elseif(trim($TenDangNhap) == "")
								ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
							elseif(trim($MatKhau) == "")
								ThongBaoLoi("Mật khẩu không được bỏ trống!");
							elseif(trim($XacNhanMatKhau) == "")
								ThongBaoLoi("Xác nhận mật khẩu không được bỏ trống!");
							elseif($MatKhau != $XacNhanMatKhau)
								ThongBaoLoi("Xác nhận mật khẩu không chính xác!");
							else
							{
								$MatKhau = sha1($MatKhau);
								
								$sql = "INSERT INTO tbl_nguoidung(HoVaTen, TenDangNhap, MatKhau, QuyenHan, Khoa) 
										VALUES ('$HoVaTen', '$TenDangNhap', '$MatKhau', 2, 0)";
								$kq = mysqli_query($link, $sql);
								if($kq)
									ThongBao("Đăng ký thành công!");
								elseif(mysqli_errno($link) == 1062)
									ThongBaoLoi("Tài khoản <strong>$TenDangNhap</strong> đã tồn tại!");
								else
									ThongBaoLoi(mysqli_error($link));
							}
						}
					?>
					<form method="post" action="dangky.php">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="HoVaTen">Họ và tên</label>
								<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" placeholder="" required />
							</div>
							<div class="form-group col-md-6">
								<label for="TenDangNhap">Tên đăng nhập</label>
								<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" required />
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="MatKhau">Mật khẩu</label>
								<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" required />
							</div>
							<div class="form-group col-md-6">
								<label for="XacNhanMatKhau">Xác nhận mật khẩu</label>
								<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" placeholder="" required />
							</div>
						</div>
						
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>