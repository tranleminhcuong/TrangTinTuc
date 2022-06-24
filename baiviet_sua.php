<?php
	require_once "config.php";
	include_once "functions.php";
	
	if(!isset($_SESSION['ID'])) header("Location: dangnhap.php");
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include_once "navbar.php"; ?>
			
			<div class="card">
				<h4 class="card-header">Đăng bài viết</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['MaChuDe']))
						{
							$ID = addslashes($_POST['ID']);
							$MaChuDe = addslashes($_POST['MaChuDe']);
							$TieuDe = addslashes($_POST['TieuDe']);
							$TomTat = addslashes($_POST['TomTat']);
							$NoiDung = addslashes($_POST['NoiDung']);
							
							if(trim($MaChuDe) == "")
								ThongBaoLoi("Chưa chọn chủ đề!");
							elseif(trim($TieuDe) == "")
								ThongBaoLoi("Tiêu đề không được bỏ trống!");
							elseif(trim($TomTat) == "")
								ThongBaoLoi("Tóm tắt không được bỏ trống!");
							elseif(trim($NoiDung) == "")
								ThongBaoLoi("Nội dung bài viết không được bỏ trống!");
							else
							{
								$sql = "UPDATE `tbl_baiviet`
										SET		`MaChuDe` = $MaChuDe,
												`TieuDe` = '$TieuDe',
												`TomTat` = '$TomTat',
												`NoiDung` = '$NoiDung'
										WHERE	`ID` = $ID";
								$kq = mysqli_query($link, $sql);
								if($kq)
									header("Location: baiviet.php");
								else
									ThongBaoLoi(mysqli_error($link));
							}
						}
						else
						{
							// Lấy id từ thanh địa chỉ
							$id = $_GET['id'];
							
							$sql = "SELECT * FROM tbl_baiviet WHERE ID = $id";
							$danhsach = mysqli_query($link, $sql);
							
							// Vì chỉ trả về 1 dòng nên không cần vòng lặp while
							$baiviet = mysqli_fetch_array($danhsach);
					?>
					<form method="post" action="baiviet_sua.php">
						<input type="hidden" id="ID" name="ID" value="<?php echo $baiviet['ID'] ?>" />
						<div class="form-group">
							<label for="MaChuDe">Chủ đề</label>
							<select class="form-control" id="MaChuDe" name="MaChuDe" required>
								<option value="">-- Chọn chủ đề --</option>
								<?php
									$sql = "SELECT * FROM tbl_chude";
									$danhsach = mysqli_query($link, $sql);
									
									while($dong = mysqli_fetch_array($danhsach))
									{
										if($dong['ID'] == $baiviet['MaChuDe'])
											echo "<option value='{$dong['ID']}' selected='selected'>{$dong['TenChuDe']}</option>";
										else
											echo "<option value='{$dong['ID']}'>{$dong['TenChuDe']}</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="TieuDe">Tiêu đề</label>
							<input type="text" class="form-control" id="TieuDe" name="TieuDe" value="<?php echo $baiviet['TieuDe'] ?>" placeholder="" required />
						</div>
						<div class="form-group">
							<label for="TomTat">Tóm tắt</label>
							<textarea class="form-control" id="TomTat" name="TomTat" placeholder="" required><?php echo $baiviet['TomTat'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="NoiDung">Nội dung bài viết</label>
							<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" placeholder="" required><?php echo $baiviet['NoiDung'] ?></textarea>
						</div>
						
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
					<?php
						}
					?>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ckeditor/ckeditor.js"></script>
	</body>
</html>