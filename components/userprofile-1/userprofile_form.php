<?

function userprofile_form(){

	echo '<div class="userprofile_form_head">پروفایل کاربر</div>';

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
				[!"select:gender","option"=>[""=>"", "M"=>"مذکر", "F"=>"مونث"],"inDiv"!]

				[!"text:im_a","inDiv"!]
				[!"text:work_at","inDiv"!]

				<br>
				<hr>
				<br>

				[!"submit:ثبت","inDiv"!]

			[!close!]
		');
		## -------------------------------------------------












		// echo
		// fm( array( 
		// 	'name'=>'userprofile_form' , 
		// 	'class'=>'userprofile_form' , 
		// 	'action'=>'./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do2=save',
		// 	'title_in_span'=>true,
		// 	)).

		// ff(array( lmtc("users:name"), 'n:name*'=>$rw, 'inDiv' )).
		// ff(array( lmtc("users:username"), 'n:username*'=>$rw, 'inDiv' )).
		// ff(array( lmtc("users:tell"), 'n:tell'=>$rw, 'inDiv' )).
		// ff(array( lmtc("users:cell"), 'n:cell'=>$rw, 'inDiv' )).

		// ff(array( lmtc("users:address"), 'n:address'=>$rw, 'inDiv' )).

		// ff(array( lmtc("users:profile_pic") , 'n:profile_pic[]'=>$rw, 'inDiv', 'accept'=>'image/*' )).
		// ff(array( lmtc("users:gender"), 'n:gender'=>$rw, 'option'=>['M'=>'مذکر','F'=>'مونث'], 'inDiv' )).
		
		// ff(array( lmtc("users:im_a"), 'n:im_a'=>$rw, 'inDiv' )).
		// ff(array( lmtc("users:work_at"), 'n:work_at'=>$rw, 'inDiv' )).

		// ff("br").
		// ff("hr").
		// ff("br").

		// ff(array('t:submit','n:submit'=>'ثبت','class'=>'submit_button','inDiv'));

	}
}

