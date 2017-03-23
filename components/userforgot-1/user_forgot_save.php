<?

# jalal7h@gmail.com
# 2017/03/12
# 1.5

function user_forgot_save(){
		

	token_check();


	$username = trim( strip_tags($_REQUEST['username']) );
	$password = trim( strip_tags($_REQUEST['password']) );


	if(! $username ){
		ed();
	
	} else if(! userverification_inquiry($username) ){
		ed();

	} else if(! is_password_secure_or_not($password) ){
		echo convbox_back( __("لطفا کلمه عبور مطمئن‌تری انتخاب کنید. (ترکیب عدد و حروف بیشتر از ۸ کارکتر)") );
		return false;

	} else if( is_email_correct_or_not($username) ){
		$its = 'email';

	} else if( userlogin_username_mobile === true  and  is_cell_correct_or_not($username) ){
		$its = 'cell';

	} else {
		ed();
	}


	$password_on_db = ( is_component('userhashpassword') ? userhashpassword($password) : $password );

	if(! dbs( 'user', [ 'password'=>$password_on_db ], [ $its=>$username ] ) ){
		e();
	
	} else {

		# login
		$user_id = table( "user", $username, "id", $its );
		user_login_session( $user_id );
		
		# texty
		$vars['user_new_password'] = $password;
		$vars['__AFTER__'] = '<br><a href="'.layout_link(14).'">'.__('ورود به محیط کاربری').'</a>';
		echo texty( 'user_forgot_save', $vars, $user_id );

		return true;

	}

	die();
	
}




