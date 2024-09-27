<?php

	chong_pha_hoai();

?>

<?php

	if(isset($_POST['dang_ky_thanh_vien']))

	{

		include("dangky_dangnhap/thuchien_dangky.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['dang_ky_thanh_vien__en']))

	{

		include("dangky_dangnhap/thuchien_dangky__en.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['thuchien_dangnhap__bcd']))

	{

		include("dangky_dangnhap/thuchien_dangnhap.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['thuchien_dangnhap__bcd___en']))

	{

		include("dangky_dangnhap/thuchien_dangnhap__en.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['sua_thanh_vien']))

	{

		include("dangky_dangnhap/thuc_hien_sua_thanh_vien.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['sua_thanh_vien__en']))

	{

		include("dangky_dangnhap/thuc_hien_sua_thanh_vien__en.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['lay_lai_mat_khau']))

	{

		include("dangky_dangnhap/lay_lai_mat_khau.php");

		trangtruoc();

		exit();

	}

	if(isset($_POST['lay_lai_mat_khau__en']))

	{

		include("dangky_dangnhap/lay_lai_mat_khau__en.php");

		trangtruoc();

		exit();

	}

	if($_GET['thamso']=="thoat")

	{

		include("dangky_dangnhap/thoat.php");

		trangtruoc();

		exit();

	}

	if($_GET['thamso']=="chon_ngon_ngu")

	{

		//include("dangky_dangnhap/thoat.php");

		switch($_GET['ngon_ngu'])

		{

			case"en":

				$_SESSION[$ten_danh_dau."ngon_ngu_abc"]="tieng_anh";

			break;

			default:

				$_SESSION[$ten_danh_dau."ngon_ngu_abc"]="tieng_viet";

		}

		/*echo $_SERVER['HTTP_REFERER'];echo "<hr>";exit();

		if(ereg("#detail_info",$_SERVER['HTTP_REFERER']))

		{

			$_SERVER['HTTP_REFERER']=str_replace("#detail_info","",$_SERVER['HTTP_REFERER']);

			chuyentrang($_SERVER['HTTP_REFERER']);

			exit();

		}*/

		//trangtruoc();

		chuyentrang($_SERVER['HTTP_REFERER']);

		exit();

	}

?>