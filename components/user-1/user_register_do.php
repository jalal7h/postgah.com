<?

# jalal7h@gmail.com
# 2016/09/26
# 1.4

function user_register_do(){
	
	if( user_logged() ){
		jsgo( _URL.'/userpanel' );

	} else if( is_component('user_emailverifybeforesignup') and !user_emailverifybeforesignup_check() ){
		$text = user_emailverifybeforesignup_invalid_verification_link;

	} else if( is_component('user_emailverifybeforesignup') and !user_emailverifybeforesignup_fillRequestUsername() ){
		dg();

	} else if(! $username = strtolower(trim($_REQUEST['username'])) ){
		$text = __("لطفا آدرس ایمیل خود را وارد کنید.");
	
	} else if( table('user', $username, null, 'username') ){
		$text = __("آدرس ایمیل مورد نظر قبلا ثبت شده است");

	} else if(! is_email_correct_or_not($username) ){
		$text = __("لطفا آدرس ایمیل خود را به درستی وارد کنید.");

	} else if(! $password = trim($_REQUEST['password']) ){
		$text = __("لطفا کلمه عبور خود وارد کنید.");

	} else if(! is_password_secure_or_not($password) ){
		$text = __("لطفا کلمه عبور خود را به درستی وارد کنید.");

	} else if(! $name = trim($_REQUEST['name']) ){
		$text = __("لطفا نام خود را وارد کنید.");

	} else if(! is_name_correct_or_not($name) ){
		$text = __("لطفا نام خود را به درستی وارد کنید.");
	
	} else if(! $user_id = dbs('user', [
		'username'=>$username, 
		'password'=>( is_component('userhashpassword') ? userhashpassword($password) : $password ), 
		'name'=>$name, 
		'cell'=>( is_cell_correct_or_not(trim($_REQUEST['cell'])) ?trim($_REQUEST['cell']) :"" ),
		'flag'=>'1',
	]) ){
		$text = __("اختلال در ثبت‌نام رخ داده است.");
		
	} else {

		# 
		# loging in client
		user_login_session( $user_id );

		$vars['user_id'] = $user_id;
		$vars['user_username'] = $username;
		$vars['user_password'] = $password;
		$vars['login_page'] = _URL.'/login';

		$vars['__BEFORE__'] = '<div class="'.__FUNCTION__.'"><icon></icon><div class="left"><span>';
		$vars['__AFTER__'] = '</span><a href="./userpanel">'.__('ورود به محیط کاربری').'</a></div></div>';
		
		echo texty( 'user_register_do' , $vars, '', $convbox=false );
					
		return true;
	}

	echo convbox( $text );
	return false;

}

