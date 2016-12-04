<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_user_form(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "./?'.query_string_set( 'do1', null ).'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do1",
		!]
			
			[!"select:cat*", "option"=>"<option value=\'0\' ></option>".cat_display("ticketbox",false)!]
			
			<hr>
			
			'.( ticketbox_client_to_client ? '[!"searchbox:user_id*"=>ticketbox_user($rw["id"])["foreign"],"feed"=>"user(name)[id]","'.__('گیرنده پیام').'"!]' : '' ).'
			
			[!"text:name*"!]
			
			'.( $_REQUEST['id'] ? '' : '[!"textarea:text*","'.__('متن پیام').'"!]' ).'
			
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}









