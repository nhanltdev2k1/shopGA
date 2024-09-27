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





        /*$today2 = date("y") ;*/



        if (isset($_POST['luu'])) {

          $today2 = date("D");

          $today = date("d");

          $today1 = date("m");

          $today3 = date("Y");

          /*if($today2=='Mon')

		$thu='Thứ 2';

	if($today2=='Tue')

		$thu='Thứ 3';

	if($today2=='Wed')

		$thu='Thứ 4';

	if($today2=='Thu')

		$thu='Thứ 5';

	if($today2=='Fri')

		$thu='Thứ 6';

	if($today2=='Sat')

		$thu='Thứ 7';

	if($today2=='Sun')

		$thu='Chủ Nhật';*/

          $chuoi = " $today/$today1/$today3 ";

          require('database.php');
          require('db.php');

          $tentaptin =  $_FILES['txt_hinhanh']['name'];
        

          $tieude = str_replace("'", "", $_POST['tieude']);

          $mota = str_replace("'", "", $_POST['mota']);

        
          upload($tentaptin, $tieude,   $mota);
        }



        function upload($tentaptin, $tieude,   $mota)

        {
          require('db.php');
          //$ketnoi_maychu = ketnoi_MC();

          //chon_CSDL($ketnoi_maychu);



          $truyvan = "INSERT INTO doi_tac (hinhanh,mota,tieude) VALUES ('" . $tentaptin . "','" . $mota . "','" . $tieude . "')";



          //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
          $ketqua_truyvan = mysqli_query($link, $truyvan);

          if ($ketqua_truyvan) {
            if ($tentaptin != '') {
              dichuyen_taptin_vaothumuc($tentaptin);
            } else {
              echo "Upload thành công.";
            }
          } else {

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

          $tv = "select * from loai_doi_tac where phanloai like '1' ORDER BY id ASC";

          $tv_1 = mysqli_query($link, $tv);

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

            <!--<tr>

          <td valign="top"><div align="left"><strong>Mô tả en </strong></div></td>

          <td><div align="left">

              <label></label>

              <textarea name="mota_en" id="textarea" cols="70" rows="5"></textarea>

          </div></td>

        </tr> -->



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