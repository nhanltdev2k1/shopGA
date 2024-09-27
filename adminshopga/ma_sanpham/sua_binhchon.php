<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sửa Danh Mục Bình Chọn</title>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<style type="text/css">
<!--
body,td,th {
	/*font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color:#FFFFFF;*/
}
.doichu
 {
    color:#0000FF;
	text-decoration:none;
 }
 A:hover{color:#00FF66}
-->
</style>

<script type="text/javascript" >
 function checkInput()
  {
    var isOk = true;
   // if(document.tt_mh.txt_masp.value=="")
	 //{
	 //  alert("Hãy nhập mã sản phẩm");
	  // isOk = false;
	// }
	 if(document.tt_mh.txt_gioithieu.value=="")
	 {
	   alert("Hãy nhập tên sản phẩm");
	   isOk = false;
	 }
	if(document.tt_mh.txt_hinhanh.value=="")
	 {
	   alert("Hãy nhập thông tin hình ảnh sản phẩm");
	   isOk = false;
	 }
	
 return isOk;
  }
</script>
</head>
<body>
<table width="780" height="145" border="1"  style="border-collapse:collapse">
  
  <tr>
    <td width="400" height="22"><div align="center"><strong>Thông Báo </strong></div></td>
    <td width="469"><div align="center"><strong>Hướng Dẫn </strong></div></td>
  </tr>
  <tr>
    <td height="46"  valign="top">
	

	<?php
	
	if($_GET['id']!=''){
	 $mySql=mysql_query("select * from binhchon where id=".$_GET['id']."");
	 $suabinhchon=mysql_fetch_array($mySql);
	}
/*$today2 = date("y") ;*/

  if(isset($_POST['luu']))
   {
	  
    require('database.php');
	$tentaptin =  $_FILES['txt_hinhanh']['name'];
	$id= $_POST['id'];
    $mySql=mysql_query("select * from ma_sanpham where id=".$_POST['phong']."");
	$re=mysql_fetch_array($mySql);
	$hoten= $_POST['hoten'];
	$email=$_POST['email'];
	$mota=$_POST['mota'];	
    upload($id,$hoten,$email,$mota);
	//dichuyen_taptin_vaothumuc($tentaptin);
   }
   
function upload($id,$hoten,$email,$mota)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
   $truyvan = " update binhchon set hoten='$hoten',email='$email',mota='$mota' where id=".$id."";
  
   $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
   if($ketqua_truyvan)
      echo "Upload  thành công thông tin";
   else
    echo "Upload không thành công.Bạn thử lại xem ";
	
  mysql_close($ketnoi_maychu);
 }
 
function dichuyen_taptin_vaothumuc($tentaptin)
 {
   $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tentaptin"))
    echo "Chúc mừng bạn Upload thành công";
   else
    {
      xoataptin($tentaptin);
	  echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
	}
 }
 
function xoataptin($tentaptin)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
	$masotaptin = mysql_insert_id();
	$truyvan = "DELETE FROM mota_khachsan WHERE id = $masotaptin ";
	$ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
 }
?></td>
    <td valign="top"><p><br />
      <br />
    </td>
  </tr>
  <tr>
    <td height="66"  colspan="2" align="center" valign="top"><form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh"  onsubmit="return checkInput();">
      <table width="780" border="1" bordercolor="black" style="border-collapse:collapse; border-color:#FF0000">
        <tr>
          <td width="233" valign="top"><div align="left"><strong>Họ tên </strong></div></td>
          <td width="531"><div align="left">
            <label>
            <input type="text" name="hoten" value="<?php echo $suabinhchon['hoten'];?>" />
              </label>
            </div></td>
        </tr>
        <tr>
          <td><div align="left"><strong>Email</strong> </div></td>
          <td><div align="left">
              <label>
              <input name="email" type="text" id="email" value="<?php echo $suabinhchon['email'];?>" />
              </label>
          </div></td>
        </tr>
        <!--
        <tr>
          <td><div align="left"><strong>Mô tả</strong> </div></td>
          <td><div align="left">
              <label>
              <input name="mota" type="text" id="mota" value="<?php echo $suabinhchon['mota'];?>" />
              </label>
          </div></td>
        </tr>
        -->
        <!--<tr>
          <td height="84"><div align="left"><strong>Nội dung nhỏ</strong> <strong>EN</strong></div></td>
          <td><div align="left">
              <label>
              <textarea name="noidungnho_en" cols="90" rows="5" id="noidungnho_en"></textarea>
              </label>
          </div></td>
        </tr>-->
        <tr>
          <td height="40" valign="top"><div align="left"><strong>Mô tả</strong></div>          </td>
          <td><div align="left">
              <script type="text/javascript">
										var oFCKeditor = new FCKeditor('mota');
										oFCKeditor.BasePath = "fckeditor/";
										oFCKeditor.Width	= 700 ;
										oFCKeditor.Height	= 300 ;
										oFCKeditor.Value="<?php echo $suabinhchon['mota'];?>";
										oFCKeditor.Config["EnterMode"]		= "br" ;
										oFCKeditor.Create();
										document.getElementById('xEnter').value = "br" ;
										//document.getElementById("noidung").value=jljl;
									</script>
          </div></td>
        </tr>
        <!--
         <tr>

          <td><div align="left"><strong>Hình ảnh</strong></br>900px x auto </div></td>

          <td><div align="left">

            <label>

            <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="50" />

            </label>

          </div></td>

        </tr>
-->
        <tr>
          <td>
            <div align="right"></div></td>
          <td>
            <div align="left">
           
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
              <input name="luu" type="submit" id="luu" value="Lưu Lại" />
            </div></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
</table>

</body>
</html>
