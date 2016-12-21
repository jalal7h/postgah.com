<?

function ticketbox_view_form(){

	echo js_print('ticketbox', 'ticketbox_view_form');

	if( is_admin() and admin_logged() ){
		 $user_id = 1;
	
	} else if( is_userpanel() and user_logged() ){
		$user_id = user_logged();
	
	} else {
		ed();
	}

	# -------------------------------------------------
	return listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "#",
			"class" => "'.__FUNCTION__.'" ,
		!]
			[!"hidden:ticketbox_id"=>"'.$_REQUEST['id'].'"!]
			[!"textarea:text/user_id=\"'.$user_id.'\""!]
			
		<div class="submit_div">
			[!"submit:'.__('ثبت').'","notInDiv"!]
			<div class="prompt">'.__('اختلال در ثبت.').'</div>
			
			<a href="<?=userprofile_link( ticketbox_user($rw["id"])["foreign"] )?>" target="_blank" class="foreign"><?=table( "user" , ticketbox_user($rw["id"])["foreign"] , "name" )?></a>
		</div>
	');
	# -------------------------------------------------

}


