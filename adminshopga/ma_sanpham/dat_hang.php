<?php
 @define ( '_lib' , '../quanlyadmin/lib/');

    include_once _lib . "config.php";
    include_once _lib . "class.database.php";
    include_once _lib . "file_requick.php";
if(isset($_GET['delete'])){
 $id = (int) $_GET['delete'];
 $db->query('DELETE FROM #_paying WHERE id = ' . $id);
}
?>
<div class="right-box introdution-box">
    <ol class="breadcrumb">
        <li class="active">Thông tin đặt hàng</li>
    </ol>
    
    <table class="table table-bordered table-striped table-hover" style="width:93%;">
    	<tr>
        	<th>#</th>
        	<th>Người đặt hàng</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>                       
            <th>Thời gian</th>
            <th>Thanh toán</th>
            <th>Note</th>
            <th>Sản phẩm</th>
            <th>Xóa</th>
        </tr>
        <?php 
	
		$db->query('SELECT * FROM #_paying');
		$paying = $db->result_array();
			$i = 0;
			if(count($paying) > 0){
				foreach($paying as $one) : 
					$i++;
					$list_id = explode('-',$one['product_id']);
					$size = explode('-',$one['number']);
		?>
        		<tr>
                	<td><?php echo $i;?></td>
                    <td><?php echo "(".$one['gioitinh'].")".$one['name'];?></td>
                    <td><?php echo $one['email'];?></td>
                    <td><?php echo $one['phone'];?></td>
                    <td><?php echo $one['address'];?></td>
                    <td><?php echo $one['thioigian'];?></td>
                    <td><?php echo $one['thanhtoan'];?></td>
                    <td><?php echo $one['note'];?></td>
                    <td>
                    	<?php
                        	$i = 0;
							foreach($list_id as $id) : 
								
								if((int) $id > 0):
                        			$MySql=mysql_query("SELECT * FROM ma_sanpham WHERE id = $id");
									$productInfo = mysql_fetch_array($MySql);
						?>
                    	<div style="width:100%;float:left;margin-bottom:10px;">
                            <img src="../HinhCTSP/<?php echo $productInfo['hinhanh']; ?>" style="width:150px;height:150px;float:left;"/>
                            <ul class="nav" style="width:300px;float:left;margin-left:5px;">
                               <li>
                                  + Tên sản phẩm: 
                                  <strong style="font-size:13px;"><?php echo mb_convert_case($productInfo['tieude'],MB_CASE_TITLE,'utf-8');?></strong>
                               </li>
                               <li>+ Mã sản phẩm: <strong><?php echo $productInfo['code_num']; ?></strong></li>
                               <?php /*?><li>+ Thương hiệu: <strong><?php echo $productInfo[0]['brand']; ?></strong></li><?php */?>
                               <li>+ Giá: <strong><?php echo number_format($productInfo['gia'],'đ'); ?></strong></li>
                               <li>+ Số lượng mua: <strong><?php echo $size[$i]; $i++;?></strong></li>
                               <?php /*?><li>+ Size: <strong><?php echo $size[$i]; $i++;?></strong></li><?php */?>
                               <li>+ Thành tiền: 
                               <strong style="color:#f33;"><?php echo number_format($productInfo['gia'] * $one['number'])." đ"; ?></strong></li>
                            </ul>
                        </div>
                        <?php
						    
                        		endif;
							endforeach;
						?>
                    </td>
                    <td>
                    	<a href="quan_tri.php?p=dat_hang&delete=<?php echo $one['id']; ?>" class="btn btn-link" 
                    	onclick="if( ! confirm('Xóa thông tin đặt hàng này??'))  return false;">Xóa</a>
                    </td>
                </tr>
		<?php endforeach;} ?>
    </table>
</div>