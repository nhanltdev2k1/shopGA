<?php
	chong_pha_hoai();
	switch($_SESSION[$ten_danh_dau."ngon_ngu_abc"])
	{
		case"tieng_anh":
			$ngon_ngu_abc="tieng_anh";
		break;
		default:
			$ngon_ngu_abc="tieng_viet";
	}
?>