<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_get_higher( $this_type ){

	foreach( $GLOBALS['position_config'] as $i => $position_type ){
		if( $position_type == $this_type ){
			if( isset($GLOBALS['position_config'][ $i - 1 ]) ){
				return $GLOBALS['position_config'][ $i - 1 ];
			}
		}
	}

	return false;
	
}

