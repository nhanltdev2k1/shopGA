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

<table width="61%" height="530" border="1" bordercolor="#0000FF" style="border-collapse:collapse">

  

  <tr>

    <td width="206" height="22"><div align="center"><strong>Thông Báo </strong></div></td>

    <td width="202"><div align="center"><strong>Hướng Dẫn </strong></div></td>

  </tr>

  <tr>

    <td height="112"  valign="top">

	

	

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

	     $tentaptin =  $_FILES['txt_hinhanh']['name'];

	  if($tentaptin=="")

		{

			$tentaptin=$_POST['txt_hinhanh_hide'];

			

		}

		 $tenlogo =  $_FILES['txt_logo']['name'];

	  if($tenlogo=="")

		{

			$tenlogo=$_POST['txt_logo_hide'];

			

		}

        

	 $tenhinhab =  $_FILES['txt_hinhab']['name'];

	  if($tenhinhab=="")

		{

			$tenhinhab=$_POST['txt_hinhab_hide'];

			

		}

        

	 $tenhinhabc =  $_FILES['txt_hinhabc']['name'];

	  if($tenhinhabc=="")

		{

			$tenhinhabc=$_POST['txt_hinhabc_hide'];

			

		}

        

	  $tenhinhabcd =  $_FILES['txt_hinhabcd']['name'];

	  if($tenhinhabcd=="")

		{

			$tenhinhabcd=$_POST['txt_hinhabcd_hide'];

			

		}

       

        $tenhinhqcab =  $_FILES['txt_hinhqcab']['name'];

	  if($tenhinhqcab=="")

		{

			$tenhinhqcab=$_POST['txt_hinhqcab_hide'];

			

		}

        

         $tenhinhqcabc =  $_FILES['txt_hinhqcabc']['name'];

	  if($tenhinhqcabc=="")

		{

			$tenhinhqcabc=$_POST['txt_hinhqcabc_hide'];

			

		}

        

             $tenhinhndab =  $_FILES['txt_hinhndab']['name'];

	  if($tenhinhndab=="")

		{

			$tenhinhndab=$_POST['txt_hinhndab_hide'];

			

		}

        

             $tenhinhndabc =  $_FILES['txt_hinhndabc']['name'];

	  if($tenhinhndabc=="")

		{

			$tenhinhndabc=$_POST['txt_hinhndabc_hide'];

			

		}

        

             $tenhinhndabcd =  $_FILES['txt_hinhndabcd']['name'];

	  if($tenhinhndabcd=="")

		{

			$tenhinhndabcd=$_POST['txt_hinhndabcd_hide'];

			

		} 

        

	
	 $thuocloai = $_POST['cap_do'];
	 $loaiphong = $_POST['loaiphong'];

	 $songuoi = $_POST['songuoi'];

	 $gia=$_POST['gia'];

	 //$trangchu = $_POST['trangchu'];

	 //$mota = $_POST['mota'];

	 //$mota_en = $_POST['mota_en'];

     //$sort = $_POST['sort'];

     //$luotxem = $_POST['luotxem'];

     //$chuthich = str_replace("'","",$_POST['chuthich']);

     //$chuthichab = str_replace("'","",$_POST['chuthichab']);

     //$chuthichabc = str_replace("'","",$_POST['chuthichabc']);

     //$chuthichabcd = str_replace("'","",$_POST['chuthichabcd']);

     //$chuthichabcde = str_replace("'","",$_POST['chuthichabcde']);
	 

	 //$noidung= str_replace("'","",$_POST['txt_noidung']);

	 //$noidung_en = str_replace("'","",$_POST['txt_noidung_en']);

	// $tieude = str_replace("'","",$_POST['tieude']);

	 //$tieude_en = str_replace("'","",$_POST['tieude_en']);

     //$masanpham = str_replace("'","",$_POST['masanpham']);

	// $size = $_POST['size'];

	// $trangthai_en = str_replace("'","",$_POST['trangthai_en']);



	

		  $noidung_china = str_replace("'","",$_POST['txt_noidung_china']);

	 $tieude_china = str_replace("'","",$_POST['tieude_china']);

	$mota_china = str_replace("'","",$_POST['mota_china']);

	$trangthai_china = str_replace("'","",$_POST['trangthai_china']);

	

	 $noidung_han = str_replace("'","",$_POST['txt_noidung_han']);

	 $tieude_han = str_replace("'","",$_POST['tieude_han']);

	$mota_han = str_replace("'","",$_POST['mota_han']);

	$trangthai_han = str_replace("'","",$_POST['trangthai_han']);

	

	$noidung_nhat = str_replace("'","",$_POST['txt_noidung_nhat']);

	 $tieude_nhat = str_replace("'","",$_POST['tieude_nhat']);

	$mota_nhat = str_replace("'","",$_POST['mota_nhat']);

	$trangthai_nhat = str_replace("'","",$_POST['trangthai_nhat']);

	

	$noidung_nga = str_replace("'","",$_POST['txt_noidung_nga']);

	$noidung_my = str_replace("'","",$_POST['txt_noidung_my']);

	$noidung_anh = str_replace("'","",$_POST['txt_noidung_anh']);

	$noidung_phap = str_replace("'","",$_POST['txt_noidung_phap']);

	

	

	

     upload($thuocloai,$loaiphong,$songuoi,$gia,$tentaptin,$id);

	 

	

   

   }

   

