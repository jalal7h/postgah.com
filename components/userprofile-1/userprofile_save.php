<?

# jalal7h@gmail.com
# 2016/09/13
# 1.1

function userprofile_save(){
	
	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! $rw = table("users", $user_id) ){
		dg();
	
	} else if(! $name = trim($_REQUEST['name']) ){
		$text = __("لطفا نام خود را وارد کنید!");
	
	} else if(! is_name_correct_or_not($name) ){
		$text = __("لطفا نام خود را به درستی وارد کنید!");

	} else if(! $username = trim($_REQUEST['username']) ){
		$text = __("لطفا آدرس ایمیل خود را وارد کنید!");
	
	} else if(! is_email_correct_or_not($username) ){
		$text = __("لطفا آدرس ایمیل خود را به درستی وارد کنید!");

	} else if( ($username != $rw['username']) and table('users', $username, null, 'username') ){
		$text = __("آدرس ایمیل جدید شما قبلا توسط کاربر دیگری ثبت شده است!");

	} else if(! dbs('users', ['name','username','cell','tell','address','im_a','work_at','gender'] , ['id'=>$user_id] ) ){
		dg( dbe() );

	} else {

		$f = fileupload_upload([ "id"=>$user_id, "input"=>"profile_pic" ]);
		if($f[0]){
			dbs( 'users', [ 'profile_pic'=>$f[0] ] , [ 'id'=>$user_id ] );
		}

		#
		# sending email to client after save change on profile
		if( is_component('texty') ){
			$vars = table('users', $user_id);
			$vars['main_title'] = setting('main_title');
			echo texty( 'userprofile_save' , $vars );
		}
		
		return true;

	}

	echo convbox($text);
	
	return false;

}






