<?php

$image = imagecreatfromjpeg("img/butterfly.jpg");

$width = imagesx($image);
$height = imagesy($image);

$ratio = $width/$height;

// echo "Width: $width | Height: $height | Ratio: $ratio";

$new_width = 250; // our desired output width

$new_height = $new_width/$ratio;

$image_resized = imagecreatetruecolor($new_width,$new_height);

// Always use imagecopyresampled, and NEVER use imagecopyresized

imagecopyresampled($image_resized,$image,0,0,0,0,$new_width,$new_height,$width,$height);

imagejpeg($image_resized, "butterfly_resized.jpg");

imagedestroy($image);
imagedestroy($image_resized);

?>