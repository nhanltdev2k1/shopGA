<?
  require('db.php');
  $count=mysql_num_rows(mysql_query("SELECT*FROM size"));
  $all=$count;
  
  if($_GET['pro_id']!='' && $_GET['id']!=''){
		//$list_id = $_REQUEST['id'];
		//$list_id = substr($list_id,0,strlen($list_id) - 1);
		//$del_pic_id = explode(',',$list_id); 
		//for($i = 0; $i < count($del_pic_id); $i++){
			//$sql = "SELECT * FROM size WHERE id = '" . $del_pic_id[$i] . "'";
			//mysql_query($sql);
			//$pic = $d->result_array();
			
		//}
		//mysql_query('DELETE FROM size WHERE size.id IN(' . $list_id . ')');
		echo $_GET['id']." - 22222";
		mysql_query('DELETE FROM size WHERE id='.$_GET['id'].'');
		?>
	   <script>window.location ="quan_tri.php?p=danhsach_size"</script>
	<?
	}
	
	if(isset($_REQUEST['noibat']) && $_REQUEST['noibat'] != ''){
	$noibat=$_GET['noibat'];
	$id=$_GET['id'];
	if($noibat==0){
	 mysql_query("update size set noibat=1 where id=".$id."");
	}
	if($noibat==1){
	 mysql_query("update size set noibat=0 where id=".$id."");
	}
	?>
	   <script>window.location ="quan_tri.php?p=danhsach_size"</script>
	<?
	}
	
?>
<!--<script type="text/JavaScript" src="../js/jquery.min.js"></script> -->
<script language="javascript">				


function delete_all_chosen(){
	
	var list_id = '';
	for(var i = 1;i <= <?=$all?>; i++){
		var a_checkbox = $('.a-checkbox_' + i);
		if(a_checkbox.attr('checked') == 'checked'){
			list_id += a_checkbox.val() + ',';
		}
	}
	window.location ="quan_tri.php?p=danhsach_size&list_id=" + list_id;
	return true;
}


