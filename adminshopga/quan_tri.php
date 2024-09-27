<?php



	session_start();

ini_set('display_errors', 0);
error_reporting(E_ALL);


	include("../db.php");

	include("ham/ham.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<link href="css.css" type="text/css" rel="stylesheet"  />



<!--<link href="menu58/styles.css" type="text/css" rel="stylesheet"  />-->

<title>.:: Thiết Kế Bởi AN NGUYEN ::.</title>



<!--[if IE]>

<style type="text/css"> 

/* place css fixes for all versions of IE in this conditional comment */

.twoColElsLtHdr #sidebar1 { padding-top: 30px; }

.twoColElsLtHdr #mainContent { zoom: 1; padding-top: 15px; }

/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */

</style>

<![endif]--></head>

<script type="text/javascript" src="images/jquery.js"></script>

<script type="text/javascript" src="images/backtotop.js"></script>



<script type="text/javascript">

            $(document).ready(function() {

            setInterval('imageRotate()', 4000);

            

            });

            

            function imageRotate() {

              var curImage = $('#imageShow li.current');

              var nextImage = curImage.next();

			  var p=$('#imageShow li div p');

			p.hide();

              

              if(nextImage.length == 0) {

                nextImage = $('#imageShow li:first');

              };

              

              curImage.removeClass('current').addClass('previous');

			  p.show(1000);

              nextImage.css({opacity:0}).addClass('current').animate({opacity: 1}, 1000, function() {

                curImage.removeClass('previous');

              });

            };

        

        </script>



<script type="text/javascript" src="images/jquery_002.js"></script>

<script type="text/javascript">

$(document).ready(function(){



$("#navigation li").corner("top,10px");





});

</script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>


<link href="simpletree.css" type="text/css" rel="stylesheet"  />

<script type="text/javascript" src="simpletreemenu.js">



</script><?php

	include("xacdinh_dangnhap.php");

	include("xu_ly_post_get/xu_ly_post_get.php");

?>

<?php

				if($xacdinh_dangnhap!="co")

				{

				

					include("khung_dang_nhap.php");

					

				}

				else

				{

				

			?>

<body class="twoColElsLtHdr">



  <div id="header">

<div class="logo_bg">

<a href="../" target="_blank" ><img src="hinh/admin.jpg" alt=""  border="0"/></a>

</div>

</div>

  <div id="sidebar1" style="background:#f3f9fd">

  

   <div align="left">

   <div style="padding-left:40px; float:left">Chào bạn <font style="color:#D87000;font-weight:bold;"><?php echo $_SESSION[$ten_danh_dau."ky_danh__quan_tri"]; ?></font>&nbsp;&nbsp;<a href="?thamso=thoat" style="color:#D87000" >Thoát</a></div>

     <?php include('menuleft.php');?>

    </div>

  <!-- end #sidebar1 --></div>

<div id="mainContent">

<div  align="left">

<?php

/*$today2 = date("y") ;*/



 

	   $today2 = date("D") ;

	$today = date("d") ;

	$today1 = date("m") ;

	$today3 = date("Y") ;

	if($today2=='Mon')

		$thu='Thứ 2';

	if($today2=='Tue')

		$thu='Thứ 3';

	if($today2=='Wed')

		$thu='Thứ 4';

	if($today2=='Thu')

		$thu='Thứ 5';

	if($today2=='Fri')

		$thu='Thứ 6';

	if($today2=='Sat')

		$thu='Thứ 7';

	if($today2=='Sun')

		$thu='Chủ Nhật';

	$chuoi= "$thu , $today/$today1/$today3 ";

	echo "$chuoi";

		?>



 </div>

 <div align="left" ><a href="http://www.wieistmeineip.de/cometo/?en"> <img src="http://www.wieistmeineip.de/ip-address/?size=468x60" border="0" width="468" height="60" alt="IP" /> </a></div>

    <div align="left">

      <?php include ('bienluan_phanthan.php') ?>

    </div>

</div>

<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />

   <div style="margin:10px;">

    Nếu gặp vấn đề khó khăn về phần Admin. Quý khách vui lòng gửi mail cho chúng tôi theo địa chỉ: <strong>kythuatatv@gmail.com </strong> hoặc Điện thoại: <strong> 0905 45 43 48</strong> - Hotline: <strong>0914.454.348</strong> Để hỗ trợ tốt nhất.

    <p align="center">© Copyright <a href="../" target="_blank">http://atvmedia.net</a>. All Rights Reserved. </p>

<!-- end #footer --></div>

<!-- end #container -->

</body><?php }?>

</html>

