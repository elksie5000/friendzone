<?php 


/*
Thumbnail image file

*/

//Initialise variables


$medium_width = 650;
$medium_height = 550;
$thumbnail_width = $medium_width / 2;
$thumbnail_height = $medium_height / 2;


// Avoid any external dependency
// Snippet from https://www.itopen.it/on-the-fly-thumbnails-generation-php/
if(!function_exists('__clean')) {
  function __clean($s, $len){
      if(!isset($s)) return null;
      $s = substr($s, 0, $len);
      if(ini_get('gpc_magic_quotes') != 1) $s = addslashes($s);
      $s = escapeshellcmd($s);
      return $s;
  }
}

//Check for path  and size in uri
if(!isset($path))  $path = urldecode(stripslashes(__clean($_GET['path'], 256)));
if(!isset($size))  $size = __clean($_GET['size'], 9);

// if size is not defined:
if(!$size) {
  $size = 'thumbnail';
}

//Load image
$image = null;
$image_info = getimagesize($path);
$image_type = $image_info[2];

$url = urldecode($path);
$exploded = explode('.', $url);
$endbit = end($exploded);
$ext = strtolower($endbit);

//Load data into $image, handling either png or jpeg files

//$ext = strtolower($tmp = end(explode('.', $path)));
if ($image_type == IMAGETYPE_JPEG) {
    $image = @imagecreatefromjpeg($path);
} else if ($image_type == IMAGETYPE_PNG) {
    $image = @imagecreatefrompng($path);
}

#If image exists, test for size.
if($image) {
	
	$original_width = imagesx($image);
	$original_height = imagesy($image);
	$ratio = $original_width / $original_height;

	// Check for size 
	switch ($size) {
    case "thumbnail":
        $expected_width = $thumbnail_width;
        $expected_height = $thumbnail_height;
        break;
    case "medium":
        $expected_width = $medium_width;
        $expected_height = $medium_height;
        break;
    case "default":
        $expected_width = $original_width;
        $expected_height = $original_height;
        break;
	}
	
	//https://stackoverflow.com/a/6594277/386861
	//Massage image into the target size as best it can, keeping the original aspect ratio, not stretching the image larger than the original
    $target_width = $target_height = min(max($expected_width, $expected_height), max($original_width, $original_height));
	//echo $target_height; echo $target_width;

	if ($ratio < 1) {
	    $target_width = $target_height * $ratio;
	} else {
	    $target_height = $target_width / $ratio;
	}

	$src_width = $original_width;
	$src_height = $original_height;
	$src_x = $src_y = 0;

	//Create temporary image
	$target_image = imagecreatetruecolor($target_width, $target_height);
	imagecopyresampled($target_image, $image, 0, 0, $src_x, $src_y, $target_width, $target_height, $src_width, $src_height);

	imagedestroy($image);
    $image = $target_image;

    header("Content-type: image/jpg");
    imagejpeg($image, null);

}	

?>