<?php

function ketnoi_MC()
{
  $ketnoi_maychu = @mysqli_connect('localhost', 'root', '', 'shopga_data');

  if (!$ketnoi_maychu) {
    $loi = "Không thể kết nối với máy chủ: " . mysqli_connect_error();
    echo $loi;
  }

  return $ketnoi_maychu;
}

function chon_CSDL($ketnoi_MC)
{
  $CSDL = mysqli_select_db($ketnoi_MC, 'shopga_data');

  return $CSDL;
}

function truyvan($ketnoi_MC, $SQL)
{
  $cautruyvan = $SQL;
  $ketqua = mysqli_query($ketnoi_MC, $cautruyvan);

  return $ketqua;
}