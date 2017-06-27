<?

# jalal7h@gmail.com
# 2017/02/29
# 1.0

function userregisterverify_form(){
	
	echo template_engine( 'userregisterverify_form', [ 'prompt' => que::pop('userregisterverify_form_username') ] );
	
}

