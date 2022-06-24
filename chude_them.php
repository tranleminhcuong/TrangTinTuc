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
				<h4 class="card-header">Thêm chủ đề</h4>
				<div class="card-body">
					<?php
						if(isset($_POST['TenChuDe']))
						{
							$TenChuDe = addslashes($_POST['TenChuDe']);
							
							if(trim($TenChuDe) == "")
								ThongBaoLoi("Tên chủ đề không được bỏ trống!");
							else
							{
								$sql = "INSERT INTO tbl_chude(TenChuDe) VALUES('$TenChuDe')";
								$kq = mysqli_query($link, $sql);
								if($kq)
									header("Location: chude.php");
								elseif(mysqli_errno($link) == 1062)
									ThongBaoLoi("Chủ đề <strong>$TenChuDe</strong> đã tồn tại!");
								else
									ThongBaoLoi(mysqli_error($link));
							}
						}
					?>
					<form method="post" action="chude_them.php">
						<div class="form-group">
							<label for="TenChuDe">Tên chủ đề</label>
							<input type="text" class="form-control" id="TenChuDe" name="TenChuDe" placeholder="" required />
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
	</body>
</html>