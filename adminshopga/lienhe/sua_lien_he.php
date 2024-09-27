<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="Search Engines" CONTENT="www.google.com, www.google.co.uk, www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.cnet.com, www.voila.com, www.google.fr, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com">
<META NAME="ROBOTS" CONTENT= "INDEX, FOLLOW">
<META NAME="author" CONTENT= "Ngữ Á Châu">
<META NAME="distribution" content= "global">

	<link rel="shortcut icon" href="Hinh/copy.ico">

<title>Thanh Huong</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.doichu
 {
    color:#0000FF;
	text-decoration:none;
 }
 A:hover{color:#00FF66}
-->
</style>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<script type="text/javascript">
 function checkInput()
  {
    var isOk = true;
   // if(document.tt_mh.txt_masp.value=="")
	 //{
	 //  alert("Hãy nhập mã sản phẩm");
	  // isOk = false;
	// }
	 if(document.tt_mh.txt_tensp.value=="")
	 {
	   alert("Hãy nhập tên sản phẩm");
	   isOk = false;
	 }
	if(document.tt_mh.txt_hinhanh.value=="")
	 {
	   alert("Hãy nhập thông tin hình ảnh sản phẩm");
	   isOk = false;
	 }
	if(document.tt_mh.txt_giaban.value=="")
	 {
	   alert("Hãy nhập giá bán của sản phẩm");
	   isOk = false;
	 }
 return isOk;
  }
</script>
</head>
<body>
<table width="50%" height="293" border="1" bordercolor="#0000FF" style="border-collapse:collapse">
  
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
	  // $id=$_REQUEST["id"];
	 /*$tentaptin =  $_FILES['txt_hinhanh']['name'];
	 $tieude = $_POST['txt_tieude'];*/
	$noidung = $_POST['txt_noidung'];	
	
	$noidung_en = $_POST['txt_noidung_en'];	
	$email = $_POST['email'];	
     upload($noidung,$noidung_en, $email);
   }
   
function upload($noidung,$noidung_en, $email)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
   $truyvan = "update  thong_tin_lh set noidung='$noidung', noidung_en='$noidung_en', email='$email' where id='2'";
   $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
   if($ketqua_truyvan)
     echo "Upload  thành công";
   else
    echo "Upload không thành công.Bạn thử lại xem";
	
  mysql_close($ketnoi_maychu);
 }
 

?></td>
    <td valign="top"><p><br />
      
      <br />
       <br />
    </td>
  </tr>
  <tr>
    <td height="203" colspan="2" align="center" valign="top">
    
     <?php   
   include('db.php');
  // $id=$_REQUEST["id"];
   $result=mysql_query("SELECT * FROM thong_tin_lh where id like '2' ");

		$row_dulieu_sua		=	mysql_fetch_array($result);
		
		
		$noidung					=	$row_dulieu_sua['noidung'];
		$noidung=str_replace('"','\"',$noidung);
	     $noidung=str_replace("\n","",$noidung);
	    $noidung=str_replace("\r","",$noidung);
	    $noidung=str_replace("\t","",$noidung);
		
	    $noidung_en					=	$row_dulieu_sua['noidung_en'];
		$noidung_en=str_replace('"','\"',$noidung_en);
	     $noidung_en=str_replace("\n","",$noidung_en);
	    $noidung_en=str_replace("\r","",$noidung_en);
	    $noidung_en=str_replace("\t","",$noidung_en);
		
		$email					=	$row_dulieu_sua['email'];
		
		
		
		
		?>
    <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh"  onsubmit="return checkInput();">
      <table width="503" border="1" bordercolor="black" style="border-collapse:collapse">
        
        <tr>
          <td colspan="2">                </td>
          </tr>
          
          
        <tr>
          <td colspan="1" align="center"><div align="left"><strong>Email liên hệ:</strong> </div></td>
          <td colspan="2" align="center"><label>
            <div align="left">
              <input name="email" type="text" id="email" size="60"  value="<?php echo $email; ?>"/>
              </div>
          </label></td>
        </tr>
        <td colspan="2" align="center"><div align="left"><strong>Nội dung</strong><?php //xuat_select("luan","suc"); ?>
            
          </div></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><div id="div_vn_afc">
						
						 <script type="text/javascript">
										var oFCKeditor = new FCKeditor('txt_noidung');
										oFCKeditor.BasePath = "fckeditor/";
										oFCKeditor.Width	= 700 ;
										oFCKeditor.Height	= 300 ;
										oFCKeditor.Value="<?php echo $noidung; ?>";
										oFCKeditor.Config["EnterMode"]		= "br" ;
										oFCKeditor.Create();
										document.getElementById('xEnter').value = "br" ;
										//document.getElementById("noidung").value=jljl;
									</script> 
					</div>
					<div id="div_en_afc" style="display:none">
						
						 <script type="text/javascript">
										var oFCKeditor = new FCKeditor('txt_noidung_en');
										oFCKeditor.BasePath = "fckeditor/";
										oFCKeditor.Width	= 700 ;
										oFCKeditor.Height	= 300 ;
										oFCKeditor.Value="<?php echo $noidung_en; ?>";
										oFCKeditor.Config["EnterMode"]		= "br" ;
										oFCKeditor.Create();
										document.getElementById('xEnter').value = "br" ;
										//document.getElementById("noidung").value=jljl;
									</script>   
				   </div>					              </td></tr>
        <tr>
          <td width="105"><div align="center"></div></td>
          <td width="374">
            <div align="left">
              <input name="luu" type="submit" id="luu" value="Sửa SP" />
              <input name="xoa" type="reset" id="xoa" value="Nhập Lại" />
            </div></td>
        </tr>
      </table>
      </form>    </td>
  </tr>
</table>
</body>
</html>
