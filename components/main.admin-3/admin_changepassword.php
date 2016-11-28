<?

# jalal7h@gmail.com
# 2016/10/23
# 1.0

$GLOBALS['do_action'][] = 'admin_changepassword';

function admin_changepassword(){
	
	if(! $user_id = admin_logged() ){
		ed();
	
	} else if(! $rw_user = table('users', $user_id) ){
		ed();
	}

	admin_html_open();

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "users" ,
			"action" => "./?do_action=admin_changepassword_do",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
			"target" => "self",
		!]

			<div class="head">'.__('پروفایل مدیریت').'</div>
	
			[!"email:username"=>"'.$rw_user['username'].'","inDiv"!]
			[!"name:name"=>"'.$rw_user['name'].'","inDiv"!]
			[!"text:cell"=>"'.$rw_user['cell'].'","inDiv"!]
			[!"password:password"=>"************","inDiv"!]
			
			<br> 
			<br>

			[!"submit:'.__('ثبت').'","inDiv"!]

		[!close!]
	');
	# -------------------------------------------------

	admin_html_close();

}



