<?

if( $_REQUEST['its_tag']==1 ){
	$GLOBALS['do_init'][] = 'its_tag_check_if_exists_on_db';
}

function its_tag_check_if_exists_on_db(){
	
	if(! $q = trim($_REQUEST['q']) ){
		//

	} else if(! kword_is($q) ){
		d404();
	}
}

