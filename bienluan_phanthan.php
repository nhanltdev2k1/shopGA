<?php
session_start();
switch ($_GET['thamso']) {

	case "du_an":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('du_an/du_an_en.php');

				break;

			default:

				include('du_an/du_an.php');
		}

		break;

	case "tuyen_dung":

		switch ($ngon_ngu_abc) {

			case "tuyen_dung":

				include('tuyen_dung/tuyen_dung.php');

				break;

			default:

				include('tuyen_dung/tuyen_dung.php');
		}

		break;

	case "bang_gia":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('bang_gia/bang_gia_en.php');

				break;

			default:

				include('bang_gia/bang_gia.php');
		}

		break;

	case "video_clip":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('video_clip/video_en.php');

				break;

			default:

				include('video_clip/video.php');
		}

		break;



	case "ban_dotc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ban_dotc/ban_dotc.php');

				break;

			default:

				include('ban_dotc/ban_dotc.php');
		}

		break;

	case "kien_thuc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('kien_thuc/thuong_mai_en.php');



				break;

			default:

				include('kien_thuc/kien_thuc.php');
		}

		break;

	case "chitiet_kienthuc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('kien_thuc/chitiet_thuongmai_en.php');

				break;

			default:

				include('kien_thuc/chitiet_kienthuc.php');
		}

		break;

	case "thi_cong":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thi_cong/thuong_mai_en.php');



				break;

			default:

				include('thi_cong/thi_cong.php');
		}

		break;

	case "chitiet_thicong":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thi_cong/chitiet_thicong_en.php');

				break;

			default:

				include('thi_cong/chitiet_thicong.php');
		}

		break;



	case "tuvan_thietke":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tuvan_thietke/tuvan_thietke_en.php');



				break;

			default:

				include('tuvan_thietke/tuvan_thietke.php');
		}

		break;

	case "chitiet_tuvanthietke":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tuvan_thietke/chitiet_tuvanthietke_en.php');

				break;

			default:

				include('tuvan_thietke/chitiet_tuvanthietke.php');
		}

		break;

	case "kien_truc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('kien_truc/kien_truc_en.php');



				break;

			default:

				include('kien_truc/kien_truc.php');
		}

		break;

	case "chitiet_kientruc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('kien_truc/chitiet_kientruc_en.php');

				break;

			default:

				include('kien_truc/chitiet_kientruc.php');
		}

		break;

	case "chitiet_phongthuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/chitiet_phongthuy_en.php');

				break;

			default:

				include('phong_thuy/chitiet_phongthuy.php');
		}

		break;



	case "phong_thuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/phongthuy_en.php');

				break;

			default:

				include('phong_thuy/phong_thuy.php');
		}

		break;

	case "chitiet_phongthuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/chitiet_phongthuy_en.php');

				break;

			default:

				include('phong_thuy/chitiet_phongthuy.php');
		}

		break;



	case "phong_thuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/phongthuy_en.php');

				break;

			default:

				include('phong_thuy/phong_thuy.php');
		}

		break;





	case "gioi_thieu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('gioi_thieu/gioi_thieu_en.php');

				break;

			default:

				include('gioi_thieu/gioi_thieu.php');
		}

		break;



	case "tuyen_dung":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tuyen_dung/tuyen_dung_en.php');

				break;

			default:

				include('tuyen_dung/tuyen_dung.php');
		}

		break;

	case "ky_thuat":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ky_thuat/ky_thuat_en.php');



				break;

			default:

				include('ky_thuat/ky_thuat.php');
		}

		break;

	case "chitiet_kythuat":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ky_thuat/chitiet_kythuat_en.php');

				break;

			default:

				include('ky_thuat/chitiet_kythuat.php');
		}

		break;

	case "dich_vu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('dich_vu/dich_vu_en.php');

				break;

			default:

				include('dich_vu/dich_vu.php');
		}

		break;





	case "tim_kiem":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tim_kiem/tim_kiem_en.php');

				break;

			default:

				include('tim_kiem/tim_kiem.php');
		}

		break;





	case "san_pham_left":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('san_pham/toanbo_sanpham_left_en.php');

				break;

			default:

				include('san_pham/toanbo_sanpham_left.php');
		}

		break;









	case "thuong_mai":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thuong_mai/thuong_mai_en.php');



				break;

			default:

				include('thuong_mai/thuong_mai.php');
		}

		break;

	case "chitiet_thuongmai":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thuong_mai/chitiet_thuongmai_en.php');

				break;

			default:

				include('thuong_mai/chitiet_thuongmai.php');
		}

		break;



	case "bao_gia":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('bao_giai/bao_gia_en.php');



				break;

			default:

				include('bao_gia/bao_gia.php');
		}

		break;

	case "chitiet_baogia":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('bao_gia/chitiet_baogia_en.php');

				break;

			default:

				include('bao_gia/chitiet_baogia.php');
		}

		break;

	case "thu_vien":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thu_vien/thu_vien_en.php');



				break;

			default:

				include('thu_vien/thu_vien.php');
		}

		break;

	case "chitiet_thuvien":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('thu_vien/chitiet_thuvien_en.php');

				break;

			default:

				include('thu_vien/chitiet_thuvien.php');
		}

		break;

	case "ban_do":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("ban_do/ban_do_en.php");

				break;

			default:

				include("ban_do/ban_do.php");
		}

		break;



	case "khuyen_mai":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("khuyen_mai/khuyen_mai_en.php");

				break;

			default:

				include("khuyen_mai/khuyen_mai.php");
		}

		break;



	case "chitiet_duan":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("du_an/chitiet_duan_en.php");

				break;

			default:

				include("du_an/chitiet_duan.php");
		}

		break;



	case "chitiet_dichvu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("dich_vu/chitiet_dichvu_en.php");

				break;

			default:

				include("dich_vu/chitiet_dichvu.php");
		}

		break;



	case "chitiet_doitac":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("doi_tac/chitiet_doitac_en.php");

				break;

			default:

				include("doi_tac/chitiet_doitac.php");
		}

		break;



	case "chitiet_sanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('san_pham/chitiet_sanpham_en.php');

				break;

			default:

				include('san_pham/chitiet_sanpham.php');
		}

		break;

	case "toanbo_sanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('san_pham/toanbo_sanpham_en.php');

				break;

			default:

				include('san_pham/toanbo_sanpham.php');
		}

		break;





	case "lien_he":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("lien_he/lien_he_en.php");

				break;

			default:

				include("lien_he/lien_he.php");
		}

		break;



	case "chitiet_phongthuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/chitiet_phongthuy_en.php');

				break;

			default:

				include('phong_thuy/chitiet_phongthuy.php');
		}

		break;



	case "phong_thuy":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('phong_thuy/phongthuy_en.php');

				break;

			default:

				include('phong_thuy/phongthuy.php');
		}

		break;



	case "chitiet_tintuc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tuc/chitiet_tintuc_en.php');

				break;

			default:

				include('tin_tuc/chitiet_tintuc.php');
		}

		break;

	case "tin_tuc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tuc/tin_tuc_en.php');



				break;

			default:

				include('tin_tuc/tin_tuc.php');
		}

		break;

	case "tin_tucct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tuc/tin_tuc_en.php');



				break;

			default:

				include('tin_tuc/tin_tucct.php');
		}

		break;





	case "chitiet_tintintuc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tintuc/chitiet_tintintuc_en.php');

				break;

			default:


				include('tin_tintuc/chitiet_tintintuc.php');
		}


		break;

	case "tin_tintuc":


		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tintuc/tin_tintuc_en.php');



				break;

			default:

				include('tin_tintuc/tin_tintuc.php');
		}

		break;

	case "tin_tintucct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_tintuc/tin_tintuc_en.php');



				break;

			default:

				include('tin_tintuc/tin_tintucct.php');
		}

		break;

	case "chitiet_tinthicong":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_thicong/chitiet_tinthicong_en.php');

				break;

			default:

				include('tin_thicong/chitiet_tinthicong.php');
		}

		break;

	case "tin_thicong":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_thicong/tin_thicong_en.php');



				break;

			default:

				include('tin_thicong/tin_thicong.php');
		}

		break;

	case "tin_thicongct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_thicong/tin_thicongct_en.php');



				break;

			default:

				include('tin_thicong/tin_thicongct.php');
		}

		break;





	case "chitiet_tindichvu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_dichvu/chitiet_tindichvu_en.php');

				break;

			default:

				include('tin_dichvu/chitiet_tindichvu.php');
		}

		break;

	case "tin_dichvu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_dichvu/tin_dichvu_en.php');



				break;

			default:

				include('tin_dichvu/tin_dichvu.php');
		}

		break;

	case "tin_dichvuct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_dichvu/tin_dichvuct_en.php');



				break;

			default:

				include('tin_dichvu/tin_dichvuct.php');
		}

		break;
	case "tin_dichvuctc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_dichvu/tin_dichvuct_en.php');



				break;

			default:

				include('tin_dichvu/tin_dichvuctc.php');
		}

		break;



	case "chitiet_tinsanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanpham/chitiet_tinsanpham_en.php');

				break;

			default:
				include('tin_sanpham/chitiet_tinsanpham.php');
		}

		break;

	case "tin_sanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanpham/tin_sanpham_en.php');



				break;

			default:
				include('tin_sanpham/tin_sanpham.php');
		}

		break;

	case "tin_sanphamct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanpham/tin_sanphamct_en.php');



				break;

			default:

				include('tin_sanpham/tin_sanphamct.php');
		}

		break;





	case "chitiet_tinsanphama":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphama/chitiet_tinsanphama_en.php');

				break;

			default:

				include('tin_sanphama/chitiet_tinsanphama.php');
		}

		break;

	case "tin_sanphama":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphama/tin_sanphama_en.php');



				break;

			default:

				include('tin_sanphama/tin_sanphama.php');
		}

		break;

	case "tin_sanphamact":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphama/tin_sanphamact_en.php');



				break;

			default:

				include('tin_sanphama/tin_sanphamact.php');
		}

		break;





	case "chitiet_tinsanphamab":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamab/chitiet_tinsanphamab_en.php');

				break;

			default:

				include('tin_sanphamab/chitiet_tinsanphamab.php');
		}

		break;

	case "tin_sanphamab":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamab/tin_sanphamab_en.php');



				break;

			default:

				include('tin_sanphamab/tin_sanphamab.php');
		}

		break;

	case "tin_sanphamabct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamab/tin_sanphamabct_en.php');



				break;

			default:

				include('tin_sanphamab/tin_sanphamabct.php');
		}

		break;







	case "chitiet_tinsanphamabc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabc/chitiet_tinsanphamabc_en.php');

				break;

			default:

				include('tin_sanphamabc/chitiet_tinsanphamabc.php');
		}

		break;

	case "tin_sanphamabc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabc/tin_sanphamabc_en.php');



				break;

			default:

				include('tin_sanphamabc/tin_sanphamabc.php');
		}

		break;

	case "tin_sanphamabcct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabc/tin_sanphamabcct_en.php');



				break;

			default:

				include('tin_sanphamabc/tin_sanphamabcct.php');
		}

		break;



	case "chitiet_tinsanphamabcd":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabcd/chitiet_tinsanphamabcd_en.php');

				break;

			default:

				include('tin_sanphamabcd/chitiet_tinsanphamabcd.php');
		}

		break;

	case "tin_sanphamabcd":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabcd/tin_sanphamabcd_en.php');



				break;

			default:

				include('tin_sanphamabcd/tin_sanphamabcd.php');
		}

		break;

	case "tin_sanphamabcdct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('tin_sanphamabcd/tin_sanphamabcdct_en.php');



				break;

			default:

				include('tin_sanphamabcd/tin_sanphamabcdct.php');
		}

		break;





	case "chitiet_bosuutap":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("bo_suu_tap/chitiet_bosuutap_en.php");

				break;

			default:

				include("bo_suu_tap/chitiet_bosuutap.php");
		}

		break;

	case "bo_suu_tap":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("bo_suu_tap/bosuutap_en.php");

				break;

			default:

				include("bo_suu_tap/bosuutap.php");
		}

		break;



	case "huongdan_muahang":

		require 'cauhoi_thuonggap/huongdan_muahang.php';

		break;

	case "huongdan_xemhang":

		require 'cauhoi_thuonggap/huongdan_xemhang.php';

		break;

	case "cauhoi_thuonggap":

		require 'cauhoi_thuonggap/cauhoi_thuonggap.php';

		break;

	case "hotro":

		require 'cauhoi_thuonggap/hotro.php';

		break;

	case "doitrahang":

		require 'cauhoi_thuonggap/doitrahang.php';

		break;

	case "giaohang_thutien":

		require 'cauhoi_thuonggap/giaohang_thutien.php';

		break;

	case "hoidap":

		require 'cauhoi_thuonggap/hoidap.php';

		break;

	case "thanhtoan_tructuyen":

		require 'cauhoi_thuonggap/thanhtoan_tructuyen.php';

		break;

	case "hinhthuc_thanhtoan":

		require 'cauhoi_thuonggap/hinhthuc_thanhtoan.php';

		break;

	case "hangnhapkhau":

		require 'cauhoi_thuonggap/hangnhapkhau.php';

		break;

	case "hangtrongkho":

		require 'cauhoi_thuonggap/hangtrongkho.php';

		break;

	case "thongtin_lienquan":

		require 'cauhoi_thuonggap/thongtin_lienquan.php';

		break;



	case "dang_ky":

		require 'dangky/dangky.php';

		break;

	case "dang_xuat":

		require 'dangnhap/dangxuat.php';

		break;

	case "dang_nhap":

		require 'dangnhap/dangnhap.php';

		break;

	case "dang_tin":

		require 'dangtin/dangtin.php';

		break;

	case "tintuc_bds":

		require 'tinbds/tinbds.php';

		break;

	case "tim_kiem":

		require 'timkiem/timkiem.php';

		break;





	case "download":

		require 'download/download.php';

		break;

	case "logincv":

		require 'login/logincv.php';

		break;

	case "downloadcongvan":

		require 'downloadcongvan/downloadcongvan.php';

		break;

	case "logoutcv":

		unset($_SESSION['_09787435435juser']);

		require 'login/logincv.php';

		break;

	case "login":

		require 'login/login.php';

		break;



	case "logout":

		unset($_SESSION['_09787435435juser']);

		require 'login/login.php';

		break;





	case "chitiet_gioithieu":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('gioi_thieu/chitiet_gioithieu_en.php');

				break;

			default:

				include('gioi_thieu/chitiet_gioithieu.php');
		}

		break;



	case "doi_tac":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('doi_tac/doi_tac_en.php');

				break;

			default:

				include('doi_tac/doi_tac.php');
		}

		break;



	case "sanpham_banchay":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_banchay/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_banchay/sanpham_banchay.php');
		}

		break;

	case "sanpham_banchayct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_banchay/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_banchay/sanpham_banchayct.php');
		}

		break;



	case "chitiet_sanphambanchay":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_banchay/chitiet_masanpham_en.php');

				break;

			default:

				include('sanpham_banchay/chitiet_sanphambanchay.php');
		}

		break;



	case "sanpham_moi":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanpham/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_moi/sanpham_moi.php');
		}

		break;

	case "sanpham_moict":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_moi/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_moi/sanpham_moict.php');
		}

		break;



	case "chitiet_sanphammoi":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_moi/chitiet_masanpham_en.php');

				break;

			default:

				include('sanpham_moi/chitiet_sanphammoi.php');
		}

		break;





	case "sanpham_noibat":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_noibat/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_noibat/sanpham_noibat.php');
		}

		break;

	case "sanpham_noibatct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_noibat/ma_sanpham_en.php');

				break;

			default:

				include('sanpham_noibat/sanpham_noibatct.php');
		}

		break;



	case "chitiet_sanphamnoibat":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('sanpham_noibat/chitiet_masanpham_en.php');

				break;

			default:

				include('sanpham_noibat/chitiet_sanphamnoibat.php');
		}

		break;



	case "ma_sanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanpham/ma_sanpham_en.php');

				break;

			default:

				include('ma_sanpham/ma_sanpham.php');
		}

		break;

	case "ma_sanphamct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanpham/ma_sanphamct_en.php');

				break;

			default:

				include('ma_sanpham/ma_sanphamct.php');
		}

		break;



	case "chitiet_masanpham":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanpham/chitiet_masanpham_en.php');

				break;

			default:

				include('ma_sanpham/chitiet_masanpham.php');
		}

		break;



	case "dat_hang":

		include('sources/paying.php');

		include('ma_sanpham/paying_tpl.php');

		break;



	case "dat_hangabcd":

		include('sources/paying.php');

		include('ma_sanphamabcd/paying_tpl.php');

		break;

	case "dat_hangabc":

		include('sources/paying.php');

		include('ma_sanphamabc/paying_tpl.php');

		break;



	case "ma_sanphamabc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabc/ma_sanphamabc_en.php');

				break;

			default:

				include('ma_sanphamabc/ma_sanphamabc.php');
		}

		break;

	case "ma_sanphamabcct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabc/ma_sanphamabcct_en.php');

				break;

			default:

				include('ma_sanphamabc/ma_sanphamabcct.php');
		}

		break;

	case "chitiet_masanphamabc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabc/chitiet_masanphamabc_en.php');

				break;

			default:

				include('ma_sanphamabc/chitiet_masanphamabc.php');
		}

		break;

	case "ma_sanphamabcd":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcd/ma_sanphamabcd_en.php');

				break;

			default:

				include('ma_sanphamabcd/ma_sanphamabcd.php');
		}

		break;

	case "timkiem":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcd/timkiem_en.php');

				break;

			default:

				include('ma_sanphamabcd/timkiem.php');
		}

		break;

	case "ma_sanphamabcdct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcd/ma_sanphamabcdct_en.php');

				break;

			default:

				include('ma_sanphamabcd/ma_sanphamabcdct.php');
		}

		break;

	case "chitiet_masanphamabcd":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcd/chitiet_masanphamabcd_en.php');

				break;

			default:

				include('ma_sanphamabcd/chitiet_masanphamabcd.php');
		}

		break;

	case "ma_sanphamabcde":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcde/ma_sanphamabcde_en.php');

				break;

			default:

				include('ma_sanphamabcde/ma_sanphamabcde.php');
		}

		break;

	case "ma_sanphamabcdect":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcde/ma_sanphamabcdect_en.php');

				break;

			default:

				include('ma_sanphamabcde/ma_sanphamabcdect.php');
		}

		break;



	case "chitiet_masanphamabcde":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcde/chitiet_masanphamabcde_en.php');

				break;

			default:

				include('ma_sanphamabcde/chitiet_masanphamabcde.php');
		}

		break;

	case "ma_sanphamabcdef":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdef/ma_sanphamabcdef_en.php');

				break;

			default:

				include('ma_sanphamabcdef/ma_sanphamabcdef.php');
		}

		break;

	case "ma_sanphamabcdefct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdef/ma_sanphamabcdefct_en.php');

				break;

			default:

				include('ma_sanphamabcdef/ma_sanphamabcdefct.php');
		}

		break;



	case "chitiet_masanphamabcdef":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdef/chitiet_masanphamabcdef_en.php');

				break;

			default:

				include('ma_sanphamabcdef/chitiet_masanphamabcdef.php');
		}

		break;

	case "ma_sanphamabcdefg":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefg/ma_sanphamabcdefg_en.php');

				break;

			default:

				include('ma_sanphamabcdefg/ma_sanphamabcdefg.php');
		}

		break;

	case "ma_sanphamabcdefgct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefg/ma_sanphamabcdefct_en.php');

				break;

			default:

				include('ma_sanphamabcdefg/ma_sanphamabcdefgct.php');
		}

		break;



	case "chitiet_masanphamabcdefg":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefg/chitiet_masanphamabcdefg_en.php');

				break;

			default:

				include('ma_sanphamabcdefg/chitiet_masanphamabcdefg.php');
		}

		break;





	case "ma_sanphamabcdefgn":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgn/ma_sanphamabcdefgn_en.php');

				break;

			default:

				include('ma_sanphamabcdefgn/ma_sanphamabcdefgn.php');
		}

		break;

	case "ma_sanphamabcdefgnct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgn/ma_sanphamabcdefnct_en.php');

				break;

			default:

				include('ma_sanphamabcdefgn/ma_sanphamabcdefgnct.php');
		}

		break;



	case "chitiet_masanphamabcdefgn":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgn/chitiet_masanphamabcdefgn_en.php');

				break;

			default:

				include('ma_sanphamabcdefgn/chitiet_masanphamabcdefgn.php');
		}

		break;





	case "ma_sanphamabcdefgnm":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnm/ma_sanphamabcdefgnm_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnm/ma_sanphamabcdefgnm.php');
		}

		break;

	case "ma_sanphamabcdefgnmct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnm/ma_sanphamabcdefnmct_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnm/ma_sanphamabcdefgnmct.php');
		}

		break;



	case "chitiet_masanphamabcdefgnm":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnm/chitiet_masanphamabcdefgnm_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnm/chitiet_masanphamabcdefgnm.php');
		}

		break;



	case "ma_sanphamabcdefgnmh":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnmh/ma_sanphamabcdefgnmh_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnmh/ma_sanphamabcdefgnmh.php');
		}

		break;

	case "ma_sanphamabcdefgnmhct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnmh/ma_sanphamabcdefnmhct_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnmh/ma_sanphamabcdefgnmhct.php');
		}

		break;



	case "chitiet_masanphamabcdefgnmh":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('ma_sanphamabcdefgnmh/chitiet_masanphamabcdefgnmh_en.php');

				break;

			default:

				include('ma_sanphamabcdefgnmh/chitiet_masanphamabcdefgnmh.php');
		}

		break;



	case "dacsan_quangnam":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('dacsan_quangnam/ma_sanpham_en.php');

				break;

			default:

				include('dacsan_quangnam/dacsan_quangnam.php');
		}

		break;

	case "dacsan_quangnamct":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('dacsan_quangnam/ma_sanpham_en.php');

				break;

			default:

				include('dacsan_quangnam/dacsan_quangnamct.php');
		}

		break;



	case "chitiet_dacsanquangnam":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('dacsan_quangnam/chitiet_masanpham_en.php');

				break;

			default:

				include('dacsan_quangnam/chitiet_dacsanquangnam.php');
		}

		break;

	case "gio_hang":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hang/gio_hang__en.php");

				break;

			default:

				include("gio_hang/gio_hang.php");
		}

		break;



	case "giohang_xuly_session":

		include("gio_hang/xuly_session.php");

		break;



	case "gio_hangdacsan":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangdacsan/gio_hang__en.php");

				break;

			default:

				include("gio_hangdacsan/gio_hangdacsan.php");
		}

		break;



	case "giohang_xuly_sessiondacsan":

		include("gio_hangdacsan/xuly_sessiondacsan.php");

		break;



	case "giohang_xuly_session":

		include("gio_hang/xuly_session.php");

		break;



	case "gio_hangabc":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabc/gio_hang__en.php");

				break;

			default:

				include("gio_hangabc/gio_hangabc.php");
		}

		break;



	case "giohang_xuly_sessionabc":

		include("gio_hangabc/xuly_sessionabc.php");

		break;



	case "gio_hangabcd":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabcd/gio_hang__en.php");

				break;

			default:

				include("gio_hangabcd/gio_hangabcd.php");
		}

		break;



	case "giohang_xuly_sessionabcd":

		include("gio_hangabcd/xuly_sessionabcd.php");

		break;



	case "gio_hangabcde":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabcde/gio_hang__en.php");

				break;

			default:

				include("gio_hangabcde/gio_hangabcde.php");
		}

		break;



	case "giohang_xuly_sessionabcde":

		include("gio_hangabcde/xuly_sessionabcde.php");

		break;



	case "gio_hangabcdef":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabcdef/gio_hang__en.php");

				break;

			default:

				include("gio_hangabcdef/gio_hangabcdef.php");
		}

		break;



	case "giohang_xuly_sessionabcdef":

		include("gio_hangabcdef/xuly_sessionabcdef.php");

		break;



	case "gio_hangabcdefg":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabcdefg/gio_hang__en.php");

				break;

			default:

				include("gio_hangabcdefg/gio_hangabcdefg.php");
		}

		break;



	case "giohang_xuly_sessionabcdefg":

		include("gio_hangabcdefg/xuly_sessionabcdefg.php");

		break;



	case "gio_hangabcdefgn":

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include("gio_hangabcdefgn/gio_hang__en.php");

				break;

			default:

				include("gio_hangabcdefgn/gio_hangabcdefgn.php");
		}

		break;



	case "giohang_xuly_sessionabcdefgn":

		include("gio_hangabcdefgn/xuly_sessionabcdefgn.php");

		break;



	default:

		switch ($ngon_ngu_abc) {

			case "tieng_anh":

				include('noi_dung/noi_dung_en.php');

				break;

			default:


				include('noi_dung/noi_dung.php');
		}
}
