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
        <div align="center"><strong>Thông Báo </strong></div>
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
									  include('db.php');
                                      $id = $_REQUEST["id"];
                                      $thuocloai = $_REQUEST["thuocloai"];

                                      $tentaptin =  $_FILES['txt_hinhanh']['name'];
                                      $fileup=''; 
                                      if ($tentaptin != "") {									  
									  
									     $fileup="`hinhanh` = '$tentaptin',";                                        

                                      }else{
									     $fileup="";
									  }
                                      
                                      $tieude = str_replace("'", "", $_POST['tieude']);
                                     
                                      $mota = str_replace("'", "", $_POST['mota']);
                                      $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
                                      $thuocloai = $_POST['thuocloai'];

                                      upload($tentaptin, $tieude, $thuocloai,  $mota, $linkurl,$id);
                                    }

                                    function upload($tentaptin, $tieude, $thuocloai,  $mota, $linkurl,$id)
                                    {
                                      //$ketnoi_maychu = ketnoi_MC();
                                      //chon_CSDL($ketnoi_maychu);
									  include("db.php");
									  global $fileup;
                                      $truyvan = "UPDATE `tin_thicong` SET $fileup `mota` = '$mota',`tieude` = '$tieude',`linkurl` = '$linkurl' WHERE `id` =$id;";


                                      $ketqua_truyvan = mysqli_query($link,$truyvan);
                                      if ($ketqua_truyvan) {
                                        if($fileup!=''){									   	 
											 dichuyen_taptin_vaothumuc($tentaptin);
										}
										 echo "Chúc mừng bạn Upload thành công thông tin";
                                        //dichuyen_hinhqcab_vaothumuc($tenhinhqcab);
                                        //dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc);
                                        //dichuyen_hinhndab_vaothumuc($tenhinhndab);
                                        //dichuyen_hinhndabc_vaothumuc($tenhinhndabc);
                                        //dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd);
                                      } else {
                                        echo "Upload không thành công.Bạn thử lại xem";
                                      }
                                      //mysql_close($ketnoi_maychu);
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
									  include("db.php");
                                      $masotaptin = mysqli_insert_id();
                                      $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin ";
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
                                                                $result = mysqli_query($link,"SELECT * FROM tin_thicong where id like '$id' ");

                                                                $row_dulieu_sua    =  mysqli_fetch_array($result);
                                                                $tieude          =  $row_dulieu_sua['tieude'];
                                                                $mota          =  $row_dulieu_sua['mota'];
                                                                $hinhanh          =  $row_dulieu_sua['hinhanh'];
                                                                //$hinhqcab          =  $row_dulieu_sua['hinhqcab'];
                                                                //$hinhqcabc          =  $row_dulieu_sua['hinhqcabc'];
                                                                //$hinhndab          =  $row_dulieu_sua['hinhndab'];
                                                                //$hinhndabc          =  $row_dulieu_sua['hinhndabc'];
                                                                //$hinhndabcd          =  $row_dulieu_sua['hinhndabcd'];
                                                                //$mota_en          =  $row_dulieu_sua['mota_en'];
                                                                //$noidung_en          =  $row_dulieu_sua['noidung_en'];
                                                                //$tieude_en          =  $row_dulieu_sua['tieude_en'];
                                                                //$title          =  $row_dulieu_sua['title'];
                                                                //$tukhoa          =  $row_dulieu_sua['tukhoa'];
                                                                //$nguon          =  $row_dulieu_sua['nguon'];
                                                              //  $sao          =  $row_dulieu_sua['sao'];
                                                                //$facebook          =  $row_dulieu_sua['facebook'];
                                                                $linkurl          =  $row_dulieu_sua['linkurl'];
                                                                ///$trangchu          =  $row_dulieu_sua['trangchu'];

                                                                //$noidung          =  $row_dulieu_sua['noidung'];
                                                                //$noidung = str_replace('"', '\"', $noidung);
                                                                //$noidung = str_replace("\n", "", $noidung);
                                                                //$noidung = str_replace("\r", "", $noidung);
                                                                //$noidung = str_replace("\t", "", $noidung);

                                                                //$noidung_en          =  $row_dulieu_sua['noidung_en'];
                                                                //$noidung_en = str_replace('"', '\"', $noidung_en);
                                                                //$noidung_en = str_replace("\n", "", $noidung_en);
                                                                //$noidung_en = str_replace("\r", "", $noidung_en);
                                                                //$noidung_en = str_replace("\t", "", $noidung_en);
                                                                ?>
        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh' onsubmit='return checkInput();'>
          <table width='97%' border='1' bordercolor='black' style='border-collapse:collapse'>

            <tr>
              <td>Chọn loại tin tức</td>
              <td>
                <?php
                $id = $_REQUEST["id"];
                $sq = mysqli_query($link,"SELECT * FROM tin_thicong where id=" . $id . "");
                $loai = mysqli_fetch_array($sq);
                ?>
                <select name="thuocloai">
                  <?php
                  $selected = "";
                  $sql = mysqli_query($link,"SELECT * FROM loai_tin_thicong ORDER BY id DESC");
                  while ($row = mysqli_fetch_array($sql)) {

                    if ($row['id'] == $loai['thuocloai']) {
                      $selected = "selected='selected'";
                    } else {
                      $selected = '';
                    }

                  ?>
                    <option value="<?= $row['id'] ?>" <?php echo $selected; ?>><?php echo $row['thuocloai'] ?></option>

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




            <tr>
              <td>
                <div align="left"><strong>Tên tiêu đề</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tieude" type="text" id="masp2" value="<?php echo "$tieude"; ?>" size="50" maxlength="70" />
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
        <div align="left"><strong>Link web</strong></div>
      </td>
      <td>
        <div align="left">
          <label>
            <input name="tieude_en" type="text" id="masp2" value="<?php echo "$linkurl"; ?>" size="50" maxlength="270" />
          </label>
        </div>
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

</html>