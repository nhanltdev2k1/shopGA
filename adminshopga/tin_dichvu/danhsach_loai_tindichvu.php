

<script type="text/javascript">

	function chuyen_avc(value)

	{

		//alert("chao");

		var link="?p=6&macdinh="+value;

		window.location=link;

	}

</script>



<?php

	  // kết nối CSDL

	  include_once("phan_trang.php");

	  require('db.php');

	//$ketnoi_maychu = ketnoi_MC();

	//chon_CSDL($ketnoi_maychu);

	  $p=new pager;

	  $limit=30;

	  $start=$p->findStart($limit);

	  $count=mysqli_num_rows(mysqli_query($link,"SELECT*FROM loai_tin_dichvu "));

	  $pages= $p->findPages($count,$limit);

	  

	  $result=mysqli_query($link,"SELECT * FROM loai_tin_dichvu   ORDER BY id ASC limit $start,$limit");

	  

	  // $result=mysqli_query("SELECT * FROM danh_muc_sp ORDER BY masp DESC");

	  if(mysqli_num_rows($result)<>0)

	  {

echo "<h2 align='center'>Thông Tin Người Dùng </h2>";

	  echo	" <table border='1' align='center'>";

        echo"<tr bgcolor='orange'>";

         echo "<td >ID</td>";

		 echo "<td >Loại tin tức</td>";	

	     echo "<td >Loại tin tức en</td>";	



		  echo "<td >Xóa</td>";

       echo "<td >Sữa</td>";

      

		// echo "<td >xóa</td>";

		 //echo "<td >Sửa</td>";

		 

       echo "</tr>";

	   $stt=0;

	   while($row = mysqli_fetch_object($result))

		 {

		 $id=$row->id;

		

		 $noidung=$row->thuocloai;

		   $noidung_en=$row->thuocloai_en;

		  

		 if($stt%2==0)

		 echo"<tr bgcolor='#00ccff'>";

		 else

        echo"<tr>";

        echo "<td>$id</td>";

        echo  "<td>$noidung</td>";

	     echo  "<td>$noidung_en</td>";

     

       

		echo  "<td align='center'><a href='quan_tri.php?p=xoa_loai_tindichvu&id=".$id."'­ onclick=\"return confirm('Bạn có muốn xóa thông tin này ?')\"><img src='images/xoa_record.png' border='0'></a></td>";

		echo  "<td align='center'><a href='quan_tri.php?p=sua_loai_tindichvu&id=".$id."'><img src='images/sua_record.png' border='0'></a></td>";

      	echo " </tr>";

		$stt=$stt+1;

	  	}

     echo" </table>";

	 }

	/* $pagelist=$p->nextprev($_GET['page'], $pages);

	 echo "<p align='center'>";

	 echo $pagelist;

	 echo"</p>";*/

	?>

