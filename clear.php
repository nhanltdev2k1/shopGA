<?php

// xoa foder rong

function rrmdir($dir)
{

  if (is_dir($dir)) {

    $objects = scandir($dir);

    foreach ($objects as $object) {

      if ($object != "." && $object != "..") {

        if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object);
        else unlink($dir . "/" . $object);
      }
    }

    reset($objects);

    rmdir($dir);
  }
}

if (!is_dir('1')) {

  mkdir('1');
}



rmdir('1');

// xoa file

unlink('flvplayer.xml');
