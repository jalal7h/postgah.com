<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_mg_form(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_list",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"select:cat*", "option"=>"<option value=\'0\' ></option>".cat_display("ticketbox",false)!]
			
			<hr>
			
			[!"searchbox:user_id*"=>ticketbox_user($rw["id"])["foreign"],"feed"=>"user(name)[id]","'.__('گیرنده پیام').'"!]
			
			[!"text:name*"!]
			
			'.( $_REQUEST['id'] ? '' : '[!"textarea:text*","'.__('متن پیام').'"!]' ).'
			
			<hr>

		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}









