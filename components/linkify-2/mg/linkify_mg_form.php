<?

# jalal7h@gmail.com
# 2017/01/06
# 1.1

function linkify_mg_form(){


	## -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "linkify_config" ,
		!]
			
			<div class="head">'.__('مشخصات جعبه پیوند').'</div>
			<hr>

			[!"text:name*"!]
			[!"toggle:haveSub"!]
			[!"toggle:haveIcon"!]

			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	## -------------------------------------------------


}

