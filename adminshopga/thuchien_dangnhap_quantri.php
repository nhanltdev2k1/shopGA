<?php

	chong_pha_hoai();

	if($_POST['ky_danh']!="")

	{	

		$mk=md5(md5(trim($_POST['mat_khau']))); 

		

		$tv="select count(*) from thongtin_quantri where ky_danh='$_POST[ky_danh]' and mat_khau='$mk'";

		$tv_1=mysqli_query($link,$tv);

		$tv_2=mysqli_fetch_row($tv_1);

		if($tv_2[0]!=0)

		{

			$_SESSION[$ten_danh_dau."ky_danh__quan_tri"]=$_POST['ky_danh'];

			$_SESSION[$ten_danh_dau."mat_khau__quan_tri"]=$mk;

		}

		else

		{

			thongbao("Sai ký danh hoặc mật khẩu");

		}

	}

	else

	{

		thongbao("Không được bỏ trống ký danh , mật khẩu");

	}

?>