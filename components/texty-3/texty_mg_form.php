<?

# jalal7h@gmail.com
# 2016/07/30
# Version 1.0

function texty_mg_form(){

	## -------------------------------------------------
	echo listmaker_form('
		
		<div class="texty_mg_head">'.( $GLOBALS['cmp']['texty_mg'] ? $GLOBALS['cmp']['texty_mg'] : $GLOBALS['setting']['texty_mg'] ).' / <?=$rw["name"]?></div><hr>
		
		[!
			"table" => "texty" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
		[!"hidden:slug","inDiv"!]

			[!"textarea:prompt","inDiv"!]
			
			<hr>

			<div class="half_div">
				[!"text:user_email_subject","inDiv"!]
				[!"textarea:user_email_content","inDiv"!]
			</div>

			<div class="half_div">
				[!"text:admin_email_subject","inDiv"!]
				[!"textarea:admin_email_content","inDiv"!]
			</div>

			<hr>
			
			<div class="half_div">[!"textarea:user_sms"!]</div>
			<div class="half_div">[!"textarea:admin_sms"!]</div>
	
			<hr>

			[!"submit:'.__('ثبت').'","inDiv"!]

		[!close!]
	');
	## -------------------------------------------------

}


