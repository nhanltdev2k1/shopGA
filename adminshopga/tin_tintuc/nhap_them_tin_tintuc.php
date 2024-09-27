<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Nhập Thêm Danh Mục Sản Phẩm</title>
  <script type="text/javascript" src="fckeditor/fckeditor.js"></script>
  <style type="text/css">
    <!--
    body,
    td,
    th {
      /*font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color:#FFFFFF;*/
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

  <script type="text/javascript">
    function checkInput() {
      var isOk = true;
      // if(document.tt_mh.txt_masp.value=="")
      //{
      //  alert("Hãy nhập mã sản phẩm");
      // isOk = false;
      // }
      if (document.tt_mh.txt_sanpham.value == "") {
        alert("Hãy nhập tên sản phẩm");
        isOk = false;
      }
      if (document.tt_mh.txt_hinhanh.value == "") {
        alert("Hãy nhập thông tin hình ảnh sản phẩm");
        isOk = false;
      }

      return isOk;
    }
  </script>

  <script type="text/javascript">
    function chuyen_avc(value) {
      //alert("chao");
      var link = "?p=12&macdinh=" + value;
      window.location = link;
    }
  </script>
</head>

<body>
  <table width="780" height="297" border="1" style="border-collapse:collapse">

    <tr>
      <td width="400" height="22">
        <div align="center"><strong>Thông Báo </strong></div>
      </td>
      <td width="469">
        <div align="center"><strong>Hướng Dẫn </strong></div>
      </td>
    </tr>
    <tr>
      <td height="99" valign="top">
        <?php
        if (isset($_POST['luu'])) {
          $today2 = date("D");
          $today = date("d");
          $today1 = date("m");
          $today3 = date("Y");
          $ngay = " $today/$today1/$today3 ";
          require('db.php');
          $file_name = $_FILES['txt_hinhanh']['name'];
          $file_hinhndab = $_FILES['txt_hinhndab']['name'];
          $random_digit = rand(0000, 9999);
          $tentaptin = $_FILES['txt_hinhanh']['name'];
          $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
          $tieude_en = mysqli_real_escape_string($link, $_POST['tieude_en']);
          $mota = mysqli_real_escape_string($link, $_POST['mota']);
          $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
          $tukhoa = mysqli_real_escape_string($link, $_POST['tukhoa']);
          $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
          $sale = mysqli_real_escape_string($link, !empty($_POST['sale']) ? $_POST['sale'] : 0);
          $hot = mysqli_real_escape_string($link, !empty($_POST['hot']) ? $_POST['hot'] : 0);
          $new = mysqli_real_escape_string($link, !empty($_POST['new']) ? $_POST['new'] : 0);
          $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
          $thuocloai = $_POST['cap_do'];
          $danhmuc = '1';
          $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude_en'])));
          upload($noidung, $tentaptin, $tieude, $mota, $trangchu, $thuocloai, $tieude_en, $title, $tukhoa, $tukhoa2, $ngay, $linkurl);
        }

        function upload($noidung, $tentaptin, $tieude, $mota, $trangchu, $thuocloai, $tieude_en, $title, $tukhoa, $tukhoa2, $ngay, $linkurl)
        {
          require('db.php');

          // Xử lý đặc biệt với ký tự trong câu truy vấn
          $truyvan = "INSERT INTO tin_tintuc (`hinhanh`,`hinhndab`,`noidung`,`trangchu`,`mota`,`tieude`, `tieude_en`, `title`, `tukhoa`,`tukhoa2`,`ngay`,`linkurl`,`thuocloai`,`moi`) VALUES ( '$tentaptin','', '$noidung', '$trangchu', '$mota','$tieude', '$tieude_en', '$title', '$tukhoa','$tukhoa2','$ngay', '$linkurl','$thuocloai','0')";

          $ketqua_truyvan = mysqli_query($link, $truyvan);
          if ($ketqua_truyvan) {
            if ($tentaptin != '') {
              dichuyen_taptin_vaothumuc($tentaptin);
            }
            echo "Upload thành công";
          } else {
            echo "Upload không thành công.Bạn thử lại xem";
          }
        }
        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tentaptin"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tentaptin);
            echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
          }
        }

        function dichuyen_hinhqcab_vaothumuc($tenhinhqcab)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhqcab']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tenhinhqcab"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenhinhqcab);
            echo "Không thể copy tập tin  $tenhinhqcab vào thư mục tài liệu";
          }
        }
        function dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhqcabc']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tenhinhqcabc"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenhinhqcabc);
            echo "Không thể copy tập tin  $tenhinhqcabc vào thư mục tài liệu";
          }
        }

        function dichuyen_hinhndab_vaothumuc($tenhinhndab)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhndab']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tenhinhndab"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenhinhndab);
            echo "Không thể copy tập tin  $tenhinhndab vào thư mục tài liệu";
          }
        }

        function dichuyen_hinhndabc_vaothumuc($tenhinhndabc)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhndabc']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tenhinhndabc"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenhinhndabc);
            echo "Không thể copy tập tin  $tenhinhndabc vào thư mục tài liệu";
          }
        }

        function dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhndabcd']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhTinTuc/$tenhinhndabcd"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenhinhndabcd);
            echo "Không thể copy tập tin  $tenhinhndabcd vào thư mục tài liệu";
          }
        }
        function xoataptin($tentaptin)
        {
          require('db.php');
          global $link;
          $tentaptin = mysqli_real_escape_string($link, $tentaptin);
          $truyvan = "DELETE FROM maykhoanda WHERE filename = '$tentaptin'";
          $ketqua_truyvan = mysqli_query($link, $truyvan);
          if ($ketqua_truyvan) {
            echo "File deleted successfully.";
          } else {
            echo "Error deleting file: " . mysqli_error($link);
          }
        }
        ?>
        <?php
        include('db.php');
        //$noi_dung=str_replace("\d","",$noi_dung);
        //echo $noi_dung;echo"<hr>";
        function hop_option()
        {
          include('db.php');
          $tv = "select * from loai_tin_tintuc ORDER BY id ASC";
          $tv_1 = mysqli_query($link, $tv);
          echo "<select name=\"cap_do\">";
          echo "<option value=\"\">--- Chọn loại tin tức---</option>";
          while ($tv_2 = mysqli_fetch_array($tv_1)) {
            echo "<option value=" . $tv_2['id'] . ">";
            echo $tv_2['thuocloai'];
            echo "</option>";
          }
          echo "</select>";
        }
        ?>

      </td>
      <td valign="top">
        <p><br />

          <span class="style3">1. </span><em><strong>Hình đưa vào phải đúng kích cở (200x203)hoặc lớn hơn một ít cũng được, không được quá lớn sẽ làm lỗi hình tốt nhất nên thêm hình vào ở định dạng .jpg</strong></em><br />
          <br />
      </td>
    </tr>
    <tr>
      <td height="80" colspan="2" align="center" valign="top">
        <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh" onsubmit="return checkInput();">
          <table width="100%" border="1" bordercolor="black" style="border-collapse:collapse; border-color:red;">
            <tr>
              <td width="121">
                <div align="left"><strong>Chọn loại tin tức </strong></div>
              </td>
              <td width="476">
                <div align="left">
                  <?php hop_option(); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td width="142" align="left" valign="top">
                <div align="left"><strong>Hình ảnh</strong><br /> KT 800 X 500 PX </div>
              </td>
              <td width="610">
                <div align="left">
                  <label>
                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Tiêu đề</strong> </div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tieude_en" type="text" id="tieude_en" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <div align="left"><strong>Mô tả Ngắn</strong> </div>
              </td>
              <td>
                <div align="left">
                  <label></label>

                  <textarea name="mota" id="textarea" cols="70" rows="5" maxlength="260"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Từ khóa 1 </strong> </div>
              </td>
              <td>
                <div align="left">

                  <label>
                    <input name="tukhoa" type="text" id="tukhoa" size="90" maxlength="160" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Từ khóa 2 </strong> </div>
              </td>
              <td>
                <div align="left">

                  <label>
                    <input name="tukhoa2" type="text" id="tukhoa2" size="90" maxlength="160" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td height="auto" valign="top">
                <div align="left"><strong>Nội dung chi tiết</strong></div>
              </td>
              <td>
                <div align="left">
                  <textarea name="txt_noidung" id="content_vi"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="right"></div>
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