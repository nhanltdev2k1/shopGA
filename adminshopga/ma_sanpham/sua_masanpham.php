<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
  <table width="61%" height="530" border="1" bordercolor="#0000FF" style="border-collapse:collapse">
    <tr>
      <td width="206" height="22">
        <div align="center"><strong>Thông Báo </strong></div>
      </td>
      <td width="202">
        <div align="center"><strong>Hướng Dẫn </strong></div>
      </td>
    </tr>
    <tr>
      <td height="112" valign="top">
        <?php
        if (isset($_POST["luu"])) {
            $today = date("d/m/Y");
            include "db.php";
            $id = $_REQUEST["id"];
            $tentaptin = $_FILES["txt_hinhanh"]["name"];
            
            // Handle file image if not uploaded, use the hidden field's value
            if ($tentaptin == "") {
                $tentaptin = $_POST["txt_hinhanh_hide"];
            }
    
            // Escape special characters for all text inputs
            $loai = mysqli_real_escape_string($link, $_POST["thuocloai"]);
            $tieude = mysqli_real_escape_string($link, $_POST["tieude"]);
            $mota = mysqli_real_escape_string($link, $_POST["mota"]);
            $noidung = mysqli_real_escape_string($link, $_POST["txt_noidung"]);
            $giagoc = mysqli_real_escape_string($link, $_POST["giagoc"]);
            $giaban = mysqli_real_escape_string($link, $_POST["giaban"]);
            $tukhoa1 = mysqli_real_escape_string($link, $_POST["tukhoa1"]);
            $tukhoa2 = mysqli_real_escape_string($link, $_POST["tukhoa2"]);
            $sale = !empty($_POST['sale']) ? mysqli_real_escape_string($link, $_POST['sale']) : 0;
            $hot = !empty($_POST['hot']) ? mysqli_real_escape_string($link, $_POST['hot']) : 0;
            $new = !empty($_POST['new']) ? mysqli_real_escape_string($link, $_POST['new']) : 0;
    
            // Convert title to URL-friendly slug
            $linkurl = mysqli_real_escape_string($link, strtolower(khongdau(str_replace("'", "", $_POST["tieude"]))));
    
            // Call the function to update the product
            upload($loai, $tentaptin, $tieude, $mota, $noidung, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $today, $linkurl, $id);
        }
    
        function upload($loai, $tentaptin, $tieude, $mota, $noidung, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $linkurl, $id) {
            require "db.php";
    
            // SQL query for updating the product
            $truyvan = "UPDATE ma_sanpham 
                        SET thuocloai='$loai', hinhanh='$tentaptin', tieude='$tieude', mota='$mota', noidung='$noidung', 
                            giagoc='$giagoc', giaban='$giaban', tukhoa1='$tukhoa1', tukhoa2='$tukhoa2', sale='$sale', 
                            hot='$hot', new='$new', ngay='$ngay', linkurl='$linkurl' 
                        WHERE id='$id'";
    
            $ketqua_truyvan = mysqli_query($link, $truyvan);
            if ($ketqua_truyvan) {
                // Move the uploaded image to the appropriate folder
                dichuyen_taptin_vaothumuc($tentaptin);
                echo "Upload thành công. Bạn thử lại xem";
                echo "<script>window.location='quan_tri.php?p=danhsach_masanpham&page=" . $_GET["page"] . "'</script>";
            } else {
                echo "Upload không thành công. Bạn thử lại xem";
            }
        }
    
        // Function to move the uploaded file to the designated folder
        function dichuyen_taptin_vaothumuc($tentaptin) {
            $thumuctam_chuataptin = $_FILES["txt_hinhanh"]["tmp_name"];
            if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tentaptin")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
            } else {
                echo "Upload không thành công";
            }
        }
    
        // Optional: Delete file function if needed
        function xoataptin($tentaptin, $link) {
            $tentaptin = mysqli_real_escape_string($link, $tentaptin);
            $truyvan = "DELETE FROM maykhoanda WHERE id = '$tentaptin'";
            $ketqua_truyvan = mysqli_query($link, $truyvan);
            if ($ketqua_truyvan) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . mysqli_error($link);
            }
        }
        ?>
      </td>
      <td valign="top" align="left">
        <p><span class="style3">1.</span> <em><strong>Hình ảnh phải nhập đúng kích cở (300x400) hoặc lớn hơn một ít, tránh tình trạng hình nhỏ làm bung ra nhòe. Tốt nhất nên để định dạng .jpg</strong></em><br/><br/><br/>
      </td>
    </tr>
    <tr>
      <td height="203" colspan="2" align="center" valign="top">
        <?php
        include "db.php";
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM ma_sanpham where id like '$id' ");
        $row_dulieu_sua = mysqli_fetch_array($result);

        $tieude = $row_dulieu_sua["tieude"];
        $mota = $row_dulieu_sua["mota"];
        $hinhanh = $row_dulieu_sua["hinhanh"];
        $noidung = $row_dulieu_sua["noidung"];
        $giagoc = $row_dulieu_sua["giagoc"];
        $giaban = $row_dulieu_sua["giaban"];
        $tukhoa1 = $row_dulieu_sua["tukhoa1"];
        $tukhoa2 = $row_dulieu_sua["tukhoa2"];
        $sale = $row_dulieu_sua["sale"];
        $hot = $row_dulieu_sua["hot"];
        $new = $row_dulieu_sua["new"];
        $ngay = $row_dulieu_sua["ngay"];
        ?>
        <form action='' method='post' enctype='multipart/form-data' name='tt_mh' id='tt_mh' onsubmit='return checkInput();'>
          <table width='97%' border='1' bordercolor='black' style='border-collapse:collapse'>
            <tr>
              <td>
                <div align="left"><strong>Chọn loại sản phẩm</strong></div>
              </td>
              <td>
                <?php
                $id = $_REQUEST["id"];
                $sq = mysqli_query($link, "SELECT * FROM ma_sanpham where id=" . $id . "");
                $loai = mysqli_fetch_array($sq);
                ?>
                <select name="thuocloai">
                  <?php
                  $selected = "";
                  $sql = mysqli_query($link, "SELECT * FROM loai_ma_sanpham ORDER BY id DESC");
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
            </tr>
            <tr>
              <td width="126">
                <div align="left"><strong>Hình ảnh</strong></div>
              </td>
              <td width="333">
                <div align="left">
                  <label>
                    <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="40" />
                    <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh" value="<?php echo "$hinhanh"; ?>" size="40" />
                  </label>
                  <br />
                  <?php echo "<img src='../HinhCTSP/HinhSanPham/$hinhanh' width='60' height='50' />"; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Tên Sản Phẩm</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="tieude" type="text" id="tieude" value="<?php echo "$tieude"; ?>" size="120" />
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <div align="left"><strong>Mô Tả </strong> </div>
              </td>
              <td>
                <div align="left">
                  <label></label>
                  <textarea name="mota" cols="117" rows="5" id="mota"><?php echo "$mota"; ?></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Từ khóa 1</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="tukhoa1" type="text" id="tukhoa1" value="<?php echo "$tukhoa1"; ?>" size="50" />
                </div>
              </td>
            </tr>
            
            <tr>
              <td>
                <div align="left"><strong>Từ khóa 2</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="tukhoa2" type="text" id="tukhoa2" value="<?php echo "$tukhoa2"; ?>" size="50" />
                </div>
              </td>
            </tr>
            <tr>
              <td valign="top">
                <div align="left"><strong>Giá gốc </strong> </div>
              </td>
              <td>
                <div align="left">
                  <input name="giagoc" type="text" id="giagoc" value="<?php echo "$giagoc"; ?>" size="10" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Giá bán</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="giaban" type="text" id="giaban" value="<?php echo "$giaban"; ?>" size="10" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Sale</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="sale" type="text" id="sale" value="<?php echo "$sale"; ?>" size="10" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Hot</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="hot" type="text" id="hot" value="<?php echo "$hot"; ?>" size="10" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>New</strong></div>
              </td>
              <td>
                <div align="left">
                  <input name="new" type="text" id="new" value="<?php echo "$new"; ?>" size="10" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div align="left"><strong>Nội dung</strong></div>
              </td>
              <td>
                <div align="left">
                  <textarea name="txt_noidung" id="txt_noidung" rows="10" cols="50"><?php echo htmlspecialchars($noidung); ?></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td height="28">
                <div align="center"></div>
              </td>
              <td>
                <div align="left">
                  <input name="luu" style="width:100px; color: red;" type="submit" id="luu" value="Lưu Lại" />
                </div>
              </td>
            </tr>
          </table>
        </form>
      </td>
    </tr>
  </table>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    CKEDITOR.replace('txt_noidung', {
      uiColor: '#e7e7e7',
      language: 'en',
      skin: 'moono',
      width: 'auto',
      height: 350,
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
      filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
  });
</script>

</html>