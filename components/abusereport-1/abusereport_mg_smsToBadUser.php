<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

$GLOBALS['do_action'][] = 'abusereport_mg_smsToBadUser';

function abusereport_mg_smsToBadUser(){

	if(! is_component('sms') ){
		//
	
	} else if( setting('sms_state') != '1' ){
		//
	
	} else if(! $numb = $_REQUEST['numb'] ){
		//

	} else if(! $text = $_REQUEST['text'] ){
		//

	} else if(! sms_send( $numb, $text ) ){
		//

	} else {
		echo "OK";
	}
	
	echo "ER";

}

