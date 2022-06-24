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
				<h4 class="card-header">Thêm bài viết</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['TieuDe']))
						{
							$TieuDe = addslashes($_POST['TieuDe']);
							$MaChuDe = addslashes($_POST['MaChuDe']);
							$TomTat = addslashes($_POST['TomTat']);
							$NoiDung = addslashes($_POST['NoiDung']);
							
							if(trim($TieuDe) == "")
								ThongBaoLoi("Tiêu đề không được bỏ trống!");
							elseif(trim($MaChuDe) == "")
								ThongBaoLoi("Chưa chọn chủ đề");
							elseif(trim($TomTat) == "")
								ThongBaoLoi("Tóm tắt không được bỏ trống");
							elseif(trim($NoiDung) == "")
								ThongBaoLoi("Nội dung không được bỏ trống");
							{
								$MaNguoiDung=$_SESSION['ID'];
								if($_SESSION['QuyenHan'] == 1)
								$KiemDuyet = 1;
								else $KiemDuyet = 0;
								$sql = "INSERT INTO `tbl_baiviet`(`MaChuDe`, `MaNguoiDung`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDang`, `LuotXem`, `KiemDuyet`)
								VALUES ( $MaChuDe, $MaNguoiDung, '$TieuDe', '$TomTat', '$NoiDung',now(), 0, $KiemDuyet)";
								$kq = mysqli_query($link, $sql);
								if($kq)
									ThongBao("Đăng bài viết thành công!");
								
								else
									ThongBaoLoi(mysqli_error($link));
							}
						}
					?>
					<form method="post" action="baiviet_them.php">
						<div class="form-group">
							<label for="TieuDe">Tiêu đề</label>
							<input type="text" class="form-control" id="TieuDe" name="TieuDe" placeholder="" required />
						</div>
						
						<div class="form-group">
							<label for="MaChuDe">Chủ đề</label>
							<select  class="form-control" id="MaChuDe" name="MaChuDe" >
							<option value ="">--Chọn chủ đề--</option>
							<?php
								$sql ="SELECT *FROM tbl_chude";
								$danhsach =mysqli_query($link,$sql);
								
								while ($dong=mysqli_fetch_array($danhsach))
								{
									echo "<option value ='{$dong['ID']}'>{$dong['TenChuDe']}</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="TomTat">Tóm tắt</label>
							<textarea type="text" class="form-control" id="TomTat" name="TomTat" placeholder="" required /></textarea>
						</div>
						<div class="form-group">
							<label for="NoiDung">Nội dung</label>
							<textarea type="text" class="form-control ckeditor" id="NoiDung" name="NoiDung" placeholder="" required ></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
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
		<script src="js/ckeditor/ckeditor.js"></script>
	</body>
</html>