<?

function userprofile_form(){

	echo '<div class="userprofile_form_head">'.__('پروفایل کاربر').'</div>';

	switch($_REQUEST['do2']){
		case 'saveNew':
			userprofile_save();
			break;
	}

	if(! $uid = user_logged() ){
		e( __FUNCTION__ . __LINE__ );
	
	} else if(! $rw = table("users", $uid) ){
		e( __FUNCTION__ . __LINE__ );
	
	} else {

		$GLOBALS['listmaker_form-rw'] = $rw;

		## -------------------------------------------------
		echo listmaker_form('
			[!
				"table" => "users" ,
				"action" => "./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'",
				"name" => "'.__FUNCTION__.'" ,
				"class" => "'.__FUNCTION__.'" ,
				"switch" => "do2",
			!]
				
				[!"text:name*","inDiv"!]
				[!"text:username*","inDiv"!]
				[!"text:cell","inDiv"!]
				[!"text:tell","inDiv"!]

				[!"text:address","inDiv"!]

				[!"file:profile_pic","inDiv"!]
				[!"select:gender","option"=>[""=>"", "M"=>"'.__('مذکر').'", "F"=>"'.__('مونث').'"],"inDiv"!]

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