function upload($thuocloai,$loaiphong,$songuoi,$gia,$tentaptin,$id)

 {

   $ketnoi_maychu = ketnoi_MC();

	chon_CSDL($ketnoi_maychu);

   $truyvan = "update loaiphong set khachsan='$thuocloai',loaiphong='$loaiphong',songuoi='$songuoi',gia='$gia',hinhanh='$tentaptin' where id='$id'";
   


  $ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);

   if($ketqua_truyvan){

    dichuyen_taptin_vaothumuc($tentaptin);

	//dichuyen_logo_vaothumuc($tenlogo);

    //dichuyen_hinhab_vaothumuc($tenhinhab);

    //dichuyen_hinhabc_vaothumuc($tenhinhabc);

    //dichuyen_hinhabcd_vaothumuc($tenhinhabcd);

    //dichuyen_hinhqcab_vaothumuc($tenhinhqcab);

    //dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc);

    //dichuyen_hinhndab_vaothumuc($tenhinhndab);

    //dichuyen_hinhndabc_vaothumuc($tenhinhndabc);

    //dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd);

   }

   else{

    echo "Upload không thành công.Bạn thử lại xem";

	}

  mysql_close($ketnoi_maychu);

 }

 

function dichuyen_taptin_vaothumuc($tentaptin)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tentaptin"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tentaptin);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 function dichuyen_logo_vaothumuc($tenlogo)

 {

   $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenlogo"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenlogo);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

 function dichuyen_hinhab_vaothumuc($tenhinhab)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhab']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhab"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhab);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 



 function dichuyen_hinhabc_vaothumuc($tenhinhabc)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhabc']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhabc"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhabc);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

  function dichuyen_hinhabcd_vaothumuc($tenhinhabcd)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhabcd']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhabcd"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhabcd);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

   function dichuyen_hinhqcab_vaothumuc($tenhinhqcab)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhqcab']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhqcab"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhqcab);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

   function dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhqcabc']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhqcabc"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhqcabc);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

  function dichuyen_hinhndab_vaothumuc($tenhinhndab)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhndab']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhndab"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhndab);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

  function dichuyen_hinhndabc_vaothumuc($tenhinhndabc)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhndabc']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhndabc"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhndabc);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

 

   function dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd)

 {

   $thumuctam_chuataptin = $_FILES['txt_hinhndabcd']['tmp_name'];

   if(move_uploaded_file($thumuctam_chuataptin,"../HinhCTSP/$tenhinhndabcd"))

   {

      echo "Chúc mừng bạn Upload thành công thông tin";

	

	 

	  }

	else

    {

      xoataptin($tenhinhndabcd);

	    echo "Chúc mừng bạn Upload thành công thông tin";

	}

 }

