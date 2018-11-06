<?php 
$image = imagecreate(200,200);

$green = imagecolorallocate($image, 0, 255, 0);

imagefill($image, 0,0,$green);

header("Content-type: image/png");

imagepng($image);

imagedestroy($image);

?>