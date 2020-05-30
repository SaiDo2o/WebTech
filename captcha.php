<?php
    session_start();
    $randnum = rand(1000, 9999);
    $_SESSION['randnum'] = md5($randnum);

    $img = imagecreatetruecolor(150, 65);

    $white = imagecolorallocate($img, 255, 255, 255);
    $grey = imagecolorallocate($img, 128, 128, 128);

    $font = dirname(__FILE__) . "/font/Font.otf";
    imagettftext($img, 35, 3, 21, 50, $grey, $font, $randnum);
    imagettftext($img, 36, 7, 14, 54, $white, $font, $randnum);

    header("Expires: Fri, 8 May 2020 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");

    header ("Content-type: image/gif");
    imagegif($img);
    imagedestroy($img);
?>