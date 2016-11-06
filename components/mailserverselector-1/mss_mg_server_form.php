<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_server_form(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "mailserverselector_provider" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"text:name*"!]
			[!"select:type*","option"=>$GLOBALS["mss_server_typeName"]!]
			
			<hr>
			
			[!"text:sender_addr*.ltr"!]
			[!"text:sender_name*"!]
			
			<fieldset>
				<legend>'.__('تنظیمات').' SMTP</legend>
				[!"text:server_addr.ltr"!]
				[!"text:server_port.ltr"!]
				[!"text:server_username.ltr"!]
				[!"password:server_password"!]
			</fieldset>

			<hr>
			
		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------
	
}


