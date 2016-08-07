<?

# jalal7h@gmail.com
# 2016/07/15
# 1.1

/*

echo token_make() ro dakhel e form gharar midim, tu safheye form
fa token_check() ro ejra mkonim, tusafheye ejraye pasokh e form, 
faghat ejra mkonim, be in halat : token_check(); if o e() ham nemiad.

hadaf jelogiri az tekrar e ejraye form hast

*/

/*README*/

function token_make(){

	$token_id = rand( 1000000, 9999999 );
	$token_id = md5x( $token_id, 12 );

	$token_value = md5x( U() . rand(1000000,9999999) . $token_id, 32 );

	$html = '<input type="hidden" name="token" value="'.$token_id.'/'.$token_value.'" />'."\n";
	$_SESSION[ $token_id ] = $token_value;

	// error_log( 'kkkk : token_make '.$_SESSION['token_id'] );

	return $html;
}


function token_check(){

	if(! $token_complex = $_REQUEST[ 'token' ] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $token_complex = explode('/', $token_complex) ){
		e(__FUNCTION__,__LINE__);

	} else if( sizeof( $token_complex)!=2 ){
		e(__FUNCTION__,__LINE__);

	} else if(! $token_id = $token_complex[0] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $token_value = $token_complex[1] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $_SESSION[ $token_id ] ){
		e(__FUNCTION__,__LINE__);

	} else if( $_SESSION[ $token_id ]!=$token_value ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		unset( $_SESSION[ $token_id ] );
		unset( $_REQUEST['token']);
		unset( $_GET['token'] );
		unset( $_POST['token'] );

		return true;
	}

	?>
	<div dir="ltr" style="
		line-height: 100vh !important;
		font: normal 36px Monospace, sans-serif;
		text-align: center; 
		position: absolute; 
		top: 0px; 
		left: 0px; 
		width: 100vw; 
		height: 100vh; 
		color: #600; 
		background-color: #eee;">request expired</div>
	<?
	die();

}





