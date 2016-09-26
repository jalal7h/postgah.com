<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup(){
	
	switch ($_REQUEST['do']) {
		
		case 'send':
			user_emailverifybeforesignup_send();
			return ;
		
	}
	
	user_emailverifybeforesignup_form();

}

