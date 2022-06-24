<?php
	require_once "config.php";
	include_once "functions.php";
	//bài vừa đăng
	$sql1 = "SELECT * FROM `tbl_baiviet` WHERE KiemDuyet=1
				ORDER BY NgayDang DESC 
				LIMIT 1";
	$danhsach1 = mysqli_query($link, $sql1);
	
	//danh sách 5 bài mới nhất
	$sql2 = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.KiemDuyet = 1
			ORDER BY b.NgayDang ASC
			LIMIT 6";
	$danhsach2 = mysqli_query($link, $sql2);
	//thể thao
	$sql3 = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe =c.ID AND  b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND b.MaChuDe=1
            ORDER BY NgayDang ASC
			LIMIT 3";
	$danhsach3 = mysqli_query($link, $sql3);
	//chủ đề văn học
	$sql4 = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe =c.ID AND  b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND b.MaChuDe=4
            ORDER BY NgayDang DESC
			LIMIT 5";
			
	$danhsach4 = mysqli_query($link, $sql4);
	//chủ đề giáo dục
	$sql4 = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe =c.ID AND  b.MaNguoiDung = n.ID AND b.KiemDuyet = 1 AND b.MaChuDe=4
            ORDER BY NgayDang DESC
			LIMIT 5";
			
	$danhsach4 = mysqli_query($link, $sql4);
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		
		<div class="container">
			<?php include_once "navbar.php"; ?>
			<a href="#" class="badge badge-primary">#Xã Hội</a>
			<a href="#" class="badge badge-warning">#Giáo dục</a>
			<a href="#" class="badge badge-success">#Văn học</a>
			<a href="#" class="badge badge-danger">#Thể Thao</a>
			<hr/>
			<div class="card">
				<div class="card-body">
					
					<table cellpadding="2" cellspacing="2">
						<tbody>
							<tr>
								<td valign="top" rowspan="2"><?php while($dong = mysqli_fetch_array($danhsach1))
														{
															 
																echo"<img class='d-flex mr-3 img-thumbnail' src='" . LayHinhDauTien($dong['NoiDung']) . "' width='800' alt='' />
																<h3 class='mt-0'><a href='baiviet_xem.php?id={$dong['ID']}'>{$dong['TieuDe']}</a></h3>
																<p class='text-justify'>{$dong['TomTat']}</p>";
															
														}
												?>
								</td>
								<td valign="top"><?php while($dong = mysqli_fetch_array($danhsach2))
														{
															
																echo "<div class='media'>
																		<img class='d-flex mr-3 img-thumbnail' src='" . LayHinhDauTien($dong['NoiDung']) . "' width='60' alt='' />
																		<div class='media-body'>
																			<h5 class='mt-0'><a href='baiviet_xem.php?id={$dong['ID']}'>{$dong['TieuDe']}</a></h5>
																			<p class='post-meta text-muted'>Đăng bởi {$dong['HoVaTen']} vào lúc {$dong['NgayDang']}, có {$dong['LuotXem']} lượt xem.</p>
																		</div>
																	</div>";
														}
									?>
								</td>
							</tr>
							
						</tbody>
					</table>
					
					<div class='card-deck'>
					<?php 
						
						while($dong = mysqli_fetch_array($danhsach3))
						{
								  echo"<div class='card'>
										<img src='" . LayHinhDauTien($dong['NoiDung']) . "' width='60' class='card-img-top' alt=''/>
										<div class='card-body'>
										  <h5 class='card-title'><a href='baiviet_xem.php?id={$dong['ID']}'>{$dong['TieuDe']}</a></h5>
										  <p class='card-text'>{$dong['TomTat']}</p>
										</div>
										<div class='card-footer'>
										  <small class='text-muted'>Đăng bởi {$dong['HoVaTen']} vào lúc {$dong['NgayDang']}, có {$dong['LuotXem']} lượt xem.</small>
										</div>
									</div>";
						}
					?>
					</div>
					<!--chủ đề văn học-->
					
					<div class="clearfix vi-header"><h3 class="vi-left-title pull-left">VĂN HỌC</h3>
						<div class="vi-right-link pull-right"><a class="vi-more" href="">Xem tất cả »</a></div>
					</div>
					<?php
					while($dong = mysqli_fetch_array($danhsach4))
					{
						echo"<div class='media'>
								<img class='d-flex mr-3 img-thumbnail' src='" . LayHinhDauTien($dong['NoiDung']) . "' width='90' alt='' />
								<div class='media-body'>
									<h5 class='mt-0'><a href='baiviet_xem.php?id={$dong['ID']}'>{$dong['TieuDe']}</a></h5>
									<p class='post-meta text-muted'>Đăng bởi {$dong['HoVaTen']} vào lúc {$dong['NgayDang']}, có {$dong['LuotXem']} lượt xem.</p>
									<p class='text-justify'>{$dong['TomTat']}</p>
								</div>
							</div>";
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