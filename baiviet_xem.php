<?php
	require_once "config.php";
	include_once "functions.php";
	$id = $_GET['id'];
	
	$sql = "SELECT b.*, c.TenChuDe, n.HoVaTen
			FROM tbl_baiviet b, tbl_chude c, tbl_nguoidung n
			WHERE b.MaChuDe = c.ID AND b.MaNguoiDung = n.ID AND b.ID=".$id;
	$danhsach = mysqli_query($link, $sql);
	$dong = mysqli_fetch_array($danhsach);
	//tang lượt xem
	//chính sách: mỗi máy chỉ tăng 1 lần
	
	$idxem="BV".$id;
	$daxem=isset($_SESSION[$idxem]) ? $_SESSION[$idxem] :"";
	if(empty($daxem))
	{
		$sql_tlx="UPDATE tbl_baiviet SET LuotXem=LuotXem+1 WHERE ID =".$id;
		mysqli_query($link,$sql_tlx);
		$_SESSION[$idxem]=1;
	}
	
?>

 
<!DOCTYPE html>
<html lang="en">

	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include_once "navbar.php"; ?>
			
			<div class="card">
				<h4 class="card-header"><?php echo $dong['TieuDe'];?> </h4>
				<div class="card-body">
				<?php
						echo "<p class='post-meta text-muted'>Đăng bởi {$dong['HoVaTen']} vào lúc {$dong['NgayDang']}, có {$dong['LuotXem']} lượt xem.</p>";
						echo "<p class='text-justify font-weight-bold'>{$dong['TomTat']}</p>";
						echo "<p class='text-justify'>{$dong['NoiDung']}</p>";
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