<?php
    include("db.php");
	$result=mysqli_query($link,"SELECT * FROM tin_thicong WHERE id = '$_GET[id]' ");
   $row_dulieu_sua		=	mysqli_fetch_array($result);
    $hinhanh	=	$row_dulieu_sua['hinhanh'];
	$taptin="../HinhCTSP/Hinhdichvu/$hinhanh";
	unlink($taptin);

    $hinhqcab	=	$row_dulieu_sua['hinhqcab'];
	$taptinhinhqcab="../Hinh CTSP/Hinhdichvu/$hinhqcab";
	unlink($taptinhinhqcab);
    
    $hinhqcabc	=	$row_dulieu_sua['hinhqcabc'];
	$taptinhinhqcabc="../Hinh CTSP/Hinhdichvu/$hinhqcabc";
	unlink($taptinhinhqcabc);
    
    $hinhndab	=	$row_dulieu_sua['hinhndab'];
	$taptinhinhndab="../Hinh CTSP/Hinhdichvu/$hinhndab";
	unlink($taptinhinhndab);
    
    $hinhndabc	=	$row_dulieu_sua['hinhndabc'];
	$taptinhinhndabc="../Hinh CTSP/Hinhdichvu/$hinhndabc";
	unlink($taptinhinhndabc);
    
    $hinhndabcd	=	$row_dulieu_sua['hinhndabcd'];
	$taptinhinhndabcd="../Hinh CTSP/Hinhdichvu/$hinhndabcd";
	unlink($taptinhinhndabcd);
	
	$chuoi="DELETE FROM tin_thicong WHERE id = '$_GET[id]' ";
	mysqli_query($link,$chuoi);
		 echo "<form name='frm_dangnhap'>
			        <input type'hidden' name='chuyentrang' value='quan_tri.php?p=ds_tin_thicong'>
					</form>";
?>
<script type="text/javascript">
if(document.frm_dangnhap)
 {
   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;
   window.location = trangcanchuyen;
 }
</script>