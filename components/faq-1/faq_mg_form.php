<?

# jalal7h@gmail.com
# 2017/05/19
# 1.1

function faq_mg_form(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!"table" => "faq"!]
			
			<h4>'.__('فرم ثبت سوال').'</h4>
			<hr>

			[!"text:name*"!]
			[!"textarea:text*"!]

			<hr>

		[!submit!]
	');
	# -------------------------------------------------

}




