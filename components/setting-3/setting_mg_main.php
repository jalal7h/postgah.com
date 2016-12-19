<?

# jalal7h@gmail.com
# 2016/11/08
# 1.1

function setting_mg_main(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?'.query_string_set().'&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_rw_slug_n_text(),
		!]
			
			[!"'.setting_rw('tiny_title')['name'].'","text:tiny_title*"!]
			[!"'.setting_rw('main_title')['name'].'","text:main_title*"!]
			[!"'.setting_rw('keywords')['name'].'","text:keywords"!]
			[!"'.setting_rw('websitedescription')['name'].'","text:websitedescription"!]
			[!"'.setting_rw('money_unit')['name'].'","text:money_unit"!]
			[!"'.setting_rw('html_extra_tags')['name'].'","textarea:html_extra_tags"!]
			[!"'.setting_rw('webstatus_main')['name'].'","toggle:webstatus_main"!]			
			[!"'.setting_rw('webstatus_main_content')['name'].'","textarea:webstatus_main_content"!]

			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}





