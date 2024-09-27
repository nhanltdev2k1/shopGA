<?php

	$result=mysql_query("SELECT * FROM loaiphong WHERE id = '$_GET[id]' ");

   $row_dulieu_sua		=	mysql_fetch_array($result);

    $hinhanh	=	$row_dulieu_sua['hinhanh'];

	$taptin="../HinhCTSP/$hinhanh";

	unlink($taptin);

	

    $logo	=	$row_dulieu_sua['logo'];

	$taptinlogo="../Hinh CTSP/$logo";

	unlink($taptinlogo);

    

	$hinhab	=	$row_dulieu_sua['hinhab'];

	$taptinhinhab="../Hinh CTSP/$hinhab";

	unlink($taptinhinhab);

    

    	$hinhabc	=	$row_dulieu_sua['hinhabc'];

	$taptinhinhabc="../Hinh CTSP/$hinhabc";

	unlink($taptinhinhabc);

    

    	$hinhabcd	=	$row_dulieu_sua['hinhabcd'];

	$taptinhinhabcd="../Hinh CTSP/$hinhabcd";

	unlink($taptinhinhabcd);

    

    $hinhqcab	=	$row_dulieu_sua['hinhqcab'];

	$taptinhinhqcab="../Hinh CTSP/$hinhqcab";

	unlink($taptinhinhqcab);

    

    $hinhqcabc	=	$row_dulieu_sua['hinhqcabc'];

	$taptinhinhqcabc="../Hinh CTSP/$hinhqcabc";

	unlink($taptinhinhqcabc);

    

    $hinhndab	=	$row_dulieu_sua['hinhndab'];

	$taptinhinhndab="../Hinh CTSP/$hinhndab";

	unlink($taptinhinhndab);

    

    $hinhndabc	=	$row_dulieu_sua['hinhndabc'];

	$taptinhinhndabc="../Hinh CTSP/$hinhndabc";

	unlink($taptinhinhndabc);

    

    $hinhndabcd	=	$row_dulieu_sua['hinhndabcd'];

	$taptinhinhndabcd="../Hinh CTSP/$hinhndabcd";

	unlink($taptinhinhndabcd);

	

	$chuoi="DELETE FROM loaiphong WHERE id = '$_GET[id]' ";

	mysql_query($chuoi);

		 echo "<form name='frm_dangnhap'>

			        <input type'hidden' name='chuyentrang' value='quan_tri.php?p=danhsach_loai_phong'>

					</form>";

?>

<script type="text/javascript">

if(document.frm_dangnhap)

 {

   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;

   window.location = trangcanchuyen;

 }

</script>