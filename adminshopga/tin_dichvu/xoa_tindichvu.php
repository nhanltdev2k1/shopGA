<?php
   
    include("db.php");
	$result=mysqli_query($link,"SELECT * FROM tin_dichvu WHERE id = '$_GET[id]' ");

   $row_dulieu_sua		=	mysqli_fetch_array($result);

    $hinhanh	=	$row_dulieu_sua['hinhanh'];

	$taptin="../HinhCTSP/Hinhdichvu/$hinhanh";

	unlink($taptin);

	 $hinhqcab	=	$row_dulieu_sua['hinhqcab'];

	$taptinhinhqcab="../HinhCTSP/Hinhdichvu/$hinhqcab";

	unlink($taptinhinhqcab);

    

    $hinhqcabc	=	$row_dulieu_sua['hinhqcabc'];

	$taptinhinhqcabc="../HinhCTSP/Hinhdichvu/$hinhqcabc";

	unlink($taptinhinhqcabc);

    

    $hinhndab	=	$row_dulieu_sua['hinhndab'];

	$taptinhinhndab="../HinhCTSP/Hinhdichvu/$hinhndab";

	unlink($taptinhinhndab);

    

    $hinhndabc	=	$row_dulieu_sua['hinhndabc'];

	$taptinhinhndabc="../HinhCTSP/Hinhdichvu/$hinhndabc";

	unlink($taptinhinhndabc);

    

    $hinhndabcd	=	$row_dulieu_sua['hinhndabcd'];

	$taptinhinhndabcd="../HinhCTSP/Hinhdichvu/$hinhndabcd";

	unlink($taptinhinhndabcd);

	

	$chuoi="DELETE FROM tin_dichvu WHERE id = '$_GET[id]' ";

	mysqli_query($link,$chuoi);

		 echo "<form name='frm_dangnhap'>

			        <input type'hidden' name='chuyentrang' value='quan_tri.php?p=ds_tin_dichvu'>

					</form>";

?>

<script type="text/javascript">

if(document.frm_dangnhap)

 {

   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;

   window.location = trangcanchuyen;

 }

</script>