</script>

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
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=danhsach_size&page=1\" title=\"Trang đầu\" style='margin:4px;'> << </a>";
			}
			if($curpage-1>0)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=danhsach_size&page=".($curpage-1)."\" title=\"Về trang trước\" style='margin:4px;'><font color='#00ccff'> < </font></a>";
			}
			for($i=1;$i<=$pages;$i++)
			{
				if($i==$curpage)
				{
					$page_list.="<b>".$i."</b>";
				}
				else
				{
					$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=danhsach_size&page=".$i."\" title=\"Trang ".$i."\" style='margin:4px;'><font color='red'>[".$i."]</font></a>";
				}
				$page_list.="";
			}
			if(($curpage+1)<=$pages)
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=danhsach_size&page=".($curpage+1)."\" title=\"Đến trang sau\" style='margin:4px;' ><font color='#00ccff'> > </font></a>";
			}
			if(($curpage!=$pages) && ($pages!=0))
			{
				$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?p=danhsach_size&page=".$pages."\" title=\"Trang cuối\" > >> </a>";
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
			
				$next_prev="<a href=\"?p=danhsach_size&page=".($curpage-1)."\">Back</a>";
			}
			$next_prev.="|";
			if(($curpage+1)>$page)
			{
				$next_prev.="Next";
			}
			else
			{
				$next_prev="<a href=\"?p=danhsach_size&page=".($curpage+1)."\">Next</a>";
			}
			return $next_prev;
		}
		
		
		
}
?>
<?php
	  // kết nối CSDL
	  //include_once("phan_trang.php");
	  require('db.php');
	//$ketnoi_maychu = ketnoi_MC();
	//chon_CSDL($ketnoi_maychu);
	if($_REQUEST['adcat']!='')
	{
		$loai=" where thuocloai=".$_POST['adcat']." ";
	}
	  $p=new pager;
	  $limit=20;
	  $start=$p->findStart($limit);
	  $count=mysql_num_rows(mysql_query("SELECT*FROM size"));
	  $pages= $p->findPages($count,$limit);
	  
	  $result=mysql_query("SELECT * FROM size ORDER BY id DESC limit $start,$limit");
	  
	  // $result=mysql_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");
	  if(mysql_num_rows($result)<>0)
	  {

     echo "<h2 align='center'>Danh Sách Size </h2>";
		  ?>
          <form action="quan_tri.php?p=danhsach_size" method="post">
     	<table border="0" style="width:25px;height:20px;margin-left:500px;" >
          <tr>
           <td width="200">
				<select name="adcat">
                <option value="">Tất cả</option>
            <?
		   $sql=mysql_query("select * from loai_size");
		   while($loai=mysql_fetch_array($sql))
		   {
		   ?>

                <option value="<?=$loai['id']?>"><?=$loai['thuocloai']?></option>
                
           <?
	  }
	  ?>
                </select>
           </td>
           <td width="50">
           <input type="submit" name="but" value="Chuyển" style="padding:2px;background:#00F;color:#FFF;border-radius:2px;" />
           </td>
          </tr>
        </table>    
        </form>
       <table border="0" style="width:25px;height:20px;margin-left:248px;" >
        <tr style="border:none">
<td></td>
<td>
<input type="checkbox" class="top-checked-all"/> 

	</td>
<td>
<a href="#"  style="float:left;margin-right:10px; width: 100px;" 
    onclick="if(!confirm('Bạn có chắc là muốn xóa các sản phẩm này không...???'))return false; else delete_all_chosen()">Xóa đã chọn</a>

</td><td></td><td></td><td></td><td></td><td></td>	
</tr>
   </table>       
   
    <?
	 
	 	  echo	" <table border='1' align='center' >";
        echo"<tr bgcolor='orange'>";
		  echo "<td >STT</td>";
         echo "<td >#</td>";
		 echo "<td >Sản phẩm</td>";
         echo "<td >id</td>";
          //echo "<td >Hotline</td>";		
		echo "<td >Size</td>";
		 echo "<td >Giá gốc</td>";	
         echo "<td >Giá bán</td>"; 		 		 
		 echo "<td >Sale</td>"; 		 		 
	     //echo "<td >Hình chính</td>";
	     //echo "<td >logo</td>";
	    // echo "<td >Banner</td>"; 
        // echo "<td >Banner giữa</td>"; 		   		  
        // echo "<td >Footer 1</td>";
         //echo "<td >Quảng cáo 1</td>";		 
         //echo "<td >Hình sale</td>"; 
         //echo "<td >Hình hot</td>"; 
         //echo "<td >giá bán</td>";
         //echo "<td >giá gốc</td>";    	
		 //echo "<td >ngôi sao</td>"; 	 	 	
		 echo "<td >Xóa</td>";
       echo "<td >Sữa</td>";
      
		// echo "<td >xóa</td>";
		 //echo "<td >Sửa</td>";
		 
       echo "</tr>";
	   $stt=1;
	   $i=0;
	   while($row = mysql_fetch_object($result))
		 {
		 $i++;
		  $idsize=$row->id;
		  $did=$row->pro_id;
		  $size=$row->size;
		  $gia=$row->gia;
		  $giaban=$row->giaban;
		  $sale=$row->sale;
	      $sql3=mysql_query("select * from ma_sanpham where id='".$did."'");
		  $loai=mysql_fetch_array($sql3);
		  $loai1=$loai['tieude'];
		  $tieude=$row->tieude;
          $id=$loai->id;		  
	     //$trangthai_han=$row->trangthai_han;
          $sort=$row->sort;
		  $noibat=$row->noibat;
		  $hinhanh="../Hinh CTSP/".$row->hinhanh;
		  $hinhanh="<img src='$hinhanh' width='40' height='20' '>";
		  //$logo="../Hinh CTSP/".$row->logo;
			// $logo="<img src='$logo' width='40' height='20' '>";
            //  $hinhab="../Hinh CTSP/".$row->hinhab;
			// $hinhab="<img src='$hinhab' width='40' height='20' '>";
            //  $hinhabc="../Hinh CTSP/".$row->hinhabc;
			// $hinhabc="<img src='$hinhabc' width='40' height='20' '>";
            //   $hinhabcd="../Hinh CTSP/".$row->hinhabcd;
			// $hinhabcd="<img src='$hinhabcd' width='40' height='20' '>";
            // $hinhqcab="../Hinh CTSP/".$row->hinhqcab;
			// $hinhqcab="<img src='$hinhqcab' width='40' height='20' '>";
            //$hinhqcabc="../Hinh CTSP/".$row->hinhqcabc;
			// $hinhqcabc="<img src='$hinhqcabc' width='40' height='20' '>";
             //   $hinhndab="../Hinh CTSP/".$row->hinhndab;
			 //$hinhndab="<img src='$hinhndab' width='40' height='20' '>";
             //$mota_han=$row->mota_han;
             //$masanpham=$row->masanpham;
             //$hinhndabc="../Hinh CTSP/".$row->hinhndabc;
			 //$hinhndabc="<img src='$hinhndabc' width='40' height='20' '>";
             //$hinhndabcd="../Hinh CTSP/".$row->hinhndabcd;
			 //$hinhndabcd="<img src='$hinhndabcd' width='40' height='20' '>";
		$trangthai_china=$row->trangthai_china;		  
		if($stt%2==0)
		echo"<tr bgcolor='#00ccff'>";
		else
        echo"<tr>";
		echo "<td>$stt</td>";
        /* echo "<td>$id</td>";*/
		?>
        <td><input type="checkbox" class="a-checkbox a-checkbox_<?=$i?>" value="<?=$id?>"/></td>
        <?

       /* echo "<td>$id</td>";*/
        echo  "<td>$loai1</td>";
        echo  "<td>$did</td>";
		//echo  "<td>$trangthai_han</td>";
        echo  "<td>$size</td>";

	    echo  "<td>$gia</td>";
		echo  "<td>$giaban</td>";
		echo  "<td>$sale</td>";
     	 ?>
       <?php /*
		<td>
		<?
		if($noibat==0){
		?>
		<a href="quan_tri.php?p=danhsach_size&noibat=0&id=<?=$id?>">No</a>
		<?
		}else{
		?>
		<a href="quan_tri.php?p=danhsach_size&noibat=1&id=<?=$id?>">Active</a>
		<?
		}
		?>
		</td>	 
	<?php */?>	
	 <?php 
        // echo  "<td>$hinhanh</td>";
		// echo  "<td>$logo</td>";	
         //echo  "<td>$hinhab</td>";
		 //echo  "<td>$hinhabc</td>"; 
		 //echo  "<td>$hinhabcd</td>";
         //echo  "<td>$hinhqcab</td>";
         //echo  "<td>$hinhqcabc</td>";
        // echo  "<td>$hinhndab</td>";
        // echo  "<td>$mota_han</td>";
         //echo  "<td>$masanpham</td>";
        // echo  "<td>$hinhndabc</td>";
         //echo  "<td>$hinhndabcd</td>";             
		echo  "<td align='center'><a href=\"quan_tri.php?p=xoa_size&pro_id=".$did."&id=".$idsize."\" ­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\">
			<img src='images/xoa_record.png' border='0'></a></td>";
		echo  "<td align='center'><a href='quan_tri.php?p=sua_size&pro_id=".$did."&id=".$idsize."'><img src='images/sua_record.png' border='0'></a></td>";
      	echo " </tr>";
		$stt=$stt+1;
	  	}
     echo" </table>";
	 }
	 $pagelist=$p->pageList($_GET['page'], $pages);
	 echo "<p align='center'>Trang :";
	 echo $pagelist;
	 echo"</p>";
	?>
<script>
$('.top-checked-all').click(function(e) {
		if($(this).attr('checked') == 'checked'){
			$('.a-checkbox').attr('checked','checked');
			$('.bottom-checked-all').attr('checked','checked');
		}else{
			$('.a-checkbox').attr('checked',false);
			$('.bottom-checked-all').attr('checked',false);
		}
		
	});
</script>
