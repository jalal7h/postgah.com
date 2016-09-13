<?

# jalal7h@gmail.com
# 2016/09/13
# 1.1

function users_forgot_send(){
	
	if(! $username = $_REQUEST['username'] ){
		dg();

	} else if(! $vars = table( 'users', $username, null, 'username' ) ){
		dg();

	} else {

		$h = md5x($username."01q!", 20);
		$vars['link'] = _URL."/?page=".$_REQUEST['page']."&do=new&username=".$username."&h=".$h;
	
		echo texty( 'users_forgot_send', $vars );

	}

}

