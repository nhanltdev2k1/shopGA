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
          $tentaptin = $_FILES['txt_hinhanh']['name'];
          $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
          $mota = mysqli_real_escape_string($link, $_POST['mota']);
          $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
          $trangchu = $_POST['trangchu'];
          $tukhoa1 = mysqli_real_escape_string($link, $_POST['tukhoa1']);
          $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
          $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
          $thuocloai = $_POST['cap_do'];
          $danhmuc = '1';
          $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
          upload($noidung, $tentaptin, $tieude,$mota, $trangchu,$linkurl, $tukhoa1, $tukhoa2);
        }

        function upload($noidung, $tentaptin, $tieude,   $mota, $trangchu,$linkurl, $tukhoa1, $tukhoa2)
        {
            require('db.php');
            
            // Xử lý đặc biệt với ký tự trong câu truy vấn
            $truyvan = "INSERT INTO gioi_thieu (hinhanh,noidung,mota,tieude,trangchu,linkurl,tukhoa1,tukhoa2) VALUES ('".$tentaptin."','".$noidung."','".$mota."','".$tieude."', '".$trangchu."','".$linkurl."','".$tukhoa1."','".$tukhoa2."')";
            
            $ketqua_truyvan = mysqli_query($link, $truyvan);
        if ($ketqua_truyvan){
           if($tentaptin!='')
		   {
            dichuyen_taptin_vaothumuc($tentaptin);
		  }else{
		    echo "Upload thành công.";
		  }
          }else{
            echo "Upload không thành công.Bạn thử lại xem";
          mysqli_close($ketnoi_maychu);
		  }
        }
        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin"))
            echo "Chúc mừng bạn Upload thành công";
          else {
            xoataptin($tentaptin);
            echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
          }
        }
        function xoataptin($tentaptin)
        {
          $ketnoi_maychu = ketnoi_MC();
          chon_CSDL($ketnoi_maychu);
          $masotaptin = mysqli_insert_id();
          $truyvan = "DELETE FROM sanpham WHERE id = $masotaptin ";
          $ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
        }
        ?>
        <?php
        include('db.php');
        //$noi_dung=str_replace("\d","",$noi_dung);
        //echo $noi_dung;echo"<hr>";
        function hop_option()
        {

          $tv = "select * from loai_gioi_thieu where phanloai like '1' ORDER BY id ASC";

          $tv_1 = mysqli_query($link,$tv);

          echo "<select name=\"cap_do\">";

          echo "<option value=\"\">--- Chọn loại sản phẩm ---</option>";

          while ($tv_2 = mysqli_fetch_array($tv_1)) {

            echo "<option value=\"$tv_2[id]\" >";

            echo $tv_2['thuocloai'];

            echo "</option>";

          }

          echo "</select>";

        }

        ?></td>

      <td valign="top">

        <p><br />



          <span class="style3">1. </span><em><strong>Hình đưa vào phải đúng kích cở (200x203)hoặc lớn hơn một ít cũng được, không được quá lớn sẽ làm lỗi hình tốt nhất nên thêm hình vào ở định dạng .jpg</strong></em><br />

          <br />

      </td>

    </tr>

    <tr>

      <td height="80" colspan="2" align="center" valign="top">

        <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh" onsubmit="return checkInput();">

          <label></label>

          <table width="768" border="1" bordercolor="black" style="border-collapse:collapse; border-color:#FF0000">

            <!-- <tr>

         <td><div align="left"><strong>Chọn loại sản phẩm</strong></div></td>

         <td><div align="left">

           <?php //hop_option(); 

            ?>

           </div></td>

       </tr>-->

            <tr>

              <td width="142" align="left" valign="top">

                <div align="left"><strong>Hình ảnh</strong> </div>

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

                    <input name="tieude" type="text" id="tieude2" size="90" maxlength="150" />

                  </label>

                </div>

              </td>

            </tr>

            <!--<tr>

          <td><div align="left"><strong>Title</strong></div></td>

          <td><div align="left">

              <label>

              <input name="title" type="text" id="tieude4" size="90"  maxlength="70"/>

              </label>

          </div></td>

        </tr>

        <tr>

          <td><div align="left"><strong>Keywords</strong> </div></td>

          <td><div align="left">

              <label>

              <textarea name="key" cols="70" id="tieude"></textarea>

              </label>

          </div></td>

        </tr>

        <tr>

          <td><div align="left"><strong>Discription</strong> </div></td>

          <td><div align="left">

              <label>

              <textarea name="discription" cols="70" id="tieude3"></textarea>

              </label>

          </div></td>

        </tr>-->

            <!--<tr>

          <td><div align="left"><strong>Tiêu đề en </strong></div></td>

          <td><div align="left">

              <label>

              <input name="tieude_en" type="text" id="tieude2" size="90"  maxlength="70"/>

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



                  <textarea name="mota" id="textarea" cols="70" rows="5" maxlength="250"></textarea>

                </div>

              </td>

            </tr>
            <tr>
    
              <td><div align="left"><strong>Từ khoá 1</strong> </div></td>
    
              <td><div align="left">
    
                  <label>
    
                  <textarea name="tukhoa1" cols="70" id="tukhoa1"></textarea>
    
                  </label>
    
              </div></td>
    
            </tr>
            
            <tr>
    
              <td><div align="left"><strong>Từ khoá 2</strong> </div></td>
    
              <td><div align="left">
    
                  <label>
    
                  <textarea name="tukhoa2" cols="70" id="tukhoa2"></textarea>
    
                  </label>
    
              </div></td>
    
            </tr>

            <!--<tr>

          <td valign="top"><div align="left"><strong>Mô tả en </strong></div></td>

          <td><div align="left">

              <label></label>

              <textarea name="mota_en" id="textarea" cols="70" rows="5"></textarea>

          </div></td>

        </tr> -->

            <tr>

              <td>

                <div align="left"><strong>Trang chủ</strong></div>

              </td>

              <td align="left"><label>

                  <select name="trangchu" id="select3">

                    <option value="1">Có </option>

                    <option value="2">Không</option>

                  </select>

                </label></td>

            </tr>

            <!--   <tr>

          <td><div align="left"><strong>Tiêu đề</strong> <strong>EN</strong></div></td>

          <td><div align="left">

              <label>

              <input name="tieude_en" type="text" id="tieude_en" size="90"  maxlength="70"/>

              </label>

          </div></td>

        </tr>-->

            <!--<tr>

          <td height="84"><div align="left"><strong>Nội dung nhỏ</strong> <strong>EN</strong></div></td>

          <td><div align="left">

              <label>

              <textarea name="noidungnho_en" cols="90" rows="5" id="noidungnho_en"></textarea>

              </label>

          </div></td>

        </tr>-->

            <tr>

              <td height="40" valign="top">

                <div align="left"><strong>Nội dung

                    <?php xuat_select("luan", "suc"); ?>

                  </strong></div>

                 

              </td>

              <td>

                <div align="left">

                  <div id="div_vn_afc">
                 <textarea name="txt_noidung" id="content_vi"></textarea> 
                 <!--
                    <script type="text/javascript">

                      var oFCKeditor = new FCKeditor('txt_noidung');

                      oFCKeditor.BasePath = "fckeditor/";

                      oFCKeditor.Width = 700;

                      oFCKeditor.Height = 300;

                      oFCKeditor.Value == "";

                      oFCKeditor.Config["EnterMode"] = "br";

                      oFCKeditor.Create();

                      document.getElementById('xEnter').value = "br";

                      //document.getElementById("noidung").value=jljl;

                    </script>
