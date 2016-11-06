<?

# jalal7h@gmail.com
# 2016/10/23
# 1.0

$GLOBALS['do_action'][] = 'admin_changepassword';

function admin_changepassword(){
	
	if(! $user_id = admin_logged() ){
		ed(__FUNCTION__,__LINE__);
	
	} else if(! $rw_user = table('users', $user_id) ){
		ed(__FUNCTION__,__LINE__);
	}

	admin_html_open();

	?>
	<style>
	.admin_changepassword {
		padding: 0px 70px;
	}
	.admin_changepassword .head {
		padding: 40px 0 30px 0;
		font-size: 16px;
	}
	.admin_changepassword .lmfe_tnit {
		width: 150px;
		color: #737373;
	}
	.admin_changepassword .lmfe_inDiv.submit {
		background-color: #f1f1f1;
		margin: -10px -70px 0 -70px;
	    padding: 40px 0 60px 0;
	}
	#lmfe_admin_changepassword_cell {
		width: 160px;
	}
	</style>
	<?

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
			[!"number:cell"=>"'.$rw_user['cell'].'","inDiv"!]
			[!"password:password"=>"************","inDiv"!]
			
			<br> 
			<br>

			[!"submit:'.__('ثبت').'","inDiv"!]

		[!close!]
	');
	# -------------------------------------------------

	admin_html_close();

}



