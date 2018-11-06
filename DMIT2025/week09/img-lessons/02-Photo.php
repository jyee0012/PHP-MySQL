<?php

$im = imagecreatefromjpeg("img/horse.jpg");

imagegammacorrect($im, 1.0, 3.0);

header("Content-type: image/jpeg");

imagepng($im);

imagedestroy($im);

?>