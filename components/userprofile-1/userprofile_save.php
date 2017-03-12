<?

# jalal7h@gmail.com
# 2016/09/13
# 1.1

function userprofile_save(){
	
	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! $rw = table("user", $user_id) ){
		dg();
	
	} else if(! $name = trim($_REQUEST['name']) ){
		$text = __("لطفا نام خود را وارد کنید!");
	
	} else if(! is_name_correct_or_not($name) ){
		$text = __("لطفا نام خود را به درستی وارد کنید!");

	} else if(! $email = trim($_REQUEST['email']) ){
		$text = __("لطفا آدرس ایمیل خود را وارد کنید!");
	
	} else if(! is_email_correct_or_not($email) ){
		$text = __("لطفا آدرس ایمیل خود را به درستی وارد کنید!");

	} else if( ($email != $rw['email']) and table('user', $email, null, 'email') ){
		$text = __("آدرس ایمیل جدید شما قبلا توسط کاربر دیگری ثبت شده است!");

	} else if(! dbs('user', ['name','email','cell','tell','address','im_a','work_at','gender'] , ['id'=>$user_id] ) ){
		dg( dbe() );

	} else {

		$f = fileupload_upload([ "id"=>$user_id, "input"=>"profile_pic" ]);
		if($f[0]){
			dbs( 'user', [ 'profile_pic'=>$f[0] ] , [ 'id'=>$user_id ] );
		}

		$vars['login_link'] = user_loginLink( $user_id );
		echo texty( 'userprofile_save' , $vars, 'user' );
		
		return true;

	}

	echo convbox($text);
	
	return false;

}






