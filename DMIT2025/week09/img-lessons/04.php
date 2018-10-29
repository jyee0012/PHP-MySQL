<?php 
$image = imagecreate(200,200);

$green = imagecolorallocate($image, 0, 255, 0);
$red = imagecolorallocate($image, 255, 0, 0);

$points = array(100, 10, 150, 50, 160, 80, 10, 150, 100, 10);
$vertices = count($points)/2;

imagefilledpolygon($image, $points, $vertices, $red);

header("Content-type: image/png");

imagepng($image);

imagedestroy($image);

?>