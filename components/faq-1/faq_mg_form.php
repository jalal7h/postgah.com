<?

# jalal7h@gmail.com
# 2017/01/21
# 1.0

function faq_mg_form(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!"table" => "faq"!]
			
			<h4>فرم ثبت سوال</h4>
			<hr>

			[!"text:name*"!]
			[!"textarea:text*"!]

			<hr>

		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}




