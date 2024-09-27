<?php
require('db.php');

// Count total rows in tin_tintuc
$count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tin_tintuc"));
$all = $count;

if (isset($_REQUEST['list_id']) && $_REQUEST['list_id'] != '') {
	$list_id = $_REQUEST['list_id'];
	$list_id = substr($list_id, 0, strlen($list_id) - 1);
	$del_pic_id = explode(',', $list_id);
	for ($i = 0; $i < count($del_pic_id); $i++) {
		$sql = "SELECT * FROM tin_tintuc WHERE id = '" . mysqli_real_escape_string($link, $del_pic_id[$i]) . "'";
		$result = mysqli_query($link, $sql);
	}
	$delete_query = 'DELETE FROM tin_tintuc WHERE id IN(' . mysqli_real_escape_string($link, $list_id) . ')';
	mysqli_query($link, $delete_query);
?>
	<script>
		window.location = "quan_tri.php?p=ds_tin_tintuc";
	</script>
<?php
}

if (isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != '') {
	$noibat = $_GET['noibat'];
	$id = $_GET['id'];
	if ($noibat == 0) {
		mysqli_query($link, "update tin_tintuc set noibat=1 where id=" . $id . "");
	}
	if ($noibat == 1) {
		mysqli_query($link, "update tin_tintuc set noibat=0 where id=" . $id . "");
	}
?>
	<script>
		window.location = "quan_tri.php?p=ds_tin_tintuc"
	</script>

<?php
}

if (isset($_REQUEST['moi']) && $_REQUEST['moi'] != '') {

	$noibat = $_GET['moi'];

	$id = $_GET['id'];
	if ($noibat == 0) {
		mysqli_query($link, "update tin_tintuc set moi=1 where id=" . $id . "");
	}
	if ($noibat == 1) {
		mysqli_query($link, "update tin_tintuc set moi=0 where id=" . $id . "");
	}
?>
	<script>
		window.location = "quan_tri.php?p=ds_tin_tintuc"
	</script>
<?php
}
if (isset($_REQUEST['km']) && $_REQUEST['km'] != '') {
	$noibat = $_GET['km'];
	$id = $_GET['id'];
	if ($noibat == 0) {
		mysqli_query($link, "update tin_tintuc set km=1 where id=" . $id . "");
	}
	if ($noibat == 1) {
		mysqli_query($link, "update tin_tintuc set km=0 where id=" . $id . "");
	}
?>
	<script>
		window.location = "quan_tri.php?p=ds_tin_tintuc"
	</script>
<?php
}

if (isset($_REQUEST['chay']) && $_REQUEST['chay'] != '') {
	$noibat = $_GET['chay'];
	$id = $_GET['id'];
	if ($noibat == 0) {
		mysqli_query($link, "update tin_tintuc set chay=1 where id=" . $id . "");
	}
	if ($noibat == 1) {
		mysqli_query($link, "update tin_tintuc set chay=0 where id=" . $id . "");
	}
?>
	<script>
		window.location = "quan_tri.php?p=ds_tin_tintuc"
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
		window.location = "quan_tri.php?p=ds_tin_tintuc&list_id=" + list_id;
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
			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_tintuc&page=1\" title=\"Trang đầu\" style='margin:4px;'> << </a>";
		}
		if ($curpage - 1 > 0) {
			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_tintuc&page=" . ($curpage - 1) . "\" title=\"Về trang trước\" style='margin:4px;'><font color='#00ccff'> < </font></a>";
		}
		for ($i = 1; $i <= $pages; $i++) {
			if ($i == $curpage) {
				$page_list .= "<b>" . $i . "</b>";
			} else {
				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_tintuc&page=" . $i . "\" title=\"Trang " . $i . "\" style='margin:4px;'><font color='red'>[" . $i . "]</font></a>";
			}
			$page_list .= "";
		}
		if (($curpage + 1) <= $pages) {
			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_tintuc&page=" . ($curpage + 1) . "\" title=\"Đến trang sau\" style='margin:4px;' ><font color='#00ccff'> > </font></a>";
		}
		if (($curpage != $pages) && ($pages != 0)) {
			$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_tintuc&page=" . $pages . "\" title=\"Trang cuối\" > >> </a>";
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

			$next_prev = "<a href=\"?p=ds_tin_tintuc&page=" . ($curpage - 1) . "\">Back</a>";
		}
		$next_prev .= "|";
		if (($curpage + 1) > $page) {
			$next_prev .= "Next";
		} else {
			$next_prev = "<a href=\"?p=ds_tin_tintuc&page=" . ($curpage + 1) . "\">Next</a>";
		}
		return $next_prev;
	}
}
?>

