<?

# jalal7h@gmail.com
# 2016/12/17
# 1.0

function ticketbox_private_token_check(){
	
	
	$hash_code = $_REQUEST['hash_code'];
	$hash_code = mb_ereg_replace('[^a-z0-9]+','',$hash_code);
	$hash_code = trim($hash_code);


	if(! $hash_code ){
		//
	
	} else if( $hash_code != $_REQUEST['hash_code'] ){
		//

	} else if(! $true_hash_code = ticketbox_private_token_make() ){
		//

	} else if( $hash_code != ticketbox_private_token_make() ){
		//

	} else {
		return true;
	}

	return false;
	
}









