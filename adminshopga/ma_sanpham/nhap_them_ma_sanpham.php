<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <script type="text/javascript">
    function checkInput() {
      var isOk = true;
      // if(document.tt_mh.txt_masp.value=="")
      //{
      //  alert("Hãy nhập mã sản phẩm");
      // isOk = false;
      // }
      if (document.tt_mh.txt_gioithieu.value == "") {
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
</head>

<body>
  <table width="780" height="297" border="1" style="border-collapse:collapse">
    <tr>
      <td width="344" height="22">
        <div align="center"><strong>Thông Báo </strong></div>
      </td>
      <td width="420">
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
          $tentaptin = $_FILES['txt_hinhanh']['name'];
          $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
          $mota = mysqli_real_escape_string($link, $_POST['mota']);
          $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
          $giagoc = mysqli_real_escape_string($link, $_POST['giagoc']);
          $giaban = mysqli_real_escape_string($link, $_POST['giaban']);
          $tukhoa1 = mysqli_real_escape_string($link, $_POST['tukhoa1']);
          $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
          $sale = mysqli_real_escape_string($link, !empty($_POST['sale']) ? $_POST['sale'] : 0);
          $hot = mysqli_real_escape_string($link, !empty($_POST['hot']) ? $_POST['hot'] : 0);
          $new = mysqli_real_escape_string($link, !empty($_POST['new']) ? $_POST['new'] : 0);
          $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
          $thuocloai = $_POST['cap_do'];
          $danhmuc = '1';
          $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
          upload($tentaptin, $mota, $noidung, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $tieude, $thuocloai, $linkurl);
        }

        function upload($tentaptin, $mota, $noidung, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $tieude, $thuocloai, $linkurl)
        {
            require('db.php');
            
            // Xử lý đặc biệt với ký tự trong câu truy vấn
            $truyvan = "INSERT INTO ma_sanpham(tieude,hinhanh,mota,noidung,giagoc,giaban,tukhoa1,tukhoa2,sale,hot,new,ngay,thuocloai,noibat,banchay,khuyenmai,linkurl) 
                        VALUES('$tieude','$tentaptin','$mota','$noidung','$giagoc','$giaban','$tukhoa1','$tukhoa2','$sale','$hot','$new','$ngay','$thuocloai','0','0','0','$linkurl')";
            
            $ketqua_truyvan = mysqli_query($link, $truyvan);
            if ($ketqua_truyvan) {
                dichuyen_taptin_vaothumuc($tentaptin);
                echo "<script>window.location='quan_tri.php?p=danhsach_masanpham'</script>";
            } else {
                echo "Upload không thành công. Bạn thử lại xem";
            }
        }

        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tentaptin"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tentaptin);
            echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
          }
        }
        function dichuyen_logo_vaothumuc($tenlogo)
        {
          require('db.php');
          $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenlogo"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tenlogo);
            echo "Không thể copy tập tin  $tenlogo vào thư mục tài liệu";
          }
        }
        function xoataptin($tentaptin)
        {
          require('db.php');
          global $link;
          $tentaptin = mysqli_real_escape_string($link, $tentaptin);
          $truyvan = "DELETE FROM ma_dichvu WHERE filename = '$tentaptin'";
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
        function hop_option()
        {
          include('db.php');
          $tv = "select * from loai_ma_sanpham ORDER BY id ASC";
          $tv_1 = mysqli_query($link, $tv);
          echo "<select name=\"cap_do\">";
          echo "<option value=\"\">--- Chọn loại sản phẩm---</option>";
          while ($tv_2 = mysqli_fetch_array($tv_1)) {
            echo "<option value=\"$tv_2[id]\" >";
            echo $tv_2['thuocloai'];
            echo "</option>";
          }
          echo "</select>";
        }
        function danhmuc_option()
        {
          include('db.php');
          $tv = "select * from danhmuc ORDER BY id ASC";
          $tv_1 = mysqli_query($link, $tv);
          echo "<select name=\"danhmuc\">";
          echo "<option value=\"\">--- Chọn loại HTPP---</option>";
          while ($tv_2 = mysqli_fetch_array($tv_1)) {
            echo "<option value=\"$tv_2[id]\" >";
            echo $tv_2['tieude'];
            echo "</option>";
          }
          echo "</select>";
        }
        ?>
      </td>
      <td valign="top">
        <p><br />
          <span class="style3">1. </span><em><strong>Hình đưa vào phải đúng kích cở (200x203)hoặc lớn hơn một ít cũng
              được, không được quá lớn sẽ làm lỗi hình tốt nhất nên thêm hình vào ở định dạng .jpg</strong></em><br />
          <br />
      </td>
    </tr>
    <tr>
      <td height="80" colspan="2" align="center" valign="top">
        <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh"
          onsubmit="return checkInput();">
          <table width="100%" border="1" bordercolor="black" style="border-collapse:collapse; border-color:#FF0000">
            <tr>
              <td width="121">
                <div align="left"><strong>Chọn loại</strong></div>
              </td>
              <td width="476">
                <div align="left">
                  <?php hop_option(); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Hình ảnh</strong></br>900px x auto </div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="50" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Tên sản phẩm</strong> </div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tieude" type="text" id="tieude" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <div align="left"><strong>Mô tả</strong> </div>
              </td>
              <td>
                <div align="left">
                  <label></label>
                  <textarea name="mota" id="textarea" cols="88" rows="5"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Giá gốc</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="giagoc" type="text" id="giagoc" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Giá bán</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="giaban" type="text" id="giaban" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Từ khoá 1</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tukhoa1" type="text" id="tukhoa1" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Từ khoá 2</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="tukhoa2" type="text" id="tukhoa2" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Sale</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="sale" type="text" id="sale" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> Hot</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="hot" type="text" id="hot" size="90" maxlength="70" />
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong> New</strong></div>
              </td>
              <td>
                <div align="left">
                  <label>
                    <input name="new" type="text" id="new" size="90" maxlength="70" />
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