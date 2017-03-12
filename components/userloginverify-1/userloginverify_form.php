<?

# jalal7h@gmail.com
# 2017/02/29
# 1.0

function userloginverify_form(){
	
	echo template_engine( 'userloginverify_form', [ 'prompt' => qpop('userloginverify_form_username') ] );
	
}

