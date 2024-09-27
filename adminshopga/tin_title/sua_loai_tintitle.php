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

    .doichu {
      color: #0000FF;
      text-decoration: none;
    }

    A:hover {
      color: #00FF66
    }

    .style5 {
      font-weight: bold
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

          include_once('database.php');
		  include_once('db.php');
          $id = $_REQUEST["id"];

          $thuocloai = $_POST['thuocloai2'];
          $thuocloai_en = $_POST['thuocloai_en'];

          upload($thuocloai, $thuocloai_en, $id);
        }

        function upload($thuocloai, $thuocloai_en, $id)
        {
          //$ketnoi_maychu = ketnoi_MC();
          //chon_CSDL($ketnoi_maychu);
		  include("db.php");
          $truyvan = "update  loai_tin_title set thuocloai = '$thuocloai' , `thuocloai_en` = '$thuocloai_en' where id='$id'";

          //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
		  $ketqua_truyvan = mysqli_query($link,$truyvan);
          if ($ketqua_truyvan)
            echo "Upload thành công";
          else
            echo "Upload không thành công.Bạn thử lại xem";

          //mysqli_close($ketnoi_maychu);
        }

        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            xoataptin($tentaptin);
            echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
          }
        }

        function xoataptin($tentaptin)
        {
          //$ketnoi_maychu = ketnoi_MC();
          //chon_CSDL($ketnoi_maychu);
		  include("db.php");
          $masotaptin = mysqli_insert_id();
          $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin ";
          //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
		  $ketqua_truyvan = mysqli_query($link,$truyvan);
        }
        ?></td>
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
          $result = mysqli_query($link,"SELECT * FROM loai_tin_title where id like '$id' ");

          $row_dulieu_sua    =  mysqli_fetch_array($result);
          $thuocloai2      =  $row_dulieu_sua['thuocloai'];
          $thuocloai_en    =  $row_dulieu_sua['thuocloai_en'];


          ?>
        </strong>
        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' class="style5" id='tt_mh' onsubmit='return checkInput();'>
          <table width='780' border='1' bordercolor='black' style='border-collapse:collapse'>




            <tr>
              <td width="239">
                <div align="left"><strong>Nhập loại tin tức </strong></div>
              </td>
              <td width="525">
                <div align="left">

                  <input name="thuocloai2" type="text" id="thuocloai_ban" value="<?php echo "$thuocloai2"; ?>" size="70" />
                </div>
              </td>
            </tr>

            <tr>
              <td>
                <div align="left"><strong>Nhập loại tin tức en</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="thuocloai_en" type="text" id="thuocloai_ban2" value="<?php echo "$thuocloai_en"; ?>" size="70" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="center"></div>
              </td>
              <td>
                <div align="left">
                  <input name="luu" type="submit" id="luu" value="Lưu Lại" />
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