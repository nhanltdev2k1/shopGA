<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <META NAME="Search Engines" CONTENT="www.google.com, www.google.co.uk, www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.cnet.com, www.voila.com, www.google.fr, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com">
  <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <META NAME="author" CONTENT="Ngữ Á Châu">
  <META NAME="distribution" content="global">

  <link rel="shortcut icon" href="Hinh/copy.ico">

  <title>thiết kế web đà nẵng</title>
  <script type="text/javascript" src="fckeditor/fckeditor.js"></script>
  <style type="text/css">
    <!--
    body,
    td,
    th {
      font-family: Verdana, Arial, Helvetica, sans-serif;
    }

    .style3 {
      color: #FF0000;
      font-weight: bold;
    }

    .doichu {
      color: #0000FF;
      text-decoration: none;
    }

    A:hover {
      color: #00FF66
    }
    -->
  </style>
  <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript" src="tinymce/text.js"></script>
  <script type="text/javascript">
    function checkInput() {
      var isOk = true;
      // if(document.tt_mh.txt_masp.value=="")
      //{
      //  alert("Hãy nhập mã sản phẩm");
      // isOk = false;
      // }
      if (document.tt_mh.txt_tensp.value == "") {
        alert("Hãy nhập tên sản phẩm");
        isOk = false;
      }
      if (document.tt_mh.txt_hinhanh.value == "") {
        alert("Hãy nhập thông tin hình ảnh sản phẩm");
        isOk = false;
      }
      if (document.tt_mh.txt_giaban.value == "") {
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
      <td width="478" height="22">
        <div align="center"><strong>Thông Báo</strong></div>
      </td>
      <td width="486">
        <div align="center"><strong>Hướng Dẫn </strong></div>
      </td>
    </tr>
    <tr>
      <td height="112" valign="top"><?php
                                    if (isset($_POST['luu'])) {
                                      $today2 = date("D");
                                      $today = date("d");
                                      $today1 = date("m");
                                      $today3 = date("Y");

                                      $chuoi = " $today/$today1/$today3 ";
                                      include_once('database.php');
									  include_once('db.php');
                                      $id = $_REQUEST["id"];
                                      $thuocloai = $_REQUEST["thuocloai"];

                                      $tentaptin =  $_FILES['txt_hinhanh']['name'];
                                      $fileup=''; 
                                      if ($tentaptin != "") {									  
									  
									     $fileup="`hinhanh` = '$tentaptin',";                                        

                                      }else{
									     $fileup="";
									  }
                                     
                                      $noidung = str_replace("'", "", $_POST['txt_noidung']);
                                      $tieude = str_replace("'", "", $_POST['tieude']);
                                      //$trangchu = $_POST['trangchu'];
                                      $mota = str_replace("'", "", $_POST['mota']);                                     
                                      $tieude_en = str_replace("'", "", $_POST['tieude_en']);
                                      $tukhoa = str_replace("'", "", $_POST['tukhoa']);
                                      $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude_en'])));

                                      upload($noidung, $tentaptin, $tieude,  $mota, $id, $tieude_en, $tukhoa, $linkurl);
                                    }

                                    function upload($noidung, $tentaptin, $tieude,  $mota, $id, $tieude_en, $tukhoa, $linkurl)
                                    {
                                      //$ketnoi_maychu = ketnoi_MC();
                                      //chon_CSDL($ketnoi_maychu);
									  include("db.php");
									  global $fileup,$fileupb;
                                      $truyvan = "UPDATE `tin_sanpham` SET $fileup $fileupb
`noidung` = '$noidung',
`trangchu` = '$trangchu',
`mota` = '$mota',
`tieude` = '$tieude',
`tieude_en` = '$tieude_en',
`tukhoa` = '$tukhoa', 
`linkurl` = '$linkurl'
 WHERE `id` =$id;";


                                      //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
									  $ketqua_truyvan = mysqli_query($link,$truyvan);
                                      if ($ketqua_truyvan) {
                                        if($fileup!=''){									   	 
	                                      dichuyen_taptin_vaothumuc($tentaptin);
	                                    }
										if($fileupb!=''){									   	 
	                                      dichuyen_hinhqcab_vaothumuc($tenhinhqcab);
	                                    }
                                        
                                        //dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc);
                                        //dichuyen_hinhndab_vaothumuc($tenhinhndab);
                                        //dichuyen_hinhndabc_vaothumuc($tenhinhndabc);
                                        //dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd);
                                          echo "<script>window.location='quan_tri.php?p=ds_tin_sanpham'</script>";
   }

   else{

    echo "Upload không thành công.Bạn thử lại xem";

	}

  //mysqli_close($ketnoi_maychu);

 }

                                    function dichuyen_taptin_vaothumuc($tentaptin)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tentaptin")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tentaptin);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function dichuyen_hinhqcab_vaothumuc($tenhinhqcab)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhqcab']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhqcab")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tenhinhqcab);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhqcabc']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhqcabc")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tenhinhqcabc);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function dichuyen_hinhndab_vaothumuc($tenhinhndab)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhndab']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhndab")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tenhinhndab);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function dichuyen_hinhndabc_vaothumuc($tenhinhndabc)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhndabc']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhndabc")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tenhinhndabc);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd)
                                    {
                                      $thumuctam_chuataptin = $_FILES['txt_hinhndabcd']['tmp_name'];
                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhndabcd")) {
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {
                                        xoataptin($tenhinhndabcd);
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      }
                                    }

                                    function xoataptin($tentaptin)
                                    {
                                      //$ketnoi_maychu = ketnoi_MC();
                                      //chon_CSDL($ketnoi_maychu);
                                      $masotaptin = mysqli_insert_id();
                                      $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin ";
                                      //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
									  $ketqua_truyvan = mysqli_query($link,$truyvan);
                                    }
                                    ?>
      </td>

      <td valign="top" align="left">
        <p><span class="style3">1.</span> <em><strong>Hình ảnh phải nhập đúng kích cở (300x400) hoặc hình lớn hơn một ít, tránh tình trạng nhập vào hình có kích thước nhỏ hơn vì khi bung ra nó sẽ bị nhòe hình. Tốt nhất nên để hình ở định dạng .jpg </strong></em><br />
          <br />
          <br />
        </p>
      </td>
    </tr>
    <tr>
      <td height="203" colspan="2" align="center" valign="top"><?php
                                                                include('db.php');
                                                                $id = $_REQUEST["id"];
                                                                $result = mysqli_query($link,"SELECT * FROM tin_sanpham where id like '$id' ");

                                                                $row_dulieu_sua    =  mysqli_fetch_array($result);
                                                                $tieude          =  $row_dulieu_sua['tieude'];
                                                                $mota          =  $row_dulieu_sua['mota'];
																 $noidung          =  $row_dulieu_sua['noidung'];
																$hinhndab          =  $row_dulieu_sua['hinhndab'];
                                                                $hinhanh          =  $row_dulieu_sua['hinhanh'];
                                                               
                                                                $tieude_en          =  $row_dulieu_sua['tieude_en'];

                                                                $tukhoa          =  $row_dulieu_sua['tukhoa'];

                                                                $linkurl          =  $row_dulieu_sua['linkurl'];
                                                                $trangchu          =  $row_dulieu_sua['trangchu'];

                                                                ?>
        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh' onsubmit='return checkInput();'>
          <table width='97%' border='1' bordercolor='black' style='border-collapse:collapse'>

            <tr>
              <td>Chọn loại tin tức</td>
              <td>
                <select name="thuocloai">
                  <?php

                  $sql = mysqli_query($link,"SELECT * FROM loai_tin_sanpham ORDER BY id DESC");
                  while ($row = mysqli_fetch_array($sql)) {


                  ?>
                    <option value="<?= $row['id'] ?>"><?php echo $row['thuocloai'] ?></option>

                  <?php
                  }
                  ?>
                </select>

            <tr>
              <td width="162">
                <div align="left"><strong>Hình ảnh</strong><br /> KT 800 X 600 PX </div>
              </td>
              <td width="644">
                <div align="left">
                  <label>
                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="40" />
                    <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh" value="<?php echo "$hinhanh"; ?>" size="40" />
                  </label>
                  <br /><?php echo "<img src='../HinhCTSP/Hinhdichvu/$hinhanh' width='60' height='50' />"; ?>
                </div>
              </td>
            </tr>

            <!---->



            <tr>
              <td>
                <div align="left"><strong>Tên Dịch vụ</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tieude_en" type="text" id="masp2" value="<?php echo "$tieude_en"; ?>" size="50" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>


            <td valign="top">
              <div align="left"><strong>Mô tả</strong> </div>
            </td>
            <td>
              <div align="left">
                <label></label>

                <textarea name="mota" cols="50" id="masp"><?php echo "$mota"; ?> </textarea>
              </div>
            </td>
    </tr>

    <tr>
      <td>
        <div align="left"><strong>Từ khóa 1</strong></div>
      </td>
      <td>
        <div align="left">
          <label>
            <input name="tieude" type="text" id="masp2" value="<?php echo "$tieude"; ?>" size="50" maxlength="70" />
          </label>
        </div>
      </td>
    </tr>

    <!--  <tr>
              <td><div align="left"><strong>Giá</strong></div></td>
              <td><div align="left">
                  <label>
                  <input name="mota_en" type="text" id="masp2" value="<?php  ?>" size="50"  maxlength="70"/>
                  </label>
              </div></td>
            </tr>
            
             <tr>
              <td><div align="left"><strong>Bảo hành</strong></div></td>
              <td><div align="left">
                  <label>
                  <input name="facebook" type="text" id="masp2" value="<?php echo "$facebook"; ?>" size="50"  maxlength="70"/>
                  </label>
              </div></td>
            </tr>-->

    <tr>
      <td>
        <div align="left"><strong>Từ khóa 2</strong></div>
      </td>
      <td>
        <div align="left">
          <label>
            <input name="tukhoa" type="text" id="masp2" value="<?php echo "$tukhoa"; ?>" size="50" maxlength="70" />
          </label>
        </div>
      </td>
    </tr>
    <tr>

      <td>
        <div align="left"><strong>Sao</strong></div>
      </td>

      <td align="left"><label>

          <select name="sao" id="select3">

            <option value="1"> 1 Sao</option>

            <option value="2"> 2 Sao</option>
            <option value="3"> 3 Sao</option>

            <option value="4"> 4 Sao</option>
            <option value="5"> 5 Sao</option>

          </select>

        </label></td>

    </tr>


    <tr>
      <td width="126">
        <div align="left"><strong>Hình NDung 01</strong></br>
          <font style='color:#f00;'>900px x auto </font>
        </div>
      </td>
      <td width="333">
        <div align="left">
          <label>
            <input name="txt_hinhndab" type="file" id="txt_hinhndab" size="40" />
            <input name="txt_hinhndab_hide" type="hidden" id="txt_hinhndab" value="<?php echo "$hinhndab"; ?>" size="40" />
          </label>
          <br />
          <?php echo "<img src='../HinhCTSP/Hinhdichvu/$hinhndab' width='60' height='50' />"; ?>
        </div>
      </td>
    </tr>


    <!-- 
              
               <tr>
          <td width="126"><div align="left"><strong>Hình ảnh 002</strong></br><font style='color:#f00;'>400px x 600px </font></div></td>
          <td width="333"><div align="left">
            <label>
              <input name="txt_hinhqcabc" type="file" id="txt_hinhqcabc" size="40" />
              <input name="txt_hinhqcabc_hide" type="hidden" id="txt_hinhqcabc"  value="<?php echo "$hinhqcabc"; ?>" size="40" />
              </label>
            <br />
            <?php echo "<img src='../HinhCTSP/Hinhdichvu/$hinhqcabc' width='60' height='50' />"; ?> </div></td>
        </tr>
                    <tr>
              <td><div align="left"><strong>Chú thích Hình 1</strong> </div></td>
              <td><div align="left">
                  <label>
                  <input name="tieude_en" type="text" id="masp2" value="<?php echo "$tieude_en"; ?>" size="50"  maxlength="70"/>
                  </label>
              </div></td>
            </tr>
            <tr>-->



    <tr>
      <td height="40" valign="top">
        <div align="left"><strong>Nội dung chi tiết</strong></div>
      </td>
      <td>
        <div align="left">
         <textarea name="txt_noidung" id="content_vi"><?php echo $noidung; ?></textarea> 
        </div>
      </td>
    </tr>


    <!-- <tr>
          <td width="126"><div align="left"><strong>Hình NDung 002</strong></br><font style='color:#f00;'>900px x auto </font></div></td>
          <td width="333"><div align="left">
            <label>
              <input name="txt_hinhndabc" type="file" id="txt_hinhndabc" size="40" />
              <input name="txt_hinhndabc_hide" type="hidden" id="txt_hinhndabc"  value="<?php echo "$hinhndabc"; ?>" size="40" />
              </label>
            <br />
            <?php echo "<img src='../HinhCTSP/Hinhdichvu/$hinhndabc' width='60' height='50' />"; ?> </div></td>
        </tr>
           <tr>
              <td valign="top"><div align="left"><strong>Chú thích Hình 2</strong> </div></td>
              <td><div align="left">
                  <label></label>
        
                     <input name="mota_en" type="text" id="masp2" value="<?php echo "$mota_en"; ?>" size="50"  maxlength="70"/>
              </div></td>
            </tr>-->

    <!--<tr>
          <td width="126"><div align="left"><strong>Hình NDung 003</strong></br><font style='color:#f00;'>900px x auto </font></div></td>
          <td width="333"><div align="left">
            <label>
              <input name="txt_hinhndabcd" type="file" id="txt_hinhndabcd" size="40" />
              <input name="txt_hinhndabcd_hide" type="hidden" id="txt_hinhndabcd"  value="<?php echo "$hinhndabcd"; ?>" size="40" />
              </label>
            <br />
            <?php echo "<img src='../HinhCTSP/Hinhdichvu/$hinhndabcd' width='60' height='50' />"; ?> </div></td>
        </tr>
           <tr>
              <td><div align="left"><strong>từ khóa</strong> </div></td>
              <td><div align="left">
                  <label>
                  <input name="tukhoa" type="text" id="masp2" value="<?php echo "$tukhoa"; ?>" size="50"  maxlength="70"/>
                  </label>
              </div></td>
            </tr>
        
					       <tr>
          <td height="40" valign="top"><div align="left"><strong>Nội dung tổng hợp</strong></div>          </td>
          <td><div align="left">
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
          </div></td>
        </tr>-->

    </td>
    </tr>


    <tr>
      <td height="28">
        <div align="center"></div>
      </td>
      <td>
        <div align="left">
          <input name="luu" type="submit" id="luu" value="Lưu lại " />
        </div>
      </td>
    </tr>
  </table>
  </form>
  </td>
  </tr>
  </table>
</body>
<script type="text/javascript">
	var editor = CKEDITOR.replace('content_vi',{
		uiColor : '#e7e7e7',
		language:'en',
		skin:'moono',
		width:'auto',
		height: 350,
		filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
		filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	});
</script>
</html>