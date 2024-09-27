<?php

require('db.php');

$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM danhmuc"));

$all = $count;



if (isset($_REQUEST['list_id']) && $_REQUEST['list_id'] != '') {

	$list_id = $_REQUEST['list_id'];

	$list_id = substr($list_id, 0, strlen($list_id) - 1);

	$del_pic_id = explode(',', $list_id);

	for ($i = 0; $i < count($del_pic_id); $i++) {

		$sql = "SELECT * FROM danhmuc WHERE id = '" . $del_pic_id[$i] . "'";

		mysqli_query($sql);

		//$pic = $d->result_array();



	}

	mysqli_query($link, 'DELETE FROM danhmuc WHERE danhmuc_sanpham.id IN(' . $list_id . ')');

?>

	<script>
		window.location = "quan_tri.php?p=danhmuc_sanpham"
	</script>

<?php

}



if (isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != '') {

	$noibat = $_GET['noibat'];

	$id = $_GET['id'];

	if ($noibat == 0) {

		mysqli_query($link, "update danhmuc set noibat=1 where id=" . $id . "");
	}

	if ($noibat == 1) {

		mysqli_query($link, "update danhmuc set noibat=0 where id=" . $id . "");
	}

?>

	<script>
		window.location = "quan_tri.php?p=danhmuc_sanpham"
	</script>

<?php

}



?>

<!--<script type="text/JavaScript" src="../js/jquery.min.js"></script> -->

<script language="javascript">
	function delete_all_chosen() {



		var list_id = '';

		for (var i = 1; i <= <?php echo $all; ?>; i++) {

			var a_checkbox = $('.a-checkbox_' + i);

			if (a_checkbox.attr('checked') == 'checked') {

				list_id += a_checkbox.val() + ',';

			}

		}

		window.location = "quan_tri.php?p=danhmuc_sanpham&list_id=" + list_id;

		return true;

	}
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

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhmuc_sanpham&page=1\" title=\"Trang đầu\" style='margin:4px;'> << </a>";
		}

		if ($curpage - 1 > 0) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhmuc_sanpham&page=" . ($curpage - 1) . "\" title=\"Về trang trước\" style='margin:4px;'><font color='#00ccff'> < </font></a>";
		}

		for ($i = 1; $i <= $pages; $i++) {

			if ($i == $curpage) {

				$page_list .= "<b>" . $i . "</b>";
			} else {

				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhmuc_sanpham&page=" . $i . "\" title=\"Trang " . $i . "\" style='margin:4px;'><font color='red'>[" . $i . "]</font></a>";
			}

			$page_list .= "";
		}

		if (($curpage + 1) <= $pages) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhmuc_sanpham&page=" . ($curpage + 1) . "\" title=\"Đến trang sau\" style='margin:4px;' ><font color='#00ccff'> > </font></a>";
		}

		if (($curpage != $pages) && ($pages != 0)) {

			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhmuc_sanpham&page=" . $pages . "\" title=\"Trang cuối\" > >> </a>";
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



			$next_prev = "<a href=\"?p=danhmuc_sanpham&page=" . ($curpage - 1) . "\">Back</a>";
		}

		$next_prev .= "|";

		if (($curpage + 1) > $page) {

			$next_prev .= "Next";
		} else {

			$next_prev = "<a href=\"?p=danhmuc_sanpham&page=" . ($curpage + 1) . "\">Next</a>";
		}

		return $next_prev;
	}
}

?>

<?php

// kết nối CSDL

//include_once("phan_trang.php");

require('db.php');

//$ketnoi_maychu = ketnoi_MC();

//chon_CSDL($ketnoi_maychu);

if ($_REQUEST['adcat'] != '') {

	$loai = " where thuocloai=" . $_POST['adcat'] . " ";
}

$p = new pager;

$limit = 40;

$start = $p->findStart($limit);

$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM ma_sanpham"));

$pages = $p->findPages($count, $limit);



$result = mysqli_query($link, "SELECT * FROM danhmuc $loai ORDER BY id DESC limit $start,$limit");



// $result=mysql_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");

