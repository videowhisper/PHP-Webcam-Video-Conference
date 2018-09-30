<?php
if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
  $stream=$_GET['name'];

  include_once("incsan.php");
  sanV($stream);
  if (!$stream) exit;
  if (strstr($stream,'.php')) exit;
  
  // get bytearray
  $jpg = $GLOBALS["HTTP_RAW_POST_DATA"];

//setup folders if needed
$dir="uploads";
if (!file_exists($dir)) mkdir($dir);
$dir.="/_sessions";
if (!file_exists($dir)) mkdir($dir);

   $filepath = "uploads/_sessions/$stream";

  // save file
  $fp=fopen($filepath.".jpg","w");
  if ($fp)
  {
    fwrite($fp,$jpg);
    fclose($fp);
  }

  		 //generate thumbnail
		 $source = ImageCreateFromJPEG($filepath.".jpg");
		 $destination = ImageCreateTrueColor(240,180);
		 imagecopyresized ($destination, $source, 0, 0, 0, 0, 240, 180,  imagesx($source), imagesy($source));
		 imagejpeg($destination,$filepath . "_240.jpg",90);
		 $destination2 = ImageCreateTrueColor(64,48);
		 imagecopyresized ($destination2, $destination, 0, 0, 0, 0, 64, 48,  imagesx($destination), imagesy($destination));
		 imagejpeg($destination2,$filepath . "_64.jpg",95);
}
?>loadstatus=1