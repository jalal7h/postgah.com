<?

function users_forgot_send(){
	
	$username = $_REQUEST['username'];
	$h = md5x($username."01q!", 20);

	$vars['email'] = $username;
	$vars['link'] = _URL."/?page=".$_REQUEST['page']."&do=new&username=".$username."&h=".$h;
	
	echo texty( 'users_forgot_send', $vars );

}