function xoataptin($tentaptin)

 {

   $ketnoi_maychu = ketnoi_MC();

	chon_CSDL($ketnoi_maychu);

	$masotaptin = mysql_insert_id();

	$truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin ";

	$ketqua_truyvan = truyvan($truyvan,$ketnoi_maychu);

 }

?>

</td>

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

   $result=mysql_query("SELECT * FROM loaiphong where id like '$id' ");



	$row_dulieu_sua		=	mysql_fetch_array($result);

		$loaiphong					=	$row_dulieu_sua['loaiphong'];

		$songuoi					=	$row_dulieu_sua['songuoi'];

		$gia					=	$row_dulieu_sua['gia'];

		$tieude_china				=	$row_dulieu_sua['tieude_china'];

		$tieude_han					=	$row_dulieu_sua['tieude_han'];

		$mota					=	$row_dulieu_sua['mota'];

		$mota_en					=	$row_dulieu_sua['mota_en'];

		$trangchu					=	$row_dulieu_sua['trangchu'];

		$trangthai					=	$row_dulieu_sua['trangthai'];

		$khuyenmai					=	$row_dulieu_sua['khuyenmai'];

		$trangthai_en					=	$row_dulieu_sua['trangthai_en'];

		$masanpham					=	$row_dulieu_sua['masanpham'];

		$size					=	$row_dulieu_sua['size'];

		$hinhanh					=	$row_dulieu_sua['hinhanh'];

        $logo				    	=	$row_dulieu_sua['logo'];

        $hinhab					   =	$row_dulieu_sua['hinhab'];

        $hinhabc					=	$row_dulieu_sua['hinhabc'];

        $hinhabcd					=	$row_dulieu_sua['hinhabcd'];

        $hinhqcab					=	$row_dulieu_sua['hinhqcab'];

        $hinhqcabc					=	$row_dulieu_sua['hinhqcabc'];

        $hinhndab					=	$row_dulieu_sua['hinhndab'];

        $hinhndabc					=	$row_dulieu_sua['hinhndabc'];

        $hinhndabcd					=	$row_dulieu_sua['hinhndabcd'];

		$mota_china					=	$row_dulieu_sua['mota_china'];

		$mota_han					=	$row_dulieu_sua['mota_han'];

		$mota_nhat					=	$row_dulieu_sua['mota_nhat'];

		   $chuthich					=	$row_dulieu_sua['chuthich'];

        $chuthichab					=	$row_dulieu_sua['chuthichab'];

        $chuthichabc					=	$row_dulieu_sua['chuthichabc'];

        $chuthichabcd					=	$row_dulieu_sua['chuthichabcd'];

        $chuthichabcde					=	$row_dulieu_sua['chuthichabcde'];

		$trangthai					=	$row_dulieu_sua['trangthai'];

		$trangthai_en					=	$row_dulieu_sua['trangthai_en'];

		$trangthai_china					=	$row_dulieu_sua['trangthai_china'];

		$trangthai_han					=	$row_dulieu_sua['trangthai_han'];

		$trangthai_nhat					=	$row_dulieu_sua['trangthai_nhat'];

		$sort					=	$row_dulieu_sua['sort'];

		

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

		

			$noidung_china					=	$row_dulieu_sua['noidung_china'];

		$noidung_china=str_replace('"','\"',$noidung_china);

	    $noidung_china=str_replace("\n","",$noidung_china);

	    $noidung_china=str_replace("\r","",$noidung_china);

	    $noidung_china=str_replace("\t","",$noidung_china);

		

		$noidung_han					=	$row_dulieu_sua['noidung_han'];

		$noidung_han=str_replace('"','\"',$noidung_han);

	    $noidung_han=str_replace("\n","",$noidung_han);

	    $noidung_han=str_replace("\r","",$noidung_han);

	    $noidung_han=str_replace("\t","",$noidung_han);

		

		$noidung_nhat					=	$row_dulieu_sua['noidung_nhat'];

		$noidung_nhat=str_replace('"','\"',$noidung_nhat);

	    $noidung_nhat=str_replace("\n","",$noidung_nhat);

	    $noidung_nhat=str_replace("\r","",$noidung_nhat);

	    $noidung_nhat=str_replace("\t","",$noidung_nhat);

		

		$noidung_nga					=	$row_dulieu_sua['noidung_nga'];

		$noidung_nga=str_replace('"','\"',$noidung_nga);

	    $noidung_nga=str_replace("\n","",$noidung_nga);

	    $noidung_nga=str_replace("\r","",$noidung_nga);

	    $noidung_nga=str_replace("\t","",$noidung_nga);

		

		$noidung_my					=	$row_dulieu_sua['noidung_my'];

		$noidung_my=str_replace('"','\"',$noidung_my);

	    $noidung_my=str_replace("\n","",$noidung_my);

	    $noidung_my=str_replace("\r","",$noidung_my);

	    $noidung_my=str_replace("\t","",$noidung_my);

		

		$noidung_anh					=	$row_dulieu_sua['noidung_anh'];

		$noidung_anh=str_replace('"','\"',$noidung_anh);

	    $noidung_anh=str_replace("\n","",$noidung_anh);

	    $noidung_anh=str_replace("\r","",$noidung_anh);

	    $noidung_anh=str_replace("\t","",$noidung_anh);

		

		$noidung_phap					=	$row_dulieu_sua['noidung_phap'];

		$noidung_phap=str_replace('"','\"',$noidung_phap);

	    $noidung_phap=str_replace("\n","",$noidung_phap);

	    $noidung_phap=str_replace("\r","",$noidung_phap);

	    $noidung_phap=str_replace("\t","",$noidung_phap);

		

		function hop_option()

	{

		$tv="select * from ma_sanpham ORDER BY id ASC";

		$tv_1=mysql_query($tv);

		echo "<select name=cap_do>";

		echo "<option value=\"\">--- Chọn loại HTPP---</option>";

		while($tv_2=mysql_fetch_array($tv_1))

		{
		$select="";
		if($tv_2['id']==$_GET['khachsan']){$select="selected";}

			echo "<option value=".$tv_2[id]." ".$select.">";

				echo $tv_2['tieude'];

			echo "</option>";

			

		}

		echo "</select>";

	}


		?>

   

   <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh'  onsubmit='return checkInput();'>

      <table width='97%' border='1' bordercolor='black' style='border-collapse:collapse'> 
      <tr>
       <td></td>
       <td><?php hop_option();?></td>
      </tr>
        <tr>

          <td width="126"><div align="left"><strong>Hình ảnh</strong></div></td>

          <td width="333"><div align="left">

            <label>

              <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="40" />

              <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh"  value="<?php echo "$hinhanh";?>" size="40" />

              </label>

            <br />

            <?php echo"<img src='../HinhCTSP/$hinhanh' width='60' height='50' />";?> </div></td>

        </tr>

       <tr> 

          <td><div align="left"><strong>Loại phòng</strong></div></td>

          <td><div align="left">

            <input name="loaiphong" type="text" id="tieude" value="<?php echo"$loaiphong";?>" size="70" />

            </div></td>

        </tr>
       <tr> 

          <td><div align="left"><strong>Số người</strong></div></td>

          <td><div align="left">

            <input name="songuoi" type="text" id="tieude" value="<?php echo"$songuoi";?>" size="70" />

            </div></td>

        </tr>
       <tr> 

          <td><div align="left"><strong>Giá</strong></div></td>

          <td><div align="left">

            <input name="gia" type="text" id="tieude" value="<?php echo"$gia";?>" size="70" />

            </div></td>

        </tr>

              <!--<tr>

        <td><div align="left"><strong>Chú Thích ND2</strong></div></td>

          <td><div align="left">

            <input name="trangthai_nhat" type="text" id="tieude" value="<?php echo"$trangthai_nhat";?>" size="70" />

            </div></td>

        </tr>-->
           

          <td height="28"><div align="center"></div></td>

          <td>

            <div align="left">

              <input name="luu"  style="width:100px; color:#FF0000"type="submit" id="luu" value="Lưu Lại" />

            </div></td>

        </tr>

      </table>

    </form></td>

  </tr>

</table>

</body>

</html>

