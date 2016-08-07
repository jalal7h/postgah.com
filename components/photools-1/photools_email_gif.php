<?
$GLOBALS['do_action'][] = 'photools_email_gif_do';

function photools_email_gif( $email ){
		
	if( is_numeric($email) ){
		if(! $email = table( "users", $email, "username" ) ){
			e(__FUNCTION__,__LINE__);
			return false;
		}
	}

	$code = rand( 10000, 90000 );
	$_SESSION['photools_email_gif'][ $code ] = $email;
	error_log( $code." - ".$email );

	$url = _URL."/?do_action=photools_email_gif_do&code=".$code."&nocache=".rand(1000,9999);

	return $url;
}

function photools_email_gif_do(){
	
	if(! $code = $_REQUEST['code'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $email = $_SESSION['photools_email_gif'][ $code ] ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		unset( $_SESSION['photools_email_gif'][ $code ] );
		$cw = strlen( $email ) * 9;
		$ch = 18;

		$im = imagecreate( $cw, $ch );
		$white = imagecolorallocate( $im, 255, 255, 255 );
		$black = imagecolorallocate( $im, 0, 0, 0 );
		imagefill( $im, 0, 0, $white);
		imagestring( $im, 12, 0, 0, $email, $black );

		imagegif( $im );
		imagedestroy( $im );

		die();
	}
}