<?php
// kết nối CSDL
require('db.php');
//$ketnoi_maychu = ketnoi_MC();
//chon_CSDL($ketnoi_maychu);
$p = new pager;
$limit = 20;
$start = $p->findStart($limit);
$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM tin_tintuc"));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($link, "SELECT * FROM tin_tintuc ORDER BY id DESC limit $start,$limit");
// $result=mysql_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");
if (mysqli_num_rows($result) <> 0) {
	echo "<h2 align='div'>Thông Tin Người Dùng </h2>";
	echo	" <table border='1' align='center' width='770px'>";
	echo "<tr bgcolor='orange'>";
	echo "<td >STT</td>";
	echo "<td >Id</td>";
	echo "<td >Loại</td>";
	echo "<td >Tin News </td>";
	//	echo "<td >Nổi bật</td>";
	// echo "<td >Miền Nam</td>";

	echo "<td >Tiêu đề</td>";

	echo "<td >Từ khoá H1</td>";
	echo "<td >Từ khoá H2</td>";
	echo "<td >Ngày</td>";

	echo "<td >Hình ảnh</td>";
	// echo "<td >Hình NDung1</td>";
	//echo "<td >Hình NDung 2</td>";
	// echo "<td >Hình NDung 1</td>";
	echo "<td >Xóa</td>";
	echo "<td >Sữa</td>";

	echo "</tr>";
	$stt = 1;
	while ($row = mysqli_fetch_object($result)) {

		$thuocloai = $row->thuocloai;
		$id = $row->id;
		//$noibat=$row->noibat;
		$moi = $row->moi;
		//	$km = $row->km;
		// $chay=$row->chay;
		$tieude_en = $row->tieude_en;
		$did = $row->thuocloai;
		$sql3 = mysqli_query($link, "select * from loai_tin_tintuc where id='" . $did . "'");
		$loai = mysqli_fetch_array($sql3);
		$loai1 = $loai['thuocloai'];
		// $mota=$row->mota;
		$tieude = $row->tieude;
		$tukhoa = $row->tukhoa;
		$tukhoa2 = $row->tukhoa2;

		$ngay = $row->ngay;
		$hinhanh = "../HinhCTSP/HinhTinTuc/" . $row->hinhanh;
		$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";
		// $hinhndab="../HinhCTSP/".$row->hinhndab;
		// $hinhndab="<img src='$hinhndab' width='40' height='20' '>";


		if ($stt % 2 == 0)
			echo "<tr bgcolor='#00ccff'>";
		else
			echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>$id</td>";
		echo "<td>$loai1</td>";
?>
		<td>
			<?php
			if ($moi == 0) {
			?>
				<a href="quan_tri.php?p=ds_tin_tintuc&moi=0&id=<?php echo $id; ?>">No</a>
			<?php
			} else {
			?>
				<a href="quan_tri.php?p=ds_tin_tintuc&moi=1&id=<?php echo $id; ?>">Active</a>
			<?php
			}
			?>
		</td>

		<!--  <td>
	<?php
		if ($chay == 0) {
	?>
		<a href="quan_tri.php?p=ds_tin_tintuc&chay=0&id=<?php echo $id; ?>">No</a>
		<?php
		} else {
		?>
		<a href="quan_tri.php?p=ds_tin_tintuc&chay=1&id=<?php echo $id; ?>">Active</a>
		<?php
		}
		?>
		</td>	-->
<?php

		echo  "<td>$tieude_en</td>";
		echo  "<td>$tukhoa</td>";
		echo  "<td>$tukhoa2</td>";
		echo  "<td>$ngay</td>";
		echo  "<td align='div'>$hinhanh</td>";
		// echo  "<td>$hinhndab</td>";
		echo  "<td align='center'><a href=\"quan_tri.php?p=xoa_tin_tintuc&id=" . $id . "\" ­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";
		echo  "<td align='center'><a href='quan_tri.php?p=sua_tin_tintuc&id=" . $id . "'><img src='images/sua_record.png' border='0'></a></td>";
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