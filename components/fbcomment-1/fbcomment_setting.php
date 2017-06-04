<?

# jalal7h@gmail.com
# 2017/01/21
# 1.1

add_setting('fbcomment_setting','نظرات');

function fbcomment_setting(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?'.query_string_set().'&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_rw_slug_n_text(),
		!]
			
			[!"'.setting_rw('fbcomment_needForConfirm')['name'].'","toggle:fbcomment_needForConfirm"!]
			[!"'.setting_rw('fbcomment_share_on_twitter')['name'].'", "toggle:fbcomment_share_on_twitter"!]

			[!"'.setting_rw('fbcomment_user_countOn60m')['name'].'", "number:fbcomment_user_countOn60m", "prompt"=>"'.__('مقدار 0 : غیرفعال').'"!]
			[!"'.setting_rw('fbcomment_user_countOn24h')['name'].'", "number:fbcomment_user_countOn24h", "prompt"=>"'.__('مقدار 0 : غیرفعال').'"!]
			
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}





