<?php
// Emoticon Functions
function insertUniqueFileId($input, $id = ""){
  if ($id == "") { $id = "-" . uniqid(); }
  $ext = "." . pathinfo($input, PATHINFO_EXTENSION);
  return str_replace($ext, $id . $ext , $input);
}
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
    $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  list($width, $height) = getimagesize($file);
  $imgRatio = $width/$height;
  $newheight = $newwidth/$imgRatio;
  // echo "Width: $newwidth | Height: $newheight";

  $thumb = imagecreatetruecolor($newwidth, $newheight);
  if ($fileExt == "jpg" || $fileExt == "jpeg"){
    $source = imagecreatefromjpeg($file);
  }else if ($fileExt == "png"){
    $source = imagecreatefrompng($file);
  }else if ($fileExt == "gif"){
    $source = imagecreatefromgif($file);
  }
  imagecopyresampled($thumb, $source, 0,0,0,0,$newwidth,$newheight, $width,$height);
  $newFileName = $folder . basename($file); // get original file name

  if ($fileExt == "jpg" || $fileExt == "jpeg"){
    imagejpeg($thumb, $newFileName, 80);
  }else if ($fileExt == "png"){
    imagepng($thumb, $newFileName, 9/80);
  }else if ($fileExt == "gif"){
    imagegif($$thumb, $newFileName);
  }
  imagedestroy($thumb);
  imagedestroy($source);
}

/**
 * Tests all upload fields to determine whether any files were submitted.
 * Not working "Warning: Invalid argument supplied for foreach() in /home/jyee12/public_html/dmit2025/week10/gallery/includes/functions.php on line 99"
 * @return boolean
 */
function files_uploaded($fileInput = 'imgfile') {

  // bail if there were no upload forms
 if(empty($_FILES))
      return false;

  // check for uploaded files
  $files = $_FILES[$fileInput]['tmp_name'];
  
  foreach($files as $field_title => $temp_name ){
      if( !empty($temp_name) && is_uploaded_file( $temp_name )){
          // found one!
          return true;
      }
  }   
  // return false if no files were found
 return false;
}

function check_old_images($imgfile) {
  
  $original = $originalsFolder . $imgfile;
  $thumbnail = $thumbsFolder . $imgfile;
  $display = $displayFolder . $imgfile;
  if ($imgfile == ""){
      $canDelete = true;
  }else{
      $canDelete = (unlink($original) && unlink($thumbnail) && unlink($display));
  }
  return $canDelete;
}

?>