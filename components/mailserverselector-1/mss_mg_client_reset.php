<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_client_reset(){

	if(! sizeof($GLOBALS['mss_list']) ){
		return false;
	
	} else foreach( $GLOBALS['mss_list'] as $func => $name ){
		
		$list_of_func[] = $func;

		if(! $func ){
			continue;
		
		} else if(! $name ){
			continue;
		
		} else if(! table('mailserverselector_func', $func, null, 'call_from_func') ){
			dbs( 'mailserverselector_func', [ 'name'=>$name, 'call_from_func'=>$func ] );
		}
		
	}

	if( sizeof($list_of_func) ){
		$list_of_func = "'".implode("' , '", $list_of_func)."'";
		dbq(" DELETE FROM `mailserverselector_func` WHERE `call_from_func` NOT IN ( $list_of_func ) ");
	}

}


