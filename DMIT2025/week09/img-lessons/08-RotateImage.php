<?php

$filename = "img/dog.jpg";
$degrees = 90;

$source = imagecreatefromjpeg($filename);

$rotate = imagerotate($source, $degrees,0);

header("Content-type: image/jpg");

imagejpeg($rotate);

imagedestroy($source);

?>