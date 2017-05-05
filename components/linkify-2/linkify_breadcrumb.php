<?php

# jalal7h@gmail.com
# 2017/05/03
# 1.1

function linkify_breadcrumb(){
	
	if( $cat = $_REQUEST['cat'] ){
		$rw = table( 'linkify_config', $cat );
		$links[] = [ _URL."/admin/linkify/view/".$cat , $rw['name'] ];
	
		if( $parent = $_REQUEST['parent'] ){
			while( $parent > 0 ){
				$rw_l = table( 'linkify', $parent ); 
				$links_sub[] = [ _URL."/admin/linkify/view/$cat/".$parent , $rw_l['name'] ];
				$parent = $rw_l['parent'];
			}
		}

	}

	if( sizeof($links_sub) ){
		$links = array_merge( $links, array_reverse($links_sub) );
	}

	return $links;

}

