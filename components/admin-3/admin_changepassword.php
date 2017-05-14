<?

# jalal7h@gmail.com
# 2016/10/23
# 1.0

$GLOBALS['do_action'][] = 'admin_changepassword';

function admin_changepassword(){
	
	if(! $user_id = admin_logged() ){
		ed();
	}

	admin_html_open();

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "user" ,
			"action" => "./?do_action=admin_changepassword_do",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
			"target" => "self",
			"rw"=>table("user","'.$user_id.'") ,
		!]

			<div class="head">'.__('پروفایل مدیریت').'</div>
	
			[!"email:email"!]
			[!"'.__('نام').'", "name:name"!]
			[!"cell:cell"!]
			[!"password:password"=>"************"!]
			
			'.( is_component('userprofile') ? '[!"file:profile_pic"!]' : '' ).'
			
			<br> 
			<br>
			
		[!submit!]
	
	');
	# -------------------------------------------------

	admin_html_close();

}



