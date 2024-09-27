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
  <table width="780" height="193" border="1" bordercolor="#0000FF" style="border-collapse:collapse">
    <tr>
      <td width="419" height="22">
        <div align="center"><strong>Thông Báo </strong></div>
      </td>
      <td width="445">
        <div align="center"><strong>Hướng Dẫn </strong></div>
      </td>
    </tr>
    <tr>
      <td height="58" valign="top">
        <?php
        if (isset($_POST['luu'])) {
          include('db.php');
          $id = $_REQUEST["id"];
          $tentaptin =  $_FILES['txt_hinhanh']['name'];
          if ($tentaptin == "") {
            $tentaptin = $_POST['txt_hinhanh_hide'];
          }
          //$tenlogo =  $_FILES['txt_logo']['name'];
          //if ($tenlogo == "") {
            //$tenlogo = $_POST['txt_logo_hide'];
          //}
          $tentaptin =  $_FILES['txt_hinhanh']['name'];
          $thuocloai = $_POST['thuocloai2'];
          $url = str_replace(" ", "-", khongdau($_POST['thuocloai2']));
          //$thuocloai_en = $_POST['thuocloai_en'];
          $noidung = $_POST['noidung'];
          //$noidung_en = $_POST['noidung_en'];
		   $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['thuocloai2'])));
          upload($thuocloai, $tentaptin, $noidung, $id, $url);
        }

        function upload($thuocloai, $tentaptin, $noidung, $id, $url)
        {
          include('db.php');
          //$ketnoi_maychu = ketnoi_MC();
          ///chon_CSDL($ketnoi_maychu);
          $truyvan = "update  loai_ma_sanpham set `thuocloai` = '$thuocloai' , `thuocloai_en` = '' , `hinhanh` = '$tentaptin' , `logo` = '', `noidung` = '$noidung' , `name_url` = '$url' , `noidung_en` = '' where id='$id'";
       
          $ketqua_truyvan = mysqli_query($link, $truyvan);
          if ($ketqua_truyvan) {
            dichuyen_taptin_vaothumuc($tentaptin);
            //dichuyen_logo_vaothumuc($tenlogo);

          } else {
            echo "Upload không thành công.Bạn thử lại xem";
          }
          //mysqli_close($ketnoi_maychu);
        }

        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            xoataptin($tentaptin);
            echo "Chúc mừng bạn Upload thành công thông tin";
          }
        }
        function dichuyen_logo_vaothumuc($tenlogo)
        {
          $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../Hinh CTSP/$tenlogo")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            xoataptin($tenlogo);
            echo "Chúc mừng bạn Upload thành công thông tin";
          }
        }
        function xoataptin($tentaptin)
        {
          require('db.php');

          // Ensure $link is your valid connection variable
          global $link;

          // Sanitize the filename to prevent SQL injection
          $tentaptin = mysqli_real_escape_string($link, $tentaptin);

          // Prepare the DELETE statement
          $truyvan = "DELETE FROM ma_dichvu WHERE filename = '$tentaptin'";

          // Execute the DELETE query
          $ketqua_truyvan = mysqli_query($link, $truyvan);

          // Check for query execution success
          if ($ketqua_truyvan) {
            echo "File deleted successfully.";
          } else {
            echo "Error deleting file: " . mysqli_error($link);
          }
        }
        ?>
      </td>
      <td valign="top" align="left">
        <p><br />

          <br />
          <br />
      </td>
    </tr>
    <tr>
      <td height="103" colspan="2" align="center" valign="top">
        <strong>
          <?php
          include('db.php');
          $id = $_REQUEST["id"];
          $result = mysqli_query($link, "SELECT * FROM loai_ma_sanpham where id like '$id' ");

          $row_dulieu_sua    =  mysqli_fetch_array($result);
          $thuocloai2      =  $row_dulieu_sua['thuocloai'];
          $thuocloai_en    =  $row_dulieu_sua['thuocloai_en'];
          $hinhanh      =  $row_dulieu_sua['hinhanh'];
          $logo       =  $row_dulieu_sua['logo'];
          $noidung          =  $row_dulieu_sua['noidung'];
          $noidung = str_replace('"', '\"', $noidung);
          $noidung = str_replace("\n", "", $noidung);
          $noidung = str_replace("\r", "", $noidung);
          $noidung = str_replace("\t", "", $noidung);

          $noidung_en          =  $row_dulieu_sua['noidung_en'];
          $noidung_en = str_replace('"', '\"', $noidung_en);
          $noidung_en = str_replace("\n", "", $noidung_en);
          $noidung_en = str_replace("\r", "", $noidung_en);
          $noidung_en = str_replace("\t", "", $noidung_en);
          ?>
        </strong>
        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' class="style5" id='tt_mh' onsubmit='return checkInput();'>
          <table width='780' border='1' bordercolor='black' style='border-collapse:collapse'>


            <tr>
              <td width="126">
                <div align="left"><strong>Icon sp</strong></div>
              </td>
              <td width="333">
                <div align="left">
                  <label>
                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="40" />
                    <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh" value="<?php echo "$hinhanh"; ?>" size="40" />
                  </label>
                  <br />
                  <?php echo "<img src='../HinhCTSP/$hinhanh' width='60' height='50' />"; ?>
                </div>
              </td>
            </tr>
            <!--
            <tr>
          <td width="126"><div align="left"><strong>Banner sản phẩm</strong></div></td>
          <td width="333"><div align="left">
            <label>
              <input name="txt_logo" type="file" id="txt_logo" size="40" />
              <input name="txt_logo_hide" type="hidden" id="txt_logo"  value="<?php echo "$logo"; ?>" size="40" />
              </label>
            <br />
            <?php echo "<img src='../HinhCTSP/$logo' width='60' height='50' />"; ?> </div></td>
        </tr>
         -->
            <tr>
              <td width="239">
                <div align="left"><strong>Nhập loại hệ thống phân phối </strong></div>
              </td>
              <td width="525">
                <div align="left">

                  <input name="thuocloai2" type="text" id="thuocloai_ban" value="<?php echo "$thuocloai2"; ?>" size="70" />
                </div>
              </td>
            </tr>

            <!--<tr>
          <td><div align="left"><strong>Nhập loại hệ thống phân phối  en</strong></div></td>
          <td><div align="left">
            <input name="thuocloai_en" type="text" id="thuocloai_ban2" value="<?php echo "$thuocloai_en"; ?>" size="70" />
          </div></td>
        </tr>-->

            <td>
              <div align="left"><strong>Trang chủ</strong></div>
            </td>
            <td align="left"><label>
                <?php
                if ($row_dulieu_sua['trangchu'] == "1") {
                  $a_1 = "selected";
                  $a_2 = "";
                } else {
                  $a_1 = "";
                  $a_2 = "selected";
                }
                ?>
                <select name="trangchu" id="trangchu">
                  <option value="1" <?php echo $a_1; ?>>Có </option>
                  <option value="2" <?php echo $a_2; ?>>Không</option>
                </select>
              </label></td>
    </tr>






    <tr>
      <td height="26" colspan="2">
        <div align="left"><strong>Nội Dung </strong><?php xuat_select("luan", "suc"); ?></div>
        <div align="left"></div>
      </td>
    </tr>
    <tr>
      <td colspan="2">

        <div id="div_vn_afc">

          <script type="text/javascript">
            var oFCKeditor = new FCKeditor('noidung');
            oFCKeditor.BasePath = "fckeditor/";
            oFCKeditor.Width = 700;
            oFCKeditor.Height = 300;
            oFCKeditor.Value = "<?php echo $noidung; ?>";
            oFCKeditor.Config["EnterMode"] = "br";
            oFCKeditor.Create();
            document.getElementById('xEnter').value = "br";
            //document.getElementById("noidung").value=jljl;
          </script>
        </div>
        <div id="div_en_afc" style="display:none">

          <script type="text/javascript">
            var oFCKeditor = new FCKeditor('txt_noidung_en');
            oFCKeditor.BasePath = "fckeditor/";
            oFCKeditor.Width = 700;
            oFCKeditor.Height = 300;
            oFCKeditor.Value = "<?php echo $noidung_en; ?>";
            oFCKeditor.Config["EnterMode"] = "br";
            oFCKeditor.Create();
            document.getElementById('xEnter').value = "br";
            //document.getElementById("noidung").value=jljl;
          </script>
        </div>

      </td>
    </tr>

    <td height="28">
      <div align="center"></div>
    </td>
    <td>
      <div align="left">
        <input name="luu" style="width:100px; color:#FF0000" type="submit" id="luu" value="Lưu Lại" />
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