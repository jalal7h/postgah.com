<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

function linkify_breadcrumb(){
	
	if( $cat = $_REQUEST['cat'] ){
		$rw = table( 'linkify_config', $cat );
		echo "<a href=\""._URL."/admin/linkify/view/$cat\">".$rw['name']."</a>";
	
		if( $parent = $_REQUEST['parent'] ){
			while( $parent > 0 ){
				$rw_l = table( 'linkify', $parent ); 
				$c = "<a href=\""._URL."/admin/linkify/view/$cat/$parent\">".$rw_l['name']."</a>".$c;
				$parent = $rw_l['parent'];
			}
			echo $c;
		}

	}

}

