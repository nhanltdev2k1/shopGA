<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<META NAME="Search Engines" CONTENT="www.google.com, www.google.co.uk, www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.cnet.com, www.voila.com, www.google.fr, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com">
<META NAME="ROBOTS" CONTENT= "INDEX, FOLLOW">
<META NAME="author" CONTENT= "Ngữ Á Châu">
<META NAME="distribution" content= "global">

	<link rel="shortcut icon" href="Hinh/copy.ico">

<title>Thanh Huong</title>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
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
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="tinymce/text.js"></script>
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
<table width="50%" height="363" border="1" bordercolor="#0000FF" style="border-collapse:collapse">
  
  <tr>
    <td width="472" height="22"><div align="center"><strong>Thông Báo </strong></div></td>
    <td width="392"><div align="center"><strong>Hướng Dẫn </strong></div></td>
  </tr>
  <tr>
    <td height="130"  valign="top">
	
	
	<?php
  if(isset($_POST['luu']))
   {
    $today2 = date("D") ;
	$today = date("d") ;
	$today1 = date("m") ;
	$today3 = date("Y") ;
	
		$chuoi= " $today/$today1/$today3 ";
     include_once('database.php');
	   $id=$_REQUEST["id"];
	
	
	$hoten = $_POST['txt_hoten'];
			$diachi = $_POST['txt_diachi'];
			$dt = $_POST['txt_dt'];
			$email = $_POST['txt_email'];
			$fax = $_POST['txt_fax'];
			$tieude = $_POST['txt_tieude'];
			$noidung = $_POST['txt_nd'];
     upload($hoten,$diachi,$dt,$email,$fax,$tieude,$noidung, $id);
	
	
   
   }
   
function upload($hoten,$diachi,$dt,$email,$fax,$tieude,$noidung, $id)
 {
   $ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
   $truyvan = "update  lienhe set hoten='$hoten',diachi='$diachi', dt='$dt', email='$email', fax='$fax' , tieude='$tieude' , noidung='$noidung' where id='$id'";
   $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
   if($ketqua_truyvan)
    echo "Chúc mừng bạn đã upload thành công";
   else
    echo "Upload không thành công.Bạn thử lại xem";
	
  mysql_close($ketnoi_maychu);
 }
 
function dichuyen_taptin_vaothumuc($tentaptin)
 {
   $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
   if(move_uploaded_file($thumuctam_chuataptin,"../Hinh CTSP/$tentaptin"))
   {
      echo "Chúc mừng bạn Upload thành công thông tin";
	
	 
	  }
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
	$truyvan = "DELETE FROM lienhe WHERE id = $masotaptin ";
	$ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);
 }
?></td>
    <td valign="top" align="left"><p><span class="style3">1.</span> <em><strong>Hình ảnh phải nhập đúng kích cở (300x400) hoặc hình lớn hơn một ít, tránh tình trạng nhập vào hình có kích thước nhỏ hơn vì khi bung ra nó sẽ bị nhòe hình. Tốt nhất nên để hình ở định dạng .jpg </strong></em><br />
      
      <br />
       <br />
    </td>
  </tr>
  <tr>
    <td height="203" colspan="2" align="center" valign="top">
   <?php   
   include('db.php');
   $id=$_REQUEST["id"];
   $result=mysql_query("SELECT * FROM lienhe where id like '$id' ");

		$row_dulieu_sua		=	mysql_fetch_array($result);
		
		$hoten=	$row_dulieu_sua['hoten'];
			$diachi=	$row_dulieu_sua['diachi']; 
			$dt =	$row_dulieu_sua['dt'];
			$email=	$row_dulieu_sua['email'];
			$fax =	$row_dulieu_sua['fax'];
			$tieude =	$row_dulieu_sua['tieude'];
			$noidung=	$row_dulieu_sua['noidung'];
		
		?>
   
   <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh'  onsubmit='return checkInput();'>
      <table width='50%' border='1' bordercolor='black' style='border-collapse:collapse'> 
        <tr>
          <td width="162" height="29"><div align="left" class="chu">Họ tên</div></td>
          <td width="644"><div align="left">
              <input name="txt_hoten" type="text" id="txt_hoten" value="<?php echo $hoten; ?>" size="45" />
            <br />
          </div></td>
        </tr>
        <tr>
          <td><div align="left" class="chu">Địa chỉ</div></td>
          <td><div align="left">
              <input name="txt_diachi" type="text" id="txt_diachi" value="<?php echo $diachi; ?>" size="45" />
              <br />
          </div></td>
        </tr>
        <tr>
          <td><div align="left" class="chu">Điện thoại </div></td>
          <td><div align="left">
              <input name="txt_dt" type="text" id="txt_dt" value="<?php echo $dt; ?>" size="45" />
              <br />
          </div></td>
        </tr>
        <tr align="left">
          <td><div align="left" class="chu">Fax</div></td>
          <td><div align="left">
              <input name="txt_fax" type="text" id="txt_fax" size="45" value="<?php echo $fax; ?>"/>
          </div></td>
        </tr>
        <tr>
          <td><div align="left" class="chu">Email</div></td>
          <td><div align="left">
              <input name="txt_email" type="text" id="txt_email" size="45" value="<?php echo $email; ?>" />
              <br />
          </div></td>
        </tr>
        <tr align="left">
          <td><div align="left" class="chu">Tiêu đề</div></td>
          <td><div align="left">
              <input name="txt_tieude" type="text" id="txt_tieude" size="45" value="<?php echo $tieude; ?>"/>
          </div></td>
        </tr>
        <tr align="left">
          <td valign="top"><div align="left" class="chu">Nội dung</div></td>
          <td>
           <script type="text/javascript">
										var oFCKeditor = new FCKeditor('txt_nd');
										oFCKeditor.BasePath = "fckeditor/";
										oFCKeditor.Width	= 600 ;
										oFCKeditor.Height	= 300 ;
										oFCKeditor.Value="<?php echo $noidung; ?>";
										oFCKeditor.Config["EnterMode"]		= "br" ;
										oFCKeditor.Create();
										document.getElementById('xEnter').value = "br" ;
										//document.getElementById("noidung").value=jljl;
									</script> 
          </td>
        </tr>
        
        
          
      
        
        <tr>
          <td height="28"><div align="center"></div></td>
          
        </tr>
      </table>
      </form></td>
  </tr>
</table>
</body>
</html>
