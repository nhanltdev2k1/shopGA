<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<META NAME="Search Engines" CONTENT="www.google.com, www.google.co.uk, www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.cnet.com, www.voila.com, www.google.fr, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com">

<META NAME="description"  CONTENT= "INDEX, FOLLOW">

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

<table width="780" height="360" border="1" bordercolor="#0000FF" style="border-collapse:collapse">

  <tr>

    <td width="478" height="22"><div align="center"><strong>Thông Báo </strong></div></td>

    <td width="486"><div align="center"><strong>Hướng Dẫn </strong></div></td>

  </tr>

  <tr>

    <td height="112"  valign="top"><?php

  if(isset($_POST['luu']))

   {

    $today2 = date("D") ;

	$today = date("d") ;

	$today1 = date("m") ;

	$today3 = date("Y") ;

	

		$chuoi= " $today/$today1/$today3 ";

     //include_once('database.php');
     include('db.php');
	  
	  $tieude= $_POST['tieude'];

	  $mota= $_POST['mota'];

	  $dis= $_POST['dis'];

     upload( $tieude,$mota,$dis);
   
	

   

   }

   

function upload( $tieude,$mota,$dis)

 {
    include('db.php');   
   $truyvan = "UPDATE he_thong SET tieude = '".$tieude."',dis = '".$dis."',mota = '".$mota."' WHERE id=1";
    $result= @mysqli_query($link,$truyvan);
   
   if($result)
   {
      echo "Cập nhật thành công";
   }else{
     echo "Upload không thành công.Bạn thử lại xem"; 
	
	}

 }

 



?></td>

    <td valign="top" align="left"><p><span class="style3">1.</span> <em><strong>Hình ảnh phải nhập đúng kích cở (300x400) hoặc hình lớn hơn một ít, tránh tình trạng nhập vào hình có kích thước nhỏ hơn vì khi bung ra nó sẽ bị nhòe hình. Tốt nhất nên để hình ở định dạng .jpg </strong></em><br />

            <br />

            <br />

    </p></td>

  </tr>

  <tr>

    <td height="203" colspan="2" align="center" valign="top"><?php   

   include('db.php');
   //if(!empty($_REQUEST["id"]))
   //{
   //$id=$_REQUEST["id"];
   //}

   $result= mysqli_query($link,"SELECT * FROM he_thong where id like '1' ");



		$row_dulieu_sua		= mysqli_fetch_array($result);

		

		$tieude					=	$row_dulieu_sua['tieude'];

		$dis					=	$row_dulieu_sua['dis'];

		$key                    =	$row_dulieu_sua['mota'];

		

	

		

		?>

        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh'  onsubmit='return checkInput();'>

          <table width='780' border='1' bordercolor='black' style='border-collapse:collapse'>

            <tr>

              <td width="162" height="22" valign="top">Title</td>

              <td width="644"><label>

                <input name="tieude" type="text" id="tieude" size="70"  value="<?php echo $tieude; ?>"/>

              </label></td>

            </tr>

            <tr>

              <td height="22" valign="top">Description</td>

              <td><label>

                <textarea name="dis" cols="70" rows="10" id="dis"><?php echo $dis; ?></textarea>

              </label></td>

            </tr>

            <tr>

              <td height="22" valign="top">Keywords</td>

              <td><textarea name="mota" cols="70" rows="10" id="key"><?php echo $key; ?></textarea></td>

            </tr>

            

           

            <tr>

              <td height="28"><div align="center"></div></td>

              <td><div align="left">

                  <input name="luu" type="submit" id="luu" value="Lưu lại" />

              </div></td>

            </tr>

          </table>

      </form></td>

  </tr>

</table>

</body>

</html>

