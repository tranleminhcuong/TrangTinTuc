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
				<h4 class="card-header">Sửa chủ đề</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['TenChuDe'])) // Nếu nhấn nút "Cập nhật"
						{
							$ID = addslashes($_POST['ID']);
							$TenChuDe = addslashes($_POST['TenChuDe']);
							
							if(trim($TenChuDe) == "")
								ThongBaoLoi("Tên chủ đề không được bỏ trống!");
							else
							{
								$sql = "UPDATE tbl_chude SET TenChuDe = '$TenChuDe' WHERE ID = $ID";
								$kq = mysqli_query($link, $sql);
								if($kq)
									header("Location: chude.php");
								elseif(mysqli_errno($link) == 1062)
									ThongBaoLoi("Chủ đề <strong>$TenChuDe</strong> đã tồn tại!");
								else
									ThongBaoLoi(mysqli_error($link));
							}
						}
						else // Lấy dữ liệu "đổ" vào form
						{
							// Lấy id từ thanh địa chỉ
							$id = $_GET['id'];
							
							$sql = "SELECT * FROM tbl_chude WHERE ID = $id";
							$danhsach = mysqli_query($link, $sql);
							
							// Vì chỉ trả về 1 dòng nên không cần vòng lặp while
							$dong = mysqli_fetch_array($danhsach);
						
					?>
							<form method="post" action="chude_sua.php">
								<input type="hidden" id="ID" name="ID" value="<?php echo $dong['ID'] ?>" />
								<div class="form-group">
									<label for="TenChuDe">Tên chủ đề</label>
									<input type="text" class="form-control" id="TenChuDe" name="TenChuDe" value="<?php echo $dong['TenChuDe'] ?>" placeholder="" required />
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
	</body>
</html>