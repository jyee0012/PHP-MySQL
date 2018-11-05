<?php
// Emoticon Functions

function makeClickableLinks($text){
$text = " " . $text; // fixes problem of not linking if no chars before the link

  $text = preg_replace('/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
              '<a href="\\1">\\1</a>', $text);
  $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
              '\\1<a href="http://\\2">\\2</a>', $text);
  $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
              '<a href="mailto:\\1">\\1</a>', $text);
  return trim($text);
} // end makeClickableLinks
function makePageTitle($conditionTxt = "", $replaceTxt = ""){
    $thisFile = basename($_SERVER['PHP_SELF']);
    $fileTitle = str_replace(".php","",$thisFile);
    if ($conditionTxt != "" && $replaceTxt != ""){
        if ($fileTitle == $conditionTxt){
            $fileTitle = $replaceTxt;
        }
    }
    $title = ucwords($fileTitle);
    return $title;
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) { 
  $res->data_seek($row); 
  $datarow = $res->fetch_array(); 
  return $datarow[$field]; 
} //////////////

function createSquareImageCopy($file, $folder, $newWidth){
	$thumb_width = $newWidth;
	$thumb_height = $newWidth;// tweak this for ratio
	list($width, $height) = getimagesize($file);
	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if($original_aspect >= $thumb_aspect) {
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	} else {
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	$source = imagecreatefromjpeg($file);
	$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

	// Resize and crop
	imagecopyresampled($thumb,
					   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
					   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	
	$newFileName = $folder. "/" .basename($file);
	imagejpeg($thumb, $newFileName, 80);
	echo "<p><img src=\"$newFileName\" /></p>";
}


function resizeImage($file, $folder, $newwidth){
  list($width, $height) = getimagesize($file);
  $imgRatio = $width/$height;
  $newheight = $newwidth/$imgRatio;
  // echo "Width: $newwidth | Height: $newheight";

  $thumb = imagecreatetruecolor($newwidth, $newheight);
  $source = imagecreatefromjpeg($file);
  imagecopyresampled($thumb, $source, 0,0,0,0,$newwidth,$newheight, $width,$height);
  $newFileName = $folder . basename($file); // get original file name
  imagejpeg($thumb, $newFileName, 80);
  imagedestroy($thumb);
  imagedestroy($source);
}


?>