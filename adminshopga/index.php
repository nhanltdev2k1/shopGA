<?php



	session_start();
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
	

	include("db.php");

	include("ham/ham.php");

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" media="screen" href="hinh/chung.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<title>Quan ly</title>



</head>

<body>

<?php

	include("xacdinh_dangnhap.php");

	include("xu_ly_post_get/xu_ly_post_get.php");

?>

<style type="text/css">

	input

	{

		border:1px solid #cccccc

	}

	div

	{

		/*-moz-border-radius:8px;

		-webkit-border-radius:8px;*/

	}

	div.div_abc_ql

	{

		width:988px;

		

		text-align:left

	}

</style>

	<center>

		<div class="div_abc_ql">

			<?php

				if($xacdinh_dangnhap!="co")

				{

					include("khung_dang_nhap.php");

				}

				else

				{

						 echo "<form name='frm_dangnhap'>

			        <input type='hidden' name='chuyentrang' value='quan_tri.php?p=1'>

					</form>";

				}

			?>

		</div>

		

	</center>

    <script type="text/javascript">

if(document.frm_dangnhap)



 {

   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;

   window.location = trangcanchuyen;

 }

</script>

</body>

</html>