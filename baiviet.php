<?php
	require_once "config.php";
	include_once "functions.php";
	
	$sql = "SELECT b.* , c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung= n.ID" ;
	$danhsach = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">

	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include_once "navbar.php"; ?>
			
			<div class="card">
				<h4 class="card-header">Quản lý bài viết</h4>
				<div class="card-body">
					<p><a class="btn btn-primary" href="baiviet_them.php" role="button">Thêm bài viết</a></p>
					
					<table class="table table-bordered table-hover table-responsive">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="15%">Tên chủ đề</th>
								<th width="15%">Tiêu đề</th>
								<th width="15%">Người đăng</th>
								<th width="20%">Ngày đăng</th>
								<th width="20%">O/F</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($dong = mysqli_fetch_array($danhsach))
								{
									echo "<tr>";
										echo "<th>{$dong['ID']}</th>";
										echo "<td>{$dong['TenChuDe']}</td>";
										echo "<td>{$dong['TieuDe']}</td>";
										echo "<td>{$dong['HoVaTen']}</td>";
										echo "<td>{$dong['NgayDang']}</td>";
										echo "<td class='text-center'>";
												if ($dong['KiemDuyet']==1)
													echo "<a href='baiviet_duyet.php?id={$dong['ID']}&duyet=0' class='badge badge-success'>Đã duyệt</a>";
												else
													echo "<a href='baiviet_duyet.php?id={$dong['ID']}&duyet=1' class='badge badge-danger'>Chưa duyệt</a>";
										echo "</td>";
										echo "<td class='text-center'><a href='baiviet_sua.php?id={$dong['ID']}'><img src='images/edit.png' /></a></td>";
										echo "<td class='text-center'><a onclick='return confirm(\"Bạn có muốn xóa chủ đề {$dong['TieuDe']} không?\");' href='baiviet_xoa.php?id={$dong['ID']}'><img src='images/delete.png' /></a></td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
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