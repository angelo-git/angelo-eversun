<?php
function createOverallScore($r_ingridient, $r_results, $r_value){
	$ratebar_ingridients = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_ingridients.jpg';
	$ratebar_results = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_results.jpg';
	$ratebar_value = $_SERVER['DOCUMENT_ROOT'].'/images/ratebar_value.jpg';
	
	$im1 = @imagecreatefromjpeg($ratebar_ingridients);
	$im2 = @imagecreatefromjpeg($ratebar_results);
	$im3 = @imagecreatefromjpeg($ratebar_value);
	
	$px = 8.4;
	
	$imgw = 170;
	$imgh = 58;
	$image  = imagecreatetruecolor($imgw, $imgh); 
	$black = ImageColorAllocate($image, 0, 0, 0);
	$white = ImageColorAllocate($image, 255, 255, 255);
	
	imagefilledrectangle($image, 0, 0, $imgw, $imgh, $white);
	
	//putenv('GDFONTPATH=' . realpath('.'));

	imagefttext($image, 10, 0, 1, 16, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Ingridients:');
	imagefttext($image, 10, 0, 19, 34, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Results:');
	imagefttext($image, 10, 0, 28, 50, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', 'Value:');
	
	imagefttext($image, 10, 0, 151, 16, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_ingridient);
	imagefttext($image, 10, 0, 151, 34, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_results);
	imagefttext($image, 10, 0, 151, 50, $black, $_SERVER['DOCUMENT_ROOT'].'/HelveNueThin.ttf', $r_value);
	
	imagecopy($image,$im1,64,8,0,0,($r_ingridient*$px),9);
	imagecopy($image,$im2,64,26,0,0,($r_results*$px),9);
	imagecopy($image,$im3,64,42,0,0,($r_value*$px),9);
	
	header('Content-type: image/png'); 
	
	ImagePNG($image); 
	imagedestroy($image); 
}
$a = htmlentities(trim($_GET['a']));
$b = htmlentities(trim($_GET['b']));
$c = htmlentities(trim($_GET['c']));
createOverallScore($a,$b,$c);
?>


