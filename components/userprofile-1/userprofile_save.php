<?

# jalal7h@gmail.com
# 2017/04/05
# 1.2

function userprofile_save(){
	
	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! $rw = table("user", $user_id) ){
		dg();
	
	} else if(! $name = trim($_REQUEST['name']) ){
		$text = __("لطفا نام خود را وارد کنید!");
	
	} else if(! is_name_correct_or_not($name) ){
		$text = __("لطفا نام خود را به درستی وارد کنید!");

	
	} else if(! dbs('user', ['name','tell','address','im_a','work_at','gender'] , ['id'=>$user_id] ) ){
		dg( dbe() );

	} else {


		if( $email = trim($_REQUEST['email']) ){
			
			if(! is_email_correct_or_not($email) ){
				echo convbox_back( __("لطفا آدرس ایمیل خود را به درستی وارد کنید!") );
				return false;

			} else if( ($email != $rw['email']) and table('user', $email, null, 'email') ){
				echo convbox_back( __("آدرس ایمیل جدید شما قبلا توسط کاربر دیگری ثبت شده است!") );
				return false;

			} else if(! dbs('user', ['email'] , ['id'=>$user_id] ) ){
				echo convbox_back( __("اختلالی در ثبت تغییرات رخ داده است!") );
				return false;
			}

		}


		if( $cell = trim($_REQUEST['cell']) ){
			
			if(! is_cell_correct_or_not($cell) ){
				echo convbox_back( __("لطفا شماره تلفن همراه خود را به درستی وارد کنید!") );
				return false;

			} else if( ($cell != $rw['cell']) and table('user', $cell, null, 'cell') ){
				echo convbox_back( __("شماره تلفن همراه شما قبلا توسط کاربر دیگری ثبت شده است!") );
				return false;

			} else if(! dbs('user', ['cell'] , ['id'=>$user_id] ) ){
				echo convbox_back( __("اختلالی در ثبت تغییرات رخ داده است!") );
				return false;
			}

		}


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






