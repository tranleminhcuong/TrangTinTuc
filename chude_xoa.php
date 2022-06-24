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
				<h4 class="card-header">Xóa chủ đề</h4>
				<div class="card-body">
					<?php
						// Lấy id từ thanh địa chỉ
						$id = $_GET['id'];
						
						$sql = "DELETE FROM tbl_chude WHERE ID = $id";
						$kq = mysqli_query($link, $sql);
						if($kq)
							header("Location: chude.php");
						else
							ThongBaoLoi(mysqli_error($link));
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