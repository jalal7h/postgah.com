<?

# jalal7h@gmail.com
# 2016/09/13
# 1.1

/* email e karbar ro besurat e gif link mide
<img src="<?=emailgif( $email_address or $user_id )?>" />
*/

/*README*/


function emailgif( $email ){
	
	if( is_numeric($email) ){
		if(! $email = table( "user", $email, "email" ) ){
			e();
			return false;
		}
	}

	$code = rand( 10000, 90000 );
	$_SESSION['emailgif'][ $code ] = $email;
	error_log( $code." - ".$email );

	$url = _URL."/?do_action=emailgif_do&code=".$code."&nocache=".rand(1000,9999);

	return $url;
}