if (mysqli_num_rows($result) <> 0) {



	echo "<h2 align='center'>Danh Sách Dịch vụ </h2>";

?>

	<form action="quan_tri.php?p=danhmuc_sanpham" method="post">

		<table border="0" style="width:25px;height:20px;margin-left:500px;">

			<tr>

				<td width="200">

					<select name="adcat">

						<option value="">Tất cả</option>

						<?php

						$sql = mysqli_query($link, "select * from loai_ma_sanpham");

						while ($loai = mysqli_fetch_array($sql)) {

						?>



							<option value="<?= $loai['id'] ?>"><?= $loai['thuocloai'] ?></option>



						<?php

						}

						?>

					</select>

				</td>

				<td width="50">

					<input type="submit" name="but" value="Chuyển" style="padding:2px;background:#00F;color:#FFF;border-radius:2px;" />

				</td>

			</tr>

		</table>

	</form>

	<table border="0" style="width:25px;height:20px;margin-left:248px;">

		<tr style="border:none">

			<td></td>

			<td>

				<input type="checkbox" class="top-checked-all" />



			</td>

			<td>

				<a href="#" style="float:left;margin-right:10px; width: 100px;"

					onclick="if(!confirm('Bạn có chắc là muốn xóa các sản phẩm này không...???'))return false; else delete_all_chosen()">Xóa đã chọn</a>



			</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		</tr>

	</table>



	<?php



	echo	" <table border='1' align='center' >";

	echo "<tr bgcolor='orange'>";

	echo "<td >STT</td>";

	echo "<td >#</td>";

	echo "<td >Tiêu đề</td>";

	echo "<td >id</td>";

	echo "<td >Loại</td>";
	echo "<td >Nổi bật</td>";

	echo "<td >Xóa</td>";

	echo "<td >Sữa</td>";



	echo "</tr>";

	$stt = 1;

	$i = 0;

	while ($row = mysqli_fetch_object($result)) {

		$i++;

		$id = $row->id;

		$did = $row->thuocloai;

		$sql3 = mysqli_query($link, "select * from loai_ma_sanpham where id='" . $did . "'");

		$loai = mysqli_fetch_array($sql3);

		$loai1 = $loai['thuocloai'];

		$tieude = $row->tieude;

		$id = $row->id;
		$sale = $row->sale;
		$sao = $row->star;

		//$trangthai_han=$row->trangthai_han;

		$sort = $row->sort;

		$noibat = $row->noibat;

		$hinhanh = "../HinhCTSP/" . $row->hinhanh;

		$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";

		//$logo="../Hinh CTSP/".$row->logo;

		// $logo="<img src='$logo' width='40' height='20' '>";

		//  $hinhab="../Hinh CTSP/".$row->hinhab;

		// $hinhab="<img src='$hinhab' width='40' height='20' '>";

		//  $hinhabc="../Hinh CTSP/".$row->hinhabc;

		// $hinhabc="<img src='$hinhabc' width='40' height='20' '>";

		//   $hinhabcd="../Hinh CTSP/".$row->hinhabcd;

		// $hinhabcd="<img src='$hinhabcd' width='40' height='20' '>";

		// $hinhqcab="../Hinh CTSP/".$row->hinhqcab;

		// $hinhqcab="<img src='$hinhqcab' width='40' height='20' '>";

		$hinhqcabc = "../HinhCTSP/" . $row->hinhqcabc;

		$hinhqcabc = "<img src='$hinhqcabc' width='40' height='20' '>";

		$hinhndab = "../HinhCTSP/" . $row->hinhndab;

		$hinhndab = "<img src='$hinhndab' width='40' height='20' '>";

		$mota_han = $row->mota_han;

		$masanpham = $row->masanpham;

		//$hinhndabc="../Hinh CTSP/".$row->hinhndabc;

		//$hinhndabc="<img src='$hinhndabc' width='40' height='20' '>";

		//$hinhndabcd="../Hinh CTSP/".$row->hinhndabcd;

		//$hinhndabcd="<img src='$hinhndabcd' width='40' height='20' '>";

		$trangthai_china = $row->trangthai_china;

		if ($stt % 2 == 0)

			echo "<tr bgcolor='#00ccff'>";

		else

			echo "<tr>";

		echo "<td>$stt</td>";

		/* echo "<td>$id</td>";*/

	?>

		<td><input type="checkbox" class="a-checkbox a-checkbox_<?= $i ?>" value="<?= $id ?>" /></td>

		<?



		/* echo "<td>$id</td>";*/

		echo  "<td>$tieude</td>";

		echo  "<td>$id</td>";

		//echo  "<td>$trangthai_han</td>";




		echo  "<td>$loai1</td>";

		?>
		<td>

			<?php

			if ($noibat == 0) {

			?>

				<a href="quan_tri.php?p=danhmuc_sanpham&noibat=0&id=<?= $id ?>">No</a>

			<?php

			} else {

			?>

				<a href="quan_tri.php?p=danhmuc_sanpham&noibat=1&id=<?= $id ?>">Active</a>

			<?php

			}

			?>

		</td>

<?php


		echo  "<td align='center'><a href=\"quan_tri.php?p=xoa_danhmuc&id=" . $id . "\" ­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";

		echo  "<td align='center'><a href='quan_tri.php?p=sua_danhmuc&id=" . $id . "'><img src='images/sua_record.png' border='0'></a></td>";

		echo " </tr>";

		$stt = $stt + 1;
	}

	echo " </table>";
}

$pagelist = $p->pageList($_GET['page'], $pages);

echo "<p align='center'>Trang :";

echo $pagelist;

echo "</p>";

?>

<script>
	$('.top-checked-all').click(function(e) {

		if ($(this).attr('checked') == 'checked') {

			$('.a-checkbox').attr('checked', 'checked');

			$('.bottom-checked-all').attr('checked', 'checked');

		} else {

			$('.a-checkbox').attr('checked', false);

			$('.bottom-checked-all').attr('checked', false);

		}



	});
</script>