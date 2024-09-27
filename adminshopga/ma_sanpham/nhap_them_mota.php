<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Nhập Thêm Loại Phòng</title>

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
    function checkInput()

    {

      var isOk = true;

      // if(document.tt_mh.txt_masp.value=="")

      //{

      //  alert("Hãy nhập mã sản phẩm");

      // isOk = false;

      // }

      if (document.tt_mh.txt_gioithieu.value == "")

      {

        alert("Hãy nhập tên sản phẩm");

        isOk = false;

      }

      if (document.tt_mh.txt_hinhanh.value == "")

      {

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

      <td height="99" valign="top"><?php





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

                                      $file_name = $_FILES['txt_hinhanh']['name'];


                                      $random_digit = rand(0000, 9999);

                                      $tentaptin = $random_digit . $file_name;

                                      upload($phong, $tentaptin);
                                    }



                                    function upload($phong, $tentaptin)

                                    {

                                      $ketnoi_maychu = ketnoi_MC();

                                      chon_CSDL($ketnoi_maychu);


                                      $phong = $_POST['phong'];
                                      $truyvan = "INSERT INTO mota_khachsan(phong,hinhanh) VALUES ('$phong','$tentaptin')";

                                      $ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);

                                      if ($ketqua_truyvan) {

                                        dichuyen_taptin_vaothumuc($tentaptin);

                                        //dichuyen_logo_vaothumuc($tenlogo);

                                        //dichuyen_hinhab_vaothumuc($tenhinhab);

                                        //dichuyen_hinhabc_vaothumuc($tenhinhabc);

                                        //dichuyen_hinhabcd_vaothumuc($tenhinhabcd);

                                        //dichuyen_hinhqcab_vaothumuc($tenhinhqcab);

                                        //dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc);

                                        //dichuyen_hinhndab_vaothumuc($tenhinhndab);

                                        //dichuyen_hinhndabc_vaothumuc($tenhinhndabc);

                                        //dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd);



                                      } else {

                                        echo "Upload không thành công.Bạn thử lại xem";
                                      }

                                      mysql_close($ketnoi_maychu);
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





                                    function dichuyen_logo_vaothumuc($tenlogo)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenlogo"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenlogo);

                                        echo "Không thể copy tập tin  $tenlogo vào thư mục tài liệu";
                                      }
                                    }







                                    function dichuyen_hinhab_vaothumuc($tenhinhab)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhab']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhab"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhab);

                                        echo "Không thể copy tập tin  $tenhinhab vào thư mục tài liệu";
                                      }
                                    }







                                    function dichuyen_hinhabc_vaothumuc($tenhinhabc)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhabc']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhabc"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhabc);

                                        echo "Không thể copy tập tin  $tenhinhabc vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhabcd_vaothumuc($tenhinhabcd)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhabcd']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhabcd"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhabcd);

                                        echo "Không thể copy tập tin  $tenhinhabcd vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhqcab_vaothumuc($tenhinhqcab)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhqcab']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhqcab"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhqcab);

                                        echo "Không thể copy tập tin  $tenhinhqcab vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhqcabc_vaothumuc($tenhinhqcabc)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhqcabc']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhqcabc"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhqcabc);

                                        echo "Không thể copy tập tin  $tenhinhqcabc vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhndab_vaothumuc($tenhinhndab)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhndab']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhndab"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhndab);

                                        echo "Không thể copy tập tin  $tenhinhndab vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhndabc_vaothumuc($tenhinhndabc)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhndabc']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhndabc"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhndabc);

                                        echo "Không thể copy tập tin  $tenhinhndabc vào thư mục tài liệu";
                                      }
                                    }



                                    function dichuyen_hinhndabcd_vaothumuc($tenhinhndabcd)

                                    {

                                      $thumuctam_chuataptin = $_FILES['txt_hinhndabcd']['tmp_name'];

                                      if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tenhinhndabcd"))

                                        echo "Chúc mừng bạn Upload thành công";

                                      else {

                                        xoataptin($tenhinhndabcd);

                                        echo "Không thể copy tập tin  $tenhinhndabcd vào thư mục tài liệu";
                                      }
                                    }

                                    function xoataptin($tentaptin)

                                    {

                                      $ketnoi_maychu = ketnoi_MC();

                                      chon_CSDL($ketnoi_maychu);

                                      $masotaptin = mysql_insert_id();

                                      $truyvan = "DELETE FROM ma_dichvu WHERE id = $masotaptin ";

                                      $ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
                                    }

                                    ?>

        <?php



        include('db.php');





        //$noi_dung=str_replace("\d","",$noi_dung);

        //echo $noi_dung;echo"<hr>";



        function hop_option()

        {

          $tv = "select * from ma_sanpham ORDER BY id ASC";

          $tv_1 = mysql_query($tv);

          echo "<select name=\"phong\">";

          echo "<option value=\"\">--- Chọn loại HTPP---</option>";

          while ($tv_2 = mysql_fetch_array($tv_1)) {

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



          <span class="style3">1. </span><em><strong>Hình đưa vào phải đúng kích cở (200x203)hoặc lớn hơn một ít cũng được, không được quá lớn sẽ làm lỗi hình tốt nhất nên thêm hình vào ở định dạng .jpg</strong></em><br />

          <br />

      </td>

    </tr>

    <tr>

      <td height="80" colspan="2" align="center" valign="top">
        <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh" onsubmit="return checkInput();">

          <table width="100%" border="1" bordercolor="black" style="border-collapse:collapse; border-color:#FF0000">
            <tr>
              <td></td>
              <td><?php hop_option(); ?></td>
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

</html>