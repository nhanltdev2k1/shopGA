<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<style type="text/css">



body,td,th {
	font-family:  Arial, Helvetica, sans-serif;
}
style2 {
	color: #993399;
	font-size: 24px;
}

.style3 {color: #FF0000; font-weight: bold; }
.doichu
 {
    color:#0000FF;
	text-decoration:none;
 }
 A:hover{color:#00FF66}
.style4 {color: #0000FF; text-decoration: none; font-weight: bold; }

</style>

</head>

<body>

<?php

	class pager
	{
		
		function findStart ($limit)
		{
			if(!isset($_GET['page']) || ($_GET['page']=="1" ))
			{
				$start=0;
				$_GET['page']=1;
			}
			else
			{
				$start=($_GET['page']-1)*$limit;
			}
			return $start;
		}
		function findPages ($count, $limit)
		{
			$page=(($count%$limit)==0)? $count/$limit:floor($count/$limit) +1;
			return $page;
		}
		function pageList ($curpage, $pages)
		{
			$page_list="";
			
			if(($curpage!=1) && ($curpage))
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=36&page=1\" title=\"Trang đầu\">Đầu</a>";
			}
			if($curpage-1>0)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=36&page=".($curpage-1)."\" title=\" trước\"><font color='green'>Trước</font></a>";
			}
			for($i=1;$i<=$pages;$i++)
			{
				if($i==$curpage)
				{
					$page_list.="<b>".$i."</b>";
				}
				else
				{
					$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=36&page=".$i."\" title=\"Trang ".$i."\"><font color='#E6E600'>[".$i."]</font></a>";
				}
				$page_list.="";
			}
			if(($curpage+1)<=$pages)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=36&page=".($curpage+1)."\" title=\" sau\"><font color='#00ccff'>[Trang Sau]</font></a>";
			}
			if(($curpage!=$pages) && ($pages!=0))
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=36&page=".$pages."\" title=\"Trang cuối\">Cuối</a>";
			}
			$page_list.="</td>\n";
			return $page_list;
		}
		
}
?>
<form method="post" action="" name="frm_chuyentrang">
 <input type="hidden" name="tranghientai" value="<?php echo $trang_hientai; ?>" />
</form>

<?php
	  // kết nối CSDL
	 // include_once("phan_trang.php");
	  require('database.php');
	$ketnoi_maychu = ketnoi_MC();
	chon_CSDL($ketnoi_maychu);
	  $p=new pager;
	  $limit=10;
	  $start=$p->findStart($limit);
	  $count=mysql_num_rows(mysql_query("SELECT*FROM lienhe"));
	  $pages= $p->findPages($count,$limit);
	  $result=mysql_query("SELECT * FROM lienhe ORDER BY id DESC limit $start,$limit");
	  
	  // $result=mysql_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");
	  if(mysql_num_rows($result)<>0)
	  {
      echo "<h2 align='center'>Thông Tin Người Dùng </h2>";
	  echo	" <table border='1' align='center'>";
        echo"<tr bgcolor='orange'>";
         echo "<td align='center'>Họ tên</td>";
         echo "<td align='center'>Địa chỉ</td>";
		 echo "<td align='center'>Điện thoại</td>";
         echo "<td align='center'>Email</td>";
		  echo "<td align='center'>Ngày</td>";
	     echo "<td align='center'>Tiêu đề</td>";
		 echo "<td align='left'>Nội dung</td>";
		  echo "<td align='center'>Xóa</td>";
		   echo "<td align='center'>Xem</td>";
		
		 
       echo "</tr>";
	   $stt=0;
	   while($row = mysql_fetch_object($result))
		 {
		  $id=$row->id;
		 $hoten=$row->hoten;
		  $diachi=$row->diachi;
		   $dt=$row->dt;
		   $email=  $row->email;
		   $fax=$row->fax;
		   $tieude=$row->tieude;
		   $noidung=nl2br($row->noidung);
		 if($stt%2==0)
		 echo"<tr bgcolor='#00ccff'>";
		 else
        echo"<tr>";
        echo "<td>$hoten</td>";
        echo  "<td>$diachi</td>";
		echo  "<td align=''center'>$dt</td>";
        echo  "<td>$email</td>";
		echo  "<td>$fax</td>";
        echo  "<td>$tieude</td>";
		echo  "<td >$noidung</td>";
			echo  "<td align='center'><a href=\"quan_tri.php?p=38&id=".$id."\" ­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";
		echo  "<td align='center'><a href='quan_tri.php?p=39&id=".$id."'><img src='images/icoin4.png' border='0'></a></td>";
		//echo  "<td align='center'><a href='sua_ctsp_bep_an.php?masp=".$masp."'><img src='Hinh/sua_record.png' border='0'></a></td>";
      	echo " </tr>";
		$stt=$stt+1;
	  	}
     echo" </table>";
	 }
	 $pagelist=$p->pagelist($_GET['page'], $pages);
	 echo "<p align='center'>";
	 echo $pagelist;
	 echo"</p>";
	?>
     
</body>
</html>
