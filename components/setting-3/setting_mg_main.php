<?

# jalal7h@gmail.com
# 2017/06/04
# 1.2

function setting_mg_main(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"rw" => setting_rw_slug_n_text(),
		!]
			
			[!"'.setting_rw('tiny_title')['name'].'","text:tiny_title*"!]
			[!"'.setting_rw('main_title')['name'].'","text:main_title*"!]

			<hr>

			[!"'.setting_rw('site_logo')['name'].'","file:site_logo"!]
			[!"'.setting_rw('site_ico')['name'].'","file:site_ico","accept"=>"image/ico"!]

			<hr>

			[!"'.setting_rw('keywords')['name'].'","text:keywords"!]
			[!"'.setting_rw('websitedescription')['name'].'","text:websitedescription"!]
			[!"'.setting_rw('money_unit')['name'].'","text:money_unit"!]
			[!"'.setting_rw('html_extra_tags')['name'].'","textarea:html_extra_tags"!]
			[!"'.setting_rw('html_robots_txt')['name'].'","textarea:html_robots_txt"!]
			[!"'.setting_rw('webstatus_main')['name'].'","toggle:webstatus_main"!]			
			[!"'.setting_rw('webstatus_main_content')['name'].'","textarea:webstatus_main_content"!]

			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}





