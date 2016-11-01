<?

# jalal7h@gmail.com
# 2016/10/30
# 1.0

function tallfooter_mg_form_hr(){

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "tallfooter" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"text:name*"!]
			[!"hidden:type"=>"hr"!]
			[!"hidden:grid"=>"12"!]
			
			<hr>
			
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}

