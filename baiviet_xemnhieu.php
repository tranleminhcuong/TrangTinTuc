<?php
	
	require_once "config.php";
	include_once "functions.php";
	
	$sql = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.KiemDuyet = 1
			ORDER BY b.LuotXem DESC";
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include_once "navbar.php"; ?>
			
			<div class="card">
				<h4 class="card-header">Xem nhiều nhất</h4>
				<div class="card-body">
				<?php
					while($dong = mysqli_fetch_array($danhsach))
					{

						echo "<div class='media'>";
							echo "<img class='d-flex mr-3 img-thumbnail' src='" . LayHinhDauTien($dong['NoiDung']) . "' width='90' alt='' />";
							echo "<div class='media-body'>";
								echo "<h5 class='mt-0'><a href='baiviet_xem.php?id={$dong['ID']}'>{$dong['TieuDe']}</a></h5>";
								echo "<p class='post-meta text-muted'>Đăng bởi {$dong['HoVaTen']} vào lúc {$dong['NgayDang']}, có {$dong['LuotXem']} lượt xem.</p>";
								echo "<p class='text-justify'>{$dong['TomTat']}</p>";
							echo "</div>";
						echo "</div>";
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