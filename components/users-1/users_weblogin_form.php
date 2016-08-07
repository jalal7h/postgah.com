<?

function users_weblogin_form(){
	
	$_SESSION['users_weblogin_form__refer'] = $_SERVER['HTTP_REFERER'];

	$c.= '<div class="users_weblogin_form">';
	
	$c.= users_weblogin_form_google();
	$c.= users_weblogin_form_facebook();
	$c.= users_weblogin_form_twitter();
	
	$c.= '</div>';

	return $c;
}

function users_weblogin_form_google(){
	
	$c.= '
	<a class="login google" target="_top" href="'._URL.'/modules/oauth/google/" >
		<img src="'._URL.'/image_list/oauth-google.png" />
	</a>
	';

	return $c;
}

function users_weblogin_form_facebook(){
	
	$c.= '
	<a class="login facebook" target="_top" href="modules/oauth/facebook/" >
		<img src="'._URL.'/image_list/oauth-facebook.png" />
	</a>
	';

	return $c;
}

function users_weblogin_form_twitter(){
	
	$c.= '
	<a class="login twitter" target="_top" href="modules/oauth/twitter/" >
		<img src="'._URL.'/image_list/oauth-twitter.png" />
	</a>
	';

	return $c;
}






