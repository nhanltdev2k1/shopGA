<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



  <META NAME="Search Engines" CONTENT="www.google.com, www.google.co.uk, www.altaVista.com, www.aol.com, www.infoseek.com, www.excite.com, www.hotbot.com, www.lycos.com, www.magellan.com, www.cnet.com, www.voila.com, www.google.fr, www.yahoo.fr, www.yahoo.com, www.alltheweb.com, www.msn.com, www.netscape.com, www.nomade.com">

  <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">

  <META NAME="author" CONTENT="Ngữ Á Châu">

  <META NAME="distribution" content="global">



  <link rel="shortcut icon" href="Hinh/copy.ico">



  <title>Thanh Huong</title>

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

                                      //include_once('database.php');
                                      include_once('db.php');

                                      $id = $_REQUEST["id"];

                                      $thuocloai = $_REQUEST["thuocloai"];



                                      $tentaptin =  $_FILES['txt_hinhanh']['name'];
                                      $fileup = '';
                                      if ($tentaptin != "") {

                                        $fileup = "`hinhanh` = '$tentaptin',";
                                      } else {
                                        $fileup = "";
                                      }

                                      //$noidung = str_replace("'", "", $_POST['txt_noidung']);

                                      $tieude = str_replace("'", "", $_POST['tieude']);

                                      //$trangchu = $_POST['trangchu'];

                                      $mota = str_replace("'", "", $_POST['mota']);

                                      //$noidung_en = str_replace("'", "", $_POST['txt_noidung_en']);

                                      //$tieude_en = str_replace("'", "", $_POST['tieude_en']);

                                      //$mota_en = str_replace("'", "", $_POST['mota_en']);

                                      $truyvan = "UPDATE `thuong_mai` SET $fileup

                                      

                                      `mota` = '$mota',

                                      `tieude` = '$tieude' WHERE `id` =$id;";
                                      $result = @mysqli_query($link, $truyvan);
                                      if ($result) {

                                        if ($fileup != '') {
                                          dichuyen_taptin_vaothumuc($tentaptin);
                                        }
                                        echo "Chúc mừng bạn Upload thành công thông tin";
                                      } else {

                                        echo "Upload không thành công.Bạn thử lại xem  ";
                                      }
                                    }





                                    function dichuyen_taptin_vaothumuc($tentaptin)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {

                                        echo "Chúc mừng bạn Upload thành công thông tin ";
                                      } else {

                                        xoataptin($tentaptin);

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
                                      $ketqua_truyvan = mysqli_query($link, $truyvan);
                                    }

                                    ?></td>

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

                                                                $result = mysqli_query($link, "SELECT * FROM thuong_mai where id like '$id' ");



                                                                $row_dulieu_sua    =  mysqli_fetch_array($result);

                                                                $tieude          =  $row_dulieu_sua['tieude'];



                                                                $mota          =  $row_dulieu_sua['mota'];



                                                                $hinhanh          =  $row_dulieu_sua['hinhanh'];

                                                               
                                                                ?>

        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh' onsubmit='return checkInput();'>

          <table width='780' border='1' bordercolor='black' style='border-collapse:collapse'>

            <tr>

              <td width="162">

                <div align="left"><strong>Hình ảnh</strong> </div>

              </td>

              <td width="644">

                <div align="left">

                  <label>

                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="40" />
                    <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh" value="<?php echo "$hinhanh"; ?>" size="40" />

                  </label>

                  <br /><?php echo "<img src='../HinhCTSP/$hinhanh' width='60' height='50' />"; ?>

                </div>

              </td>

            </tr>

            <tr>

              <td>

                <div align="left"><strong>Tiêu đề</strong></div>

              </td>

              <td>

                <div align="left">

                  <label>

                    <input name="tieude" type="text" id="masp2" value="<?php echo "$tieude"; ?>" size="50" maxlength="70" />

                  </label>

                </div>

              </td>

            </tr>

            <!-- 

            <tr>

              <td><div align="left"><strong>Keywords</strong> </div></td>

              <td><div align="left">

                  <label>

                  <textarea name="key" cols="70" id="tieude"><?php //echo"$key";

                                                              ?></textarea>

                  </label>

              </div></td>

            </tr>

            <tr>

              <td><div align="left"><strong>Discription</strong> </div></td>

              <td><div align="left">

                  <label>

                  <textarea name="discription" cols="70" id="tieude3"><?php //echo"$discription";

                                                                      ?></textarea>

                  </label>

              </div></td>

            </tr>-->

            <tr>

              <td valign="top">

                <div align="left"><strong>Mô tả</strong> </div>

              </td>

              <td>

                <div align="left">

                  <label></label>

                  <textarea name="mota" cols="50" id="masp" maxlength="4150"><?php echo "$mota"; ?></textarea>

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
<script type="text/javascript">
  var editor = CKEDITOR.replace('content_vi', {
    uiColor: '#e7e7e7',
    language: 'en',
    skin: 'moono',
    width: 'auto',
    height: 350,
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
  });
</script>

</html>