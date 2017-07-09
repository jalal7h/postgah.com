<?

# jalal7h@gmail.com
# 2016/07/01
# 1.1

/*
 execute all $GLOBALS['do_pre'][] functions, after </head><body>
 for example: 
 $GLOBALS['do_pre'][] = 'pgItem_pre';
/*README*/


function do_pre(){
		
	if( $_REQUEST['do_action'] ){
		return true;

	} else if(! $GLOBALS['do_pre'] ){
		return true;

	} else foreach( $GLOBALS['do_pre'] as $k=>$do_pre ){
		call_user_func( $do_pre );
	}

}





