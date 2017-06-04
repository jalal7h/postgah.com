<?

# jalal7h@gmail.com
# 2016/11/18
# 1.0

$GLOBALS['setting']['sms_setting'] = 'پیامک';

function sms_setting(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?'.query_string_set().'&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_rw_slug_n_text(),
		!]
			
			[!"'.setting_rw('sms_state')['name'].'","toggle:sms_state"!]
			[!"'.setting_rw('sms_connection_string')['name'].'","textarea:sms_connection_string*"!]
			
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}


