<?

# jalal7h@gmail.com
# 2016/09/12
# 1.3

function users_register_do(){
	
	if( user_logged() ){
		echo "<script>location.href = '"._URL."/userpanel';</script>";
		die();

	} else if(! $username = strtolower(trim($_REQUEST['username'])) ){
		$text = "لطفا آدرس ایمیل خود را وارد کنید.";
	
	} else if( table('users', $username, null, 'username') ){
		$text = "آدرس ایمیل مورد نظر قبلا ثبت شده است";

	} else if(! is_email_correct_or_not($username) ){
		$text = "لطفا آدرس ایمیل خود را به درستی وارد کنید.";

	} else if(! $password = trim($_REQUEST['password']) ){
		$text = "لطفا کلمه عبور خود وارد کنید.";

	} else if(! is_password_secure_or_not($password) ){
		$text = "لطفا کلمه عبور خود را به درستی وارد کنید.";

	} else if(! $name = trim($_REQUEST['name']) ){
		$text = "لطفا نام خود را وارد کنید.";

	} else if(! is_name_correct_or_not($name) ){
		$text = "لطفا نام خود را به درستی وارد کنید.";
	
	} else if(! $user_id = dbs('users', [
		'username'=>$username, 
		'password'=>hash_password_if_needed($password), 
		'name'=>$name, 
		'cell'=>( is_cell_correct_or_not(trim($_REQUEST['cell'])) ?trim($_REQUEST['cell']) :"" ),
	]) ){
		$text = "اختلال در ثبت‌نام رخ داده است.";
		
	} else {

		# 
		# loging in client
		$_SESSION['uid'] = $user_id;

		#
		# sending email to client after registration
		if( is_component('texty') ){
			
			$vars['main_title'] = setting('main_title');
			$vars['username'] = $username;
			$vars['password'] = $password;
			$vars['name'] = $name;
			$vars['user_id'] = $user_id;
			$vars['__BEFORE__'] = '<div class="'.__FUNCTION__.'"><icon></icon><div class="left"><span>';
			$vars['__AFTER__'] = '</span><a href="./userpanel">ورود به محیط کاربری</a></div></div>';

			echo texty( 'users_register_do' , $vars, '', $convbox=false );
			
		}
		
		return true;
	}

	echo convbox( $text );
	return false;

}

