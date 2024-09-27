<?php
	
	$chuoi="DELETE FROM loai_ma_sanpham WHERE id = '$_GET[id]' ";
	mysqli_query($link,$chuoi);
		 echo "<form name='frm_dangnhap'>
			        <input type'hidden' name='chuyentrang' value='quan_tri.php?p=danhsach_loai_masanpham'>
					</form>";
?>
<script type="text/javascript">
if(document.frm_dangnhap)
 {
   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;
   window.location = trangcanchuyen;
 }
</script>