<?php

$im = imagecreatefromjpeg("img/horse.jpg");

imagegammacorrect($im, 1.0, 3.0);

/**
 * To save(create) a file on the server - 4 steps
 * 1) We add the file path/filename as the 2nd parameter of our output (imagejpeg($im, "test.jpg");)
 * 2) We MUST remove the header as we are NOT displaying the image data, but creating an image file instead.
 * 3) We must remember that we will NOT be able to see anything in our php file unless we display the outputted file.
 * 4) We MAY have to change folder permissions to allow PHP to create a new file. CHMOD
 */


imagepng($im);

imagedestroy($im);

?>