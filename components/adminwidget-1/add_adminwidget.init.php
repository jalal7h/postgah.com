<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.0

function add_adminwidget( $inp ){
	
	$widget_func = $inp['func'];
	$grid = $inp['grid'];
	$prio = $inp['prio'];
	$cover = $inp['cover'];

	$set_array = [ 'func'=>$widget_func, 'grid'=>$grid, 'cover'=>$cover ];

	if( $prio ){
		
		if( $already_func = $GLOBALS['admin_widget_lock'][ $prio ] ){
			ed("can't assign the priority $prio to widget $widget_func, its already assigned to widget $already_func.");
		
		} else {

			if( $GLOBALS['admin_widget'][ $prio ] ){
				$GLOBALS['admin_widget'][] = $GLOBALS['admin_widget'][ $prio ];
			}

			$GLOBALS['admin_widget'][ $prio ] = $set_array;
			$GLOBALS['admin_widget_lock'][ $prio ] = $widget_func;

		}

	} else {
		$GLOBALS['admin_widget'][] = $set_array;
	}


}

