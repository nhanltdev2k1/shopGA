<?php
$link = @mysqli_connect('localhost', 'root', '', 'shopga_data');

if (!$link) {

    die('Not connected : ' . mysqli_connect_error());
}



// make foo the current db

$db_selected = @mysqli_select_db($link, 'shopga_data');

if (!$db_selected) {

    die('Can\'t use foo : ' . mysqli_error($link));
}

@mysqli_query($link, 'SET NAMES "UTF8"');
