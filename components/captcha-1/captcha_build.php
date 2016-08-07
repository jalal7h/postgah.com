<?
$GLOBALS['do_action'][] = 'captcha_build';

function captcha_build( $numb=4 ){
	
	#
	# find the name of captcha
	if(! $captcha_name = $_REQUEST['captcha_name'] ){
		die();
	}
	// session_destroy();
	# 
	# select the code and store it
	$rand=rand(1000,9999);
	error_log("session before write : ".$_SESSION['captcha-'.$captcha_name] );
	$_SESSION['captcha-'.$captcha_name] = $rand;
	error_log("session after write : ".$_SESSION['captcha-'.$captcha_name] );

	#
	# select the color
	$color_R = rand(120,200);
	$color_G = rand(120,200);
	$color_B = 255 + 240 - $color_R - $color_G;
	
	#
	# build the image
	$im = imagecreatefrompng( imgp('captcha'.rand(1,4).'.png') );
	$cl = imagecolorallocate( $im , $color_R , $color_G , $color_B );
	imagestring($im,24,8,2,$rand,$cl);
	
	#
	# print the captcha
	header('Content-type:image/png');
	header("Content-disposition: inline; filename=captcha".$captcha_name.".png");
	echo imagepng($im);
	imagedestroy($im);
	die();
}



