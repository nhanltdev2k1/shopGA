
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh Sách Sinh Viên</title>
<link rel="stylesheet" type="text/css" href="css.css">
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
a
 {
   text-decoration:none;
   color:#000000;
 }

.doichu
 {
    color:#0000FF;
	text-decoration:none;
 }
.cochu
{
  font-size:12px;
}
.chu_TTSV
{
    font-size:12px;
}
-->
</style>
<script type="text/javascript">
function chuyendentrang(trang)
 {
   document.frm_chuyentrang.tranghientai.value = trang;
   document.frm_chuyentrang.submit();
 }
</script>
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
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\" title=\"Trang đầu\">[Trang Đầu]</a>";
			}
			if($curpage-1>0)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\" title=\"Về trang trước\"><font color='#00ccff'>[Trang Trước]</font></a>";
			}
			for($i=1;$i<=$pages;$i++)
			{
				if($i==$curpage)
				{
					$page_list.="<b>".$i."</b>";
				}
				else
				{
					$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\" title=\"Trang ".$i."\"><font color='#E6E600'>[".$i."]</font></a>";
				}
				$page_list.="";
			}
			if(($curpage+1)<=$pages)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\" title=\"Đến trang sau\"><font color='#00ccff'>[Trang Sau]</font></a>";
			}
			if(($curpage!=$pages) && ($pages!=0))
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."\" title=\"Trang cuối\">[Trang Cuối]</a>";
			}
			$page_list.="</td>\n";
			return $page_list;
		}
		function nextprev($curpage, $page)
		{
			$next_prev="";
			if(($curpage-1)<0 || ($curpage-1)!=1)
			{
				$next_prev.="Back";
			}
			else
			{
			
				$next_prev="<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\">Back</a>";
			}
			$next_prev.="|";
			if(($curpage+1)>$page)
			{
				$next_prev.="Next";
			}
			else
			{
				$next_prev="<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\">Next</a>";
			}
			return $next_prev;
		}
		
		function BackNext($curpage, $pages)
		{
			$next_prev = "";
			if (($curpage-1) <= 0)
			{
			$next_prev .= "<img src='Hinh Web/back.jpg' height='30' border='0'>|";
			}
			else
			{
			$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\">Back|</a>";
			}
			$next_prev .= "";
			if (($curpage+1) > $pages)
			{
			$next_prev .= "<img src='Hinh Web/next.jpg' height='30' border='0'>";
			}
			else
			{
			$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\"> Next |</a>";
			}
			return $next_prev;
		}
		
}
?>
<form method="post" action="" name="frm_chuyentrang">
 <input type="hidden" name="tranghientai" value="<?php echo $trang_hientai; ?>" />
</form>

</body>
</html>

