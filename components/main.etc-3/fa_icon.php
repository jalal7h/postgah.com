<?php

# jalal7h@gmail.com
# 2017/01/10
# 1.0

function fa_icon( $code, $return=false ){
	
	$tag = "<icon class=\"fa\">&#xf".$code.";</icon>\n";

	if( $return ){
		return $tag;

	} else {
		echo $tag;
	}

}

