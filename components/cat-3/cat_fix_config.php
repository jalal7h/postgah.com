<?

# jalal7h@gmail.com
# 2016/11/16
# 1.0

$GLOBALS['do_init'][] = 'cat_fix_config';

function cat_fix_config(){

	foreach( $GLOBALS['cat_items'] as $key => $info ){
		
		if( isset( $GLOBALS['cat_items'][$key]['name'] ) ){
			continue;
		
		} else {
			cat_fix_config_replace_key( $key, 0, 'name' );
			cat_fix_config_replace_key( $key, 1, 'dashboard' );
			cat_fix_config_replace_key( $key, 2, 'sub' );
			cat_fix_config_replace_key( $key, 3, 'icon' );
			cat_fix_config_replace_key( $key, 4, 'desc' );
			cat_fix_config_replace_key( $key, 5, 'flag' );
			cat_fix_config_replace_key( $key, 6, 'ccf' );
			cat_fix_config_replace_key( $key, 7, 'kw' );
			cat_fix_config_replace_key( $key, 8, 'color' );
		}

	}

}


function cat_fix_config_replace_key( $key, $i, $inx ){
	
	if( isset( $GLOBALS['cat_items'][$key][$i] ) ){
		$GLOBALS['cat_items'][$key][$inx] = $GLOBALS['cat_items'][$key][$i];
		unset( $GLOBALS['cat_items'][$key][$i] );
	}

}









