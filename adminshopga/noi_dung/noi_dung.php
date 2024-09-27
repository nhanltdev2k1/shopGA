<!-- Arquivos utilizados pelo jQuery lightBox plugin -->



<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />

<!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->



<!-- Ativando o jQuery lightBox plugin -->

<script type="text/javascript">
	$(document).ready(function() {

		$('.lightbox').lightBox();

	});
</script>

<?php



class pager

{
	function findStart($limit)

	{

		if (!isset($_GET['page']) || ($_GET['page'] == "1")) {

			$start = 0;

			$_GET['page'] = 1;
		} else {

			$start = ($_GET['page'] - 1) * $limit;
		}

		return $start;
	}

	function findPages($count, $limit)

	{

		$page = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;

		return $page;
	}

	function pageList($curpage, $pages)

	{

		$page_list = "";



		if (($curpage != 1) && ($curpage)) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=2&page=1\" title=\"Trang đầu\"> << </a>";
		}

		if ($curpage - 1 > 0) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=2&page=" . ($curpage - 1) . "\" title=\"Về trang trước\"><font color='#00ccff'> < </font></a>";
		}

		for ($i = 1; $i <= $pages; $i++) {

			if ($i == $curpage) {

				$page_list .= "<b>" . $i . "</b>";
			} else {

				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=2&page=" . $i . "\" title=\"Trang " . $i . "\"><font color='#E6E600'>[" . $i . "]</font></a>";
			}

			$page_list .= "";
		}

		if (($curpage + 1) <= $pages) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=2&page=" . ($curpage + 1) . "\" title=\"Đến trang sau\"><font color='#00ccff'> > </font></a>";
		}

		if (($curpage != $pages) && ($pages != 0)) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=2&page=" . $pages . "\" title=\"Trang cuối\"> >> </a>";
		}

		$page_list .= "</td>\n";

		return $page_list;
	}

	function nextprev($curpage, $page)

	{

		$next_prev = "";

		if (($curpage - 1) < 0 || ($curpage - 1) != 1) {

			$next_prev .= "Back";
		} else {



			$next_prev = "<a href=\"sanpham.php?p=1&page=" . ($curpage - 1) . "\">Back</a>";
		}

		$next_prev .= "|";

		if (($curpage + 1) > $page) {

			$next_prev .= "Next";
		} else {

			$next_prev = "<a href=\"sanpham.php?p=1&page=" . ($curpage + 1) . "\">Next</a>";
		}

		return $next_prev;
	}
}

?>

<div class="title1">

	<div style="padding-top:11px; padding-left:65px"><span style="padding-top:10px;">SẢN PHẨM</span></div>

</div>



<div class="sanpham" align="center">

	<?php

	//include_once("phan_trang.php");

	require('db.php');

	// $ketnoi_maychu = ketnoi_MC();

	//chon_CSDL($ketnoi_maychu);

	$p = new pager;

	$limit = 15;

	$start = $p->findStart($limit);

	$count = mysql_num_rows(mysql_query("SELECT*FROM san_pham where trangchu like '1'"));

	$pages = $p->findPages($count, $limit);

	$result = mysql_query("SELECT * FROM san_pham  where trangchu like '1' ORDER BY id DESC limit  $start,$limit");

	// hiển thị DL

	if (mysql_num_rows($result) <> 0) {

		echo " <table width='100%' border='0'>";





		$stt = 0;

		while ($row = mysql_fetch_object($result)) {

			//$masp=$row[0];

			$id = $row->id;

			$thuoc_menu = $row->thuoc_menu;

			$tensp = $row->tieude;



			$giaban = number_format($row->giaban, 0, '.', '.');

			$hinhanh = "Hinh CTSP/" . $row->hinhanh;

			$hinhanh = "<img src='$hinhanh'  height='130' width='150px' alt='$tensp' border='0'>";

			$link_hinh = "Hinh CTSP/" . $row->hinhanh;

			if ($stt % 3 == 0) {
				echo "<tr >";
			}

			echo "<td align='center'>";





			echo "<div class='product' align='center'>



        <div class='img_pro' ><a href='$link_hinh' class='lightbox'>$hinhanh</a></div>



       <div class='txt_pro' align='center'>

	   <a href='chitiet.php?thamso=chitiet_sanpham&id=" . $id . "&thuoc_menu=" . $thuoc_menu . "'>$tensp </a>

	   <br> Giá bán: $giaban VNĐ

	   <br><a href='chitiet.php?thamso=chitiet_sanpham&id=" . $id . "&thuoc_menu=" . $thuoc_menu . "'><img src='images/chi-tiet.jpg' style='float:left; margin-left:12px;'> </a>

	   <a href='chitiet.php?thamso=giohang_xuly_session&id=$id'><img src='images/mua-hang.jpg' >



	   </div>

        </div>";



			echo "</td>";

			$stt = $stt + 1;

			if ($stt % 3 == 0) {
				echo "</tr>";
			}
		}

		echo " </table>";
	}

	/*$pagelist=$p->pagelist($_GET['page'], $pages);

	 echo "<div align='right' class='phantrang' > Trang: ";

	 echo $pagelist;

	 echo"</div>";*/



	?>













</div>