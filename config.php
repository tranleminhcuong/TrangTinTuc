<?php
	session_start();
	$link = mysqli_connect("127.0.0.1", "root", "vertrigo", "trangtin");
	mysqli_query($link, "SET NAMES 'utf8'");
?>