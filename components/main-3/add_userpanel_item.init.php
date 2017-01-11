<?php

# jalal7h@gmail.com
# 2017/01/10
# 1.0

function add_userpanel_item( $func, $name, $icon, $i=null ){
	
	$info = [ $func, $name, $icon ];

	if( $i === null ){
		$GLOBALS['userpanel_item'][] = $info;
		
	} else {
		if( isset( $GLOBALS['userpanel_item'][ $i ] ) ){
			if( $GLOBALS['userpanel_item_locked'][ $i ] == '1' ){
				echo "The init number $i is locked for ".$GLOBALS['userpanel_item'][ $i ]['name'].".";
				die();
			} else {
				$GLOBALS['userpanel_item'][] = $GLOBALS['userpanel_item'][ $i ];
			}
		}
		$GLOBALS['userpanel_item'][ $i ] = $info;
		$GLOBALS['userpanel_item_locked'][ $i ] = '1';
	}
	
}

