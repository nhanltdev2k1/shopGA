<?php
	session_start();
	unset($_SESSION['ky_danh__quan_tri']);

	unset($_SESSION['mat_khau__quan_tri']);

	chuyentrang("index.php");

	exit;

?>