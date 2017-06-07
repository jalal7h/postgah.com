<?php

# jalal7h@gmail.com
# 2017/06/08
# 1.1

function add_adminwidget( $inp ){
	
	$widget_func = $inp['func'];
	$grid = $inp['grid'];
	$prio = $inp['prio'];
	$cover = $inp['cover'];

	$set_array = [ 'func'=>$widget_func, 'grid'=>$grid, 'cover'=>$cover ];

	if( $prio !== null ){
		
		if( $already_func = $GLOBALS['admin_widget_lock'][ $prio ] ){
			ed("can't assign the priority $prio to widget $widget_func, its already assigned to widget $already_func.");
		
		} else {

			if( $GLOBALS['admin_widget'][ $prio ] ){
				// echo "replace done - $widget_func\n";
				$GLOBALS['admin_widget'][] = $GLOBALS['admin_widget'][ $prio ];
			}

			// echo "fix place done - $widget_func to $prio\n";
			$GLOBALS['admin_widget'][ $prio ] = $set_array;
			$GLOBALS['admin_widget_lock'][ $prio ] = $widget_func;

		}

	} else {
		// echo "normal place done. - $widget_func\n";
		$GLOBALS['admin_widget'][] = $set_array;
	}

}

