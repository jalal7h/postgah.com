<?

# jalal7h@gmail.com
# 2016/11/08
# 1.1

function setting_mg_main(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_mg_main_setting_rw(),
		!]
			
			[!"'.setting_rw('tiny_title')['name'].'","text:tiny_title*"!]
			[!"'.setting_rw('main_title')['name'].'","text:main_title*"!]

			[!"'.setting_rw('keywords')['name'].'","text:keywords"!]
			[!"'.setting_rw('websitedescription')['name'].'","text:websitedescription"!]

			[!"'.setting_rw('money_unit')['name'].'","text:money_unit"!]
			[!"'.setting_rw('webstatus_main')['name'].'","toggle:webstatus_main"!]

			[!"'.setting_rw('html_extra_tags')['name'].'","textarea:html_extra_tags"!]
			[!"'.setting_rw('webstatus_main_content')['name'].'","textarea:webstatus_main_content"!]

			<hr>

		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}


function setting_mg_main_setting_rw(){

	if(! $rs0 = dbq(" SELECT * FROM `setting` WHERE 1 ") ){
		return e();

	} else while( $rw0 = dbf($rs0) ){
		$rw[ $rw0['slug'] ] = $rw0['text'];
	}

	return $rw;

}