-->
                  </div>

                  <div id="div_en_afc" style="display:none">

                    <script type="text/javascript">

                      var oFCKeditor = new FCKeditor('txt_noidung_en');

                      oFCKeditor.BasePath = "fckeditor/";

                      oFCKeditor.Width = 700;

                      oFCKeditor.Height = 300;

                      oFCKeditor.Value == "";

                      oFCKeditor.Config["EnterMode"] = "br";

                      oFCKeditor.Create();

                      document.getElementById('xEnter').value = "br";

                      //document.getElementById("noidung").value=jljl;

                    </script>

                  </div>

                </div>

              </td>

            </tr>

            <!--<tr>

          <td height="40" valign="top"><div align="left"><strong>Nội dung EN</strong></div>          </td>

          <td><div align="left">

              <script type="text/javascript">

										var oFCKeditor = new FCKeditor('txt_noidungnho_en');

										oFCKeditor.BasePath = "fckeditor/";

										oFCKeditor.Width	= 700 ;

										oFCKeditor.Height	= 300 ;

										oFCKeditor.Value=="";

										oFCKeditor.Config["EnterMode"]		= "br" ;

										oFCKeditor.Create();

										document.getElementById('xEnter').value = "br" ;

										//document.getElementById("noidung").value=jljl;

									</script>

          </div></td>

        </tr>-->

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