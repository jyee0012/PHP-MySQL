<?php

$im = imagecreatefromjpeg("img/bird.jpg");


header("Content-type: image/jpg");

imagejpeg($im);

imagedestroy($im);

?>