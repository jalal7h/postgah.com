<?

# jalal7h@gmail.com
# 2017/02/28
# 2.0

add_layer( 'user_login_form', 'فرم ورود به محیط کاربری', 'center' );
add_action( 'user_login_form' );

function user_login_form(){
	
	#
	# actions
	switch ($_REQUEST['do']) {
		
		case 'login_do':
			$prompt = user_login_do();
			break;

	}

	#
	# redirect if already logged in, or successful login
	if( user_logged() ){
		jsgo( layout_link(14) );
	}

	#
	# fix the username
	$_REQUEST['username'] = trim( strip_tags( $_REQUEST['username'] ) );

	#
	# refer
	$refer = $_SERVER['HTTP_REFERER'];
	if( $refer == _URL.'/' ){
		$refer = '';
	}

	echo template_engine( 'user_login_form', [ 
		
		'username' => trim( strip_tags( $_REQUEST['username'] ) ),
		'prompt' => $prompt,
		'refer' => $refer,

	]);

}

