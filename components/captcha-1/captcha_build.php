<?

# jalal7h@gmail.com
# 2017/01/18
# 1.1

add_action( 'captcha_build' );

function captcha_build( $numb=4 ){
	
	#
	# find the name of captcha
	if(! $captcha_name = $_REQUEST['captcha_name'] ){
		die();
	}
	// session_destroy();
	# 
	# select the code and store it
	if( intval($_SESSION['captcha-wrong']) < 3 ){

		#
		# the code
		$rand = rand( pow(10,$numb-1), pow(10,$numb)-1 );
		$_SESSION['captcha-'.$captcha_name] = $rand;

		#
		# select the color
		$color_R = rand(150,200);
		$color_G = rand(150,200);
		// $color_B = 255 + 240 - $color_R - $color_G;
		$color_B = rand(150,200);

	} else {
		$rand = "OVER";		
		$_SESSION['captcha-'.$captcha_name] = "N";
		$color_R = $color_G = $color_B = 160;
	}

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



