<?php
	// Thư viện các hàm
	function ThongBao($str)
	{
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
				echo '<span aria-hidden="true">&times;</span>';
			echo '</button>';
			echo $str;
		echo '</div>';
	}
	
	function ThongBaoLoi($str)
	{
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
				echo '<span aria-hidden="true">&times;</span>';
			echo '</button>';
			echo $str;
		echo '</div>';
	}
	
	function LayHinhDauTien($strNoiDung)
	{
		$first_img = "";
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
		if(empty($output))
			return "images/noimage.png";
		else
			return $matches[1][0];
	}
?>