<?php

	//$result=mysql_query("SELECT * FROM mota_khachsan WHERE id = '$_GET[id]' ");

   //$row_dulieu_sua		=	mysql_fetch_array($result);
	mysql_query("delete  FROM danhmuc WHERE id = '$_GET[id]' ");
	

		 echo "<form name='frm_dangnhap'>

			        <input type'hidden' name='chuyentrang' value='quan_tri.php?p=danhmuc_sanpham'>

					</form>";

?>

<script type="text/javascript">

if(document.frm_dangnhap)

 {

   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;

   window.location = trangcanchuyen;

 }

</script>