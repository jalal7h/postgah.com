<?

# jalal7h@gmail.com
# 2017/02/28
# 1.1

function userloginverify(){
	
	switch ($_REQUEST['do']) {
		case 'split':
			if( userloginverify_split() ){
				return true;
			}
			break;
	}
	
	userloginverify_form();

}

