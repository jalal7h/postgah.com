<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_user_form(){


	# message to client - free access
	if( ticketbox_client_to_client == "public" ){
		$tctc_public = true;

	# message to client - limited
	} else if( (ticketbox_client_to_client == "private") and ($tctc_private = ticketbox_private_token_check()) ){
		$table_name = $_REQUEST['table_name'];
		$table_id = $_REQUEST['table_id'];
		$user_id = $_REQUEST['user_id'];
		$hash_code = $_REQUEST['hash_code'];
		
	# ticket to admin
	} else {
		$user_id = 1;
	}


	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => _URL."/?'.query_string_set( 'do1', null ).'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do1",
		!]
			
			'.( $tctc_public 
				? '	[!"searchbox:user_id*"=>ticketbox_user($rw["id"])["foreign"],"feed"=>"user(name)[id]","'.__('گیرنده پیام').'"!]' 
			
			: ( $tctc_private 
				? '	[!"hidden:table_name"=>"'.$table_name.'"!]
					[!"hidden:table_id"=>"'.$table_id.'"!]
					[!"hidden:user_id"=>"'.$user_id.'"!]
					[!"hidden:hash_code"=>"'.$hash_code.'"!]'
			
			: '[!"select:cat*", "option"=>"<option value=\'0\' >... '.__('انتخاب کنید').' ...</option>".cat_display("ticketbox",false)!]' 
			 
			)).'

			<hr>
			
			[!"text:name*"!]
			
			'.( $_REQUEST['id'] ? '' : '[!"textarea:text*","'.__('متن پیام').'"!]' ).'
			
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}









