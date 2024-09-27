<?php
session_start();

?>
<?php
	
	$_SESSION['ky_danh__bcd']=$_POST['txt_hoten'];
	$_SESSION['mat_khau__bcd']=$_POST['txt_matkhau'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dang Nhap</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style></head>
<body>
<?php

if(isset($_POST['dangnhap']))
  {
    require('database.php');
	 kiemtra_hoten_thanhvien();
  }

function kiemtra_hoten_thanhvien()
{
        $ketnoi_maychu = ketnoi_MC();
        chon_CSDL($ketnoi_maychu);  
       $hoten = $_POST['txt_hoten'];
	   $matkhau = base64_encode(trim($_POST['txt_matkhau']));
	   $truyvan = "SELECT user,pass,quyen FROM quantri WHERE user like '$hoten' AND pass = '$matkhau'";
	   $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
	   $somautin = @mysql_num_rows($ketqua_truyvan);
	   if($somautin > 0)
	    {
		  $rows = mysql_fetch_array($ketqua_truyvan,MYSQL_BOTH);
		  if($rows['quyen'] == "admin")
		   {
		     $_SESSION['ky_danh__bcd'] = $hoten;
			 $_SESSION['mat_khau__bcd'] = $rows['quyen'];
		   	 echo "<form name='frm_dangnhap'>
			        <input type='hidden' name='chuyentrang' value='quan_tri.php?p=1'>
					</form>";
			
		   }
		  else
		    {
			  $_SESSION['ky_danh__bcd'] = $hoten;
			  echo $hoten;
			}
		}
	    else
		  loi();
	mysql_close($ketnoi_maychu);
}
function loi()
 {
   echo "Không tồn tại thành viên có họ tên như bạn cung cấp";
 }

?>
</body>
</html>
<script type="text/javascript">
if(document.frm_dangnhap)
 {
   var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;
   window.location = trangcanchuyen;
 }
</script>
