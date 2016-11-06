<?

# jalal7h@gmail.com
# 2016/10/27
# 1.0

function linkify_mg_form(){


	## -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "linkify_config" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			<div class="head">'.__('مشخصات جعبه پیوند').'</div>
			<hr>

			[!"text:name*"!]
			[!"toggle:haveSub"!]
			[!"toggle:haveIcon"!]

			<hr>

		[!"submit:ثبت"!]
	');
	## -------------------------------------------------


}

