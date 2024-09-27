<style>
	a {
		color: #0000FF;
		text-decoration: none;
	}

	.cochu {
		font-size: 12px;
	}

	.chu_TTSV {
		font-size: 12px;
	}
</style>


<script type="text/javascript">
	function chuyendentrang(trang) {

		document.frm_chuyentrang.tranghientai.value = trang;

		document.frm_chuyentrang.submit();

	}
</script>



<script type="text/javascript">
	function chuyen_avc(value) {

		//alert("chao");

		var link = "?p=11&macdinh=" + value;

		window.location = link;

	}
</script>

</head>

<body>

	<?php class pager
	{
		function findStart($limit)
		{
			if (!isset($_GET["page"]) || $_GET["page"] == "1") {
				$start = 0;

				$_GET["page"] = 1;
			} else {
				$start = ($_GET["page"] - 1) * $limit;
			}

			return $start;
		}

		function findPages($count, $limit)
		{
			$page =
				$count % $limit == 0
				? $count / $limit
				: floor($count / $limit) + 1;

			return $page;
		}

		function pageList($curpage, $pages)
		{
			$page_list = "";

			if ($curpage != 1 && $curpage) {
				$page_list .=
					"<a href=\"" .
					$_SERVER["PHP_SELF"] .
					"?p=danhsach_thuongmai&page=1\" title=\"Trang đầu\"> << </a>";
			}

			if ($curpage - 1 > 0) {
				$page_list .=
					"<a href=\"" .
					$_SERVER["PHP_SELF"] .
					"?p=danhsach_thuongmai&page=" .
					($curpage - 1) .
					"\" title=\"Về trang trước\"><font color='#00ccff'> < </font></a>";
			}

			for ($i = 1; $i <= $pages; $i++) {
				if ($i == $curpage) {
					$page_list .= "<b>" . $i . "</b>";
				} else {
					$page_list .=
						"<a href=\"" .
						$_SERVER["PHP_SELF"] .
						"?p=danhsach_thuongmai&page=" .
						$i .
						"\" title=\"Trang " .
						$i .
						"\"><font color='#E6E600'>[" .
						$i .
						"]</font></a>";
				}

				$page_list .= "";
			}

			if ($curpage + 1 <= $pages) {
				$page_list .=
					"<a href=\"" .
					$_SERVER["PHP_SELF"] .
					"?p=danhsach_thuongmai&page=" .
					($curpage + 1) .
					"\" title=\"Đến trang sau\"><font color='#00ccff'> > </font></a>";
			}

			if ($curpage != $pages && $pages != 0) {
				$page_list .=
					"<a href=\"" .
					$_SERVER["PHP_SELF"] .
					"?p=danhsach_thuongmai&page=" .
					$pages .
					"\" title=\"Trang cuối\"> >> </a>";
			}

			$page_list .= "</td>\n";

			return $page_list;
		}
	} ?>





	<?php
	// kết nối CSDL

	require "db.php";

	//$ketnoi_maychu = ketnoi_MC();

	//chon_CSDL($ketnoi_maychu);

	$p = new pager();

	$limit = 20;

	$start = $p->findStart($limit);

	$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM thuong_mai"));

	$pages = $p->findPages($count, $limit);

	$result = mysqli_query(
		$link,
		"SELECT * FROM thuong_mai  ORDER BY id DESC limit $start,$limit",
	);

	// $result=mysqli_query($link,"SELECT * FROM danh_muc_sp ORDER BY masp DESC");

	if (mysqli_num_rows($result) != 0) {
		echo "<h2 align='div'>Thông Tin Người Dùng </h2>";

		echo " <table border='1' align='center' width='770px'>";

		echo "<tr bgcolor='orange'>";

		echo "<td >STT</td>";

		echo "<td >Tiêu đề</td>";

		echo "<td >Hình ảnh</td>";

		echo "<td >Xóa</td>";

		echo "<td >Sữa</td>";

		echo "</tr>";

		$stt = 1;

		while ($row = mysqli_fetch_object($result)) {
			$id = $row->id;

			//$thuocloai = $row->thuocloai;

			$tieude = $row->tieude;

			//$tieude_en = $row->tieude_en;

			$hinhanh = "../HinhCTSP/" . $row->hinhanh;

			$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";

			if ($stt % 2 == 0) {
				echo "<tr bgcolor='#00ccff'>";
			} else {
				echo "<tr>";
			}

			echo "<td>$stt</td>";

			/* echo "<td>$id</td>";*/

			echo "<td>$tieude</td>";

			echo "<td align='div'>$hinhanh</td>";

			echo "<td align='div'><a href='quan_tri.php?p=xoa_thuongmai&id=" .
				$id .
				"'­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";

			echo "<td align='div'><a href='quan_tri.php?p=sua_thuongmai&id=" .$id ."&thuocloai='><img src='images/sua_record.png' border='0'></a></td>";

			echo " </tr>";

			$stt = $stt + 1;
		}

		echo " </table>";
	}


	?>