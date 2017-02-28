<?

# jalal7h@gmail.com
# 2017/02/27
# 1.0

function userloginoauth_form(){
	
	$_SESSION['userloginoauth_form__refer'] = $_SERVER['HTTP_REFERER'];

	$c.= '<div class="userloginoauth_form">';
	
	$c.= userloginoauth_form_google();
	$c.= userloginoauth_form_facebook();
	$c.= userloginoauth_form_twitter();
	
	$c.= '</div>';

	return $c;
}

function userloginoauth_form_google(){
	
	$c.= '
	<a class="login google" target="_top" href="'._URL.'/modules/oauth/google/" >
		<img src="'._URL.'/image_list/oauth-google.png" />
	</a>
	';

	return $c;
}

function userloginoauth_form_facebook(){
	
	$c.= '
	<a class="login facebook" target="_top" href="modules/oauth/facebook/" >
		<img src="'._URL.'/image_list/oauth-facebook.png" />
	</a>
	';

	return $c;
}

function userloginoauth_form_twitter(){
	
	$c.= '
	<a class="login twitter" target="_top" href="modules/oauth/twitter/" >
		<img src="'._URL.'/image_list/oauth-twitter.png" />
	</a>
	';

	return $c;
}






