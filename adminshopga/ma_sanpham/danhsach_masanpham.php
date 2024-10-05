<style>
	form,
	table {
		width: 1050px;
		margin: 0 auto;
		padding: 10px;
	}

	.responsive-table {
		overflow-x: auto;
	}

	table {
		border-collapse: collapse;
		width: 1050px;
	}

	th,
	td {
		padding: 8px;
		text-align: left;
	}

	th {
		background-color: #f2f2f2;
	}

	.checkbox-container {
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
	}

	@media (max-width: 768px) {
		.checkbox-container {
			flex-direction: column;
		}

		td,
		th {
			font-size: 12px;
		}

		table,
		form {
			width: 1050px;
			font-size: 14px;
		}

		table tr {
			display: block;
		}

		table tr td,
		table tr th {
			display: block;
			width: 1050px;
			text-align: right;
		}

		table tr td:before {
			float: left;
			font-weight: bold;
		}
	}
</style>
<div class="responsive-table">
	<?php
	require('db.php');

	// Get total count of products
	$count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM ma_sanpham"));
	$all = $count;

	// Function to redirect
	function redirect($page)
	{
		echo "<script>window.location = 'quan_tri.php?p=danhsach_masanpham&page={$page}'</script>";
		exit();
	}

	// Deleting multiple products
	if (!empty($_REQUEST['list_id'])) {
		$list_id = rtrim($_REQUEST['list_id'], ',');
		$del_pic_id = explode(',', $list_id);

		// Prepare statement for deletion
		$stmt = mysqli_prepare($link, 'DELETE FROM ma_sanpham WHERE id = ?');
		foreach ($del_pic_id as $id) {
			mysqli_stmt_bind_param($stmt, 'i', $id);
			mysqli_stmt_execute($stmt);
		}
		mysqli_stmt_close($stmt);

		redirect('');
	}

	// Toggle product status functions
	function toggleStatus($link, $column, $status, $id, $page)
	{
		$newStatus = $status ? 0 : 1;
		$stmt = mysqli_prepare($link, "UPDATE ma_sanpham SET {$column} = ? WHERE id = ?");
		mysqli_stmt_bind_param($stmt, 'ii', $newStatus, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		redirect($page);
	}

	// Toggle 'noibat' (featured) status
	if (isset($_REQUEST['noibat']) && isset($_GET['id'])) {
		toggleStatus($link, 'noibat', $_GET['noibat'], $_GET['id'], $_GET['page']);
	}

	// Toggle 'khuyenmai' (promotion) status
	if (isset($_REQUEST['khuyenmai']) && isset($_GET['id'])) {
		toggleStatus($link, 'khuyenmai', $_GET['khuyenmai'], $_GET['id'], $_GET['page']);
	}
	if (isset($_REQUEST['featured']) && isset($_GET['id'])) {
		toggleStatus($link, 'featured', $_GET['featured'], $_GET['id'], $_GET['page']);
	}
	// Toggle 'banchay' (best seller) status
	if (isset($_REQUEST['banchay']) && isset($_GET['id'])) {
		toggleStatus($link, 'banchay', $_GET['banchay'], $_GET['id'], $_GET['page']);
	}

	// Toggle 'top' (best seller) status
	if (isset($_REQUEST['top']) && isset($_GET['id'])) {
		toggleStatus($link, 'top', $_GET['top'], $_GET['id'], $_GET['page']);
	}

	// Toggle 'exclusive' (best seller) status
	if (isset($_REQUEST['exclusive']) && isset($_GET['id'])) {
		toggleStatus($link, 'exclusive', $_GET['exclusive'], $_GET['id'], $_GET['page']);
	}
	if (isset($_REQUEST['dealofday']) && isset($_GET['id'])) {
		toggleStatus($link, 'dealofday', $_GET['dealofday'], $_GET['id'], $_GET['page']);
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
			window.location = "quan_tri.php?p=danhsach_masanpham&list_id=" + list_id;
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
				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_masanpham&page=1\" title=\"Trang đầu\" style='margin:4px;'> << </a>";
			}
			if ($curpage - 1 > 0) {
				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_masanpham&page=" . ($curpage - 1) . "\" title=\"Về trang trước\" style='margin:4px;'><font color='#00ccff'> < </font></a>";
			}
			for ($i = 1; $i <= $pages; $i++) {
				if ($i == $curpage) {
					$page_list .= "<b>" . $i . "</b>";
				} else {
					$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_masanpham&page=" . $i . "\" title=\"Trang " . $i . "\" style='margin:4px;'><font color='red'>[" . $i . "]</font></a>";
				}
				$page_list .= "";
			}
			if (($curpage + 1) <= $pages) {

				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_masanpham&page=" . ($curpage + 1) . "\" title=\"Đến trang sau\" style='margin:4px;' ><font color='#00ccff'> > </font></a>";
			}

			if (($curpage != $pages) && ($pages != 0)) {
				$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_masanpham&page=" . $pages . "\" title=\"Trang cuối\" > >> </a>";
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
				$next_prev = "<a href=\"?p=danhsach_masanpham&page=" . ($curpage - 1) . "\">Back</a>";
			}
			$next_prev .= "|";
			if (($curpage + 1) > $page) {
				$next_prev .= "Next";
			} else {
				$next_prev = "<a href=\"?p=danhsach_masanpham&page=" . ($curpage + 1) . "\">Next</a>";
			}
			return $next_prev;
		}
	}
	?>


	<?php
	require('db.php');
	$loai = '';
	if (!empty($_REQUEST['adcat']) != '') {
		$loai = " where thuocloai=" . $_POST['adcat'] . " ";
	}
	$p = new pager;
	$limit = 20;
	$start = $p->findStart($limit);
	$count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM ma_sanpham"));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($link, "SELECT * FROM ma_sanpham $loai ORDER BY id DESC limit $start,$limit");
	// $result=mysql_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");

	if (mysqli_num_rows($result) <> 0) {

	?>
		<form action="quan_tri.php?p=danhsach_masanpham" method="post">
			<table border="0" style="width:25px;height:20px;margin-left:500px;">
				<tr>
					<td width="200">
						<select name="adcat">
							<option value="">Tất cả</option>

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
							<?php
							$sql = mysqli_query($link, "select * from loai_ma_sanpham");
							while ($loai = mysqli_fetch_array($sql)) {
							?>
								<option value="<?php echo $loai['id']; ?>"><?php echo $loai['thuocloai']; ?></option>
							<?php
							}
							?>
						</select>
					</td>
					<td width="50">
						<input type="submit" name="but" value="Chuyển"
							style="padding:2px;background:#00F;color:#FFF;border-radius:2px;" />
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
						onclick="if(!confirm('Bạn có chắc là muốn xóa các sản phẩm này không...???'))return false; else delete_all_chosen()">Xóa
						đã chọn</a>
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
		echo "<td >id</td>";
		echo "<td >Loại Sản Phẩm</td>";
		echo "<td >Tiêu đề</td>";
		echo "<td >Hình chính</td>";
		echo "<td >Nổi bật</td>";
		echo "<td >Bán Chạy</td>";
		echo "<td >Khuyến Mãi</td>";
		echo "<td >featured</td>";
		echo "<td >Top</td>";
		echo "<td >Exclusive</td>";
		echo "<td >Deal Of Day</td>";
		echo "<td >Từ Khoá 1</td>";
		echo "<td >Từ Khoá 1</td>";
		echo "<td >Giá Gốc</td>";
		echo "<td >Giá Bán</td>";
		echo "<td >Ngày</td>";
		echo "<td >xóa</td>";
		echo "<td >Sửa</td>";
		echo "</tr>";
		require('db.php');
		$stt = 1;
		$i = 0;
		$p = new pager;
		$limit = 20;
		$start = $p->findStart($limit);
		$result = mysqli_query($link, "SELECT * FROM ma_sanpham $loai ORDER BY id DESC limit $start,$limit");
		while ($row = mysqli_fetch_object($result)) {
			$i++;
			$id = $row->id;
			$did = $row->thuocloai;
			$sql3 = mysqli_query($link, "select * from loai_ma_sanpham where id='" . $did . "'");
			$loai = mysqli_fetch_array($sql3);
			$loai1 = $loai['thuocloai'];
			$tieude = $row->tieude;
			$tukhoa1 = $row->tukhoa1;
			$tukhoa2 = $row->tukhoa2;
			$noibat = $row->noibat;
			$banchay = $row->banchay;
			$top = $row->top;
			$exclusive = $row->exclusive;
			$khuyenmai = $row->khuyenmai;
			$featured = $row->featured;
			$dealofday = $row->dealofday;
			$hinhanh = "../HinhCTSP/HinhSanPham/" . $row->hinhanh;
			$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";
			$giagoc = $row->giagoc;
			$giaban = $row->giaban;
			$ngay = $row->ngay;
			if ($stt % 2 == 0) {
				echo "<tr bgcolor='#00ccff'>";
			} else {
				echo "<tr>";
			}
			echo "<td>$stt</td>";
		?>
			<td><input type="checkbox" class="a-checkbox a-checkbox_<?php echo $i; ?>" value="<?php echo $id; ?>" /></td>
			<?php
			echo  "<td>$id</td>";
			echo  "<td>$loai1</td>";
			echo  "<td>$tieude</td>";
			echo  "<td>$hinhanh</td>";
			?>
			<td>
				<?php
				if ($noibat == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&noibat=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&noibat=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			<td>
				<?php
				if ($banchay == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&banchay=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&banchay=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<td>
				<?php
				if ($khuyenmai == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&khuyenmai=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&khuyenmai=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<td>
				<?php
				if ($featured == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&featured=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&featured=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<td>
				<?php
				if ($top == 0) {
				?>
					<a href="quan_tri.php?p=danhsach_masanpham&top=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&top=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<td>
				<?php
				if ($exclusive == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&exclusive=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&exclusive=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<td>
				<?php
				if ($dealofday == 0) {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&dealofday=0&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">No</a>
				<?php
				} else {
				?>
					<a
						href="quan_tri.php?p=danhsach_masanpham&dealofday=1&id=<?php echo $id; ?>&page=<?php echo $_GET['page']; ?>">Active</a>
				<?php
				}
				?>
			</td>
			<?php
			echo  "<td>$tukhoa1</td>";
			echo  "<td>$tukhoa2</td>";
			echo  "<td>$giagoc</td>";
			echo  "<td>$giaban</td>";
			echo  "<td>$ngay</td>";
			?>
		<?php
			echo  "<td align='center'><a href=\"quan_tri.php?p=xoa_masanpham&id=" . $id . "\" ­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";
			echo  "<td align='center'><a href='quan_tri.php?p=sua_masanpham&id=" . $id . "&thuocloai=1&page=" . $_GET['page'] . "'><img src='images/sua_record.png' border='0'></a></td>";
			echo " </tr>";
			$stt = $stt + 1;
		}
		echo " </table>";
		?>
	<?php
		$pagelist = $p->pageList($_GET['page'], $pages);
		echo "<p align='center'>Trang :";
		echo $pagelist;
		echo "</p>";
	}
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
</div>