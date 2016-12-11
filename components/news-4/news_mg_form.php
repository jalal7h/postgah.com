<?

# jalal7h@gmail.com
# 2016/11/17
# 1.0

function news_mg_form(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "news" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_list",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"text:name*"!]
			[!"select:cat*","option"=>"<option value=\'\'></option>".cat_display("news",$is_array=false)!]
			[!"textarea:text*.tinymce"!]
			[!"keyword:tag"!]
			[!"file:image"!]
	
			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}





