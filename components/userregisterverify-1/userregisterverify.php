<?php

# jalal7h@gmail.com
# 2017/02/28
# 1.1

function userregisterverify(){
	
	switch ($_REQUEST['do']) {
		case 'verify':
			if( userregisterverify_verify() ){
				return true;
			}
			break;
	}
	
	userregisterverify_form();

}

