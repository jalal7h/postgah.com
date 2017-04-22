<?

# jalal7h@gmail.com
# 2017/04/05
# 1.4

add_userpanel_item( 'userprofile_form', 'profile', 'پروفایل کاربر', '007', 94 );

function userprofile_form(){

	echo '<div class="userprofile_form_head">'.__('پروفایل کاربر').'</div>';

	switch($_REQUEST['do2']){
		case 'saveNew':
			userprofile_save();
			break;
	}

	if(! $uid = user_logged() ){
		e();
	
	} else if(! $rw = table("user", $uid) ){
		e();
	
	} else {

		$GLOBALS['listmaker_form-rw'] = $rw;

		## -------------------------------------------------
		echo listmaker_form('
			[!
				"table" => "user" ,
				"action" => "'.layout_link(14).'/profile",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.'" ,
				"switch" => "do2",
			!]
				
				'.( !is_column('user','email_verified') ? 
					'[!"text:email*/readonly=1"!]' : 
					'[!"memo:email"!]' ).'

				'.( (!is_column('user','cell_verified') or !userlogin_username_mobile) ? 
					'[!"text:cell"!]' : 
					'[!"memo:cell"!]' ).'

				[!"text:name*"!]
				[!"text:tell"!]

				[!"text:address"!]

				[!"file:profile_pic"!]
				[!"select:gender","option"=>["M"=>"'.__('مذکر').'", "F"=>"'.__('مونث').'"]!]

				[!"text:im_a"!]
				[!"text:work_at"!]

				<br>
				<hr>
				<br>

				[!submit!]

		');
		## -------------------------------------------------

	}
	
}







