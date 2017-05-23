<?

# jalal7h@gmail.com
# 2016/08/24
# 1.1

$GLOBALS['do_action'][] = 'emailgif_do';

function emailgif_do(){
	
	if(! $code = $_REQUEST['code'] ){
		e();

	} else if(! $email = $_SESSION['emailgif'][ $code ] ){
		e();

	} else {
		
		unset( $_SESSION['emailgif'][ $code ] );
		$cw = strlen( $email ) * 9;
		$ch = 18;

		$im = imagecreate( $cw, $ch );
		$white = imagecolorallocate( $im, 240, 240, 240 );
		$black = imagecolorallocate( $im, 0, 0, 0 );
		imagefill( $im, 0, 0, $white);
		imagestring( $im, 12, 0, 0, $email, $black );

		imagegif( $im );
		imagedestroy( $im );

		die();

	}

}






