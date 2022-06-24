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
				<h4 class="card-header">Đăng nhập</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['TenDangNhap']))
						{
							$TenDangNhap = addslashes($_POST['TenDangNhap']);
							$MatKhau = addslashes($_POST['MatKhau']);
							
							if(trim($TenDangNhap) == "")
								ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
							elseif(trim($MatKhau) == "")
								ThongBaoLoi("Mật khẩu không được bỏ trống!");
							else
							{
								$MatKhau = sha1($MatKhau);
								
								$sql = "SELECT * FROM tbl_nguoidung WHERE TenDangNhap = '$TenDangNhap' AND MatKhau = '$MatKhau'";
								$nguoidung = mysqli_query($link, $sql);
								
								if(mysqli_num_rows($nguoidung) <= 0)
									ThongBaoLoi("Tài khoản không tồn tại!");
								else
								{
									$dong = mysqli_fetch_array($nguoidung);
									
									if($dong['Khoa'] == 1)
										ThongBaoLoi("Tài khoản đã bị khóa!");
									else
									{
										// Đăng ký SESSION
										$_SESSION['ID'] = $dong['ID'];
										$_SESSION['HoVaTen'] = $dong['HoVaTen'];
										$_SESSION['QuyenHan'] = $dong['QuyenHan'];
										
										// Quay về trang chủ
										header("Location: index.php");
									}
								}
							}
						}
					?>
					<form method="post" action="dangnhap.php">
						<div class="form-group">
							<label for="TenDangNhap">Tên đăng nhập</label>
							<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" placeholder="" required />
						</div>
						<div class="form-group">
							<label for="MatKhau">Mật khẩu</label>
							<input type="password" class="form-control" id="MatKhau" name="MatKhau" placeholder="" required />
						</div>
						
						<button type="submit" class="btn btn-primary">Đăng nhập</button>
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