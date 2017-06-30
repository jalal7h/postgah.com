<?php

# jalal7h@gmail.com
# 2017/06/30
# 2.1

function user_register_do(){
	

	token_check();
	

	if( user_logged() ){
		jsgo( layout_link(14) );
	}


	$form_valid = true;
	$email = trim($_REQUEST['email']);
	$cell = trim($_REQUEST['cell']);


	#
	# check password
	if(! $password = trim($_REQUEST['password']) ){
		que::push( 'user_register_form_password', __("لطفا کلمه عبور خود وارد کنید.") );
		$form_valid = false;

	} else if(! is_password_secure_or_not($password) ){
		que::push( 'user_register_form_password', __("لطفا کلمه عبور مطمئن‌تری انتخاب کنید. (ترکیب عدد و حروف بیشتر از ۸ کارکتر)") );
		$form_valid = false;

	#
	# check name
	} else if(! $name = trim($_REQUEST['name']) ){
		que::push( 'user_register_form_name', __("لطفا نام خود را وارد کنید.") );
		$form_valid = false;

	} else if(! is_name_correct_or_not($name) ){
		que::push( 'user_register_form_name', __("لطفا نام خود را به درستی وارد کنید.") );
		$form_valid = false;
	}


	#
	# check username - no verify
	if(! is_component('userregisterverify') ){

		#
		# cell
		if( $cell ){
			if(! is_cell_correct_or_not( $cell ) ){
				que::push( 'user_register_form_cell', __("لطفا شماره موبایل خود را به درستی وارد کنید.") );
				$cell = '';
			
			} else if( table('user', $cell, null, 'cell') ) {
				que::push( 'user_register_form_cell', __("شماره موبایل مورد نظر شما قبلا ثبت شده است.") );
				$cell = '';
			}
		}

		#
		# email
		if( $email ){
			if(! is_email_correct_or_not($email) ){
				que::push( 'user_register_form_email', __("لطفا آدرس ایمیل خود را به درستی وارد کنید.") );
				$email = '';

			} else if( table('user', $email, null, 'email') ){
				que::push( 'user_register_form_email', __("ایمیل مورد نظر شما قبلا ثبت شده است.") );
				$email = '';
			}
		}

		#
		# form_valid
		if(! ( $email or ( userlogin_username_mobile === true and $cell ) ) ){
			$form_valid = false;
		}

		#
		# username
		if( userlogin_username_mobile ){
			$username = $email .( $email and $cell ? " / " : "" ). $cell;
		} else {
			$username = $email;
		}

	#
	# check username - verify
	} else if(! $the_list = userregisterverify_registerVarsForTexty() ){
		$form_valid = false;

	} else {
		list( $its, $email, $cell, $username ) = $the_list;
	}


	#
	# insert
	if(! $form_valid ){
		//

	} else if(! $user_id = dbs('user', [
		'email'=>$email, 
		'password'=>( is_component('userhashpassword') ? userhashpassword($password) : $password ), 
		'name'=>$name, 
		'cell'=>$cell,
		'flag'=>'1',
	]) ){
		echo convbox_back( __("اختلال در ثبت‌نام رخ داده است.") , 'transparent' );

	#
	# congratulation
	} else {

		# 
		# client login
		user_login_session( $user_id );

		#
		# verify flags
		if( is_component('userregisterverify') ){
			userregisterverify_after_registration( $its, $user_id );
		}

		#
		# texty
		$vars['user_id'] = $user_id;
		$vars['user_username'] = $username;
		$vars['user_password'] = $password;
		$vars['login_page'] = layout_link(60);

		$vars['__BEFORE__'] = '<div class="'.__FUNCTION__.'"><icon></icon><div class="left"><span>';
		$vars['__AFTER__'] = '</span><a href="'.layout_link(14).'">'.__('ورود به محیط کاربری').'</a></div></div>';
		
		echo texty( 'user_register_do' , $vars, $user_id, $convbox=false );	
		return true;

	}

	return false;

}

