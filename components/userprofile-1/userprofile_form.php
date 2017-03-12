<?

# jalal7h@gmail.com
# 2017/01/23
# 1.3

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
				"action" => "'._URL.'/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.'" ,
				"switch" => "do2",
			!]
				
				[!"text:name*","inDiv"!]
				[!"text:email*","inDiv"!]
				[!"text:cell","inDiv"!]
				[!"text:tell","inDiv"!]

				[!"text:address","inDiv"!]

				[!"file:profile_pic","inDiv"!]
				[!"select:gender","option"=>["M"=>"'.__('مذکر').'", "F"=>"'.__('مونث').'"],"inDiv"!]

				[!"text:im_a","inDiv"!]
				[!"text:work_at","inDiv"!]

				<br>
				<hr>
				<br>

				[!"submit:'.__('ثبت').'","inDiv"!]

			[!close!]
		');
		## -------------------------------------------------

	}
	
}







