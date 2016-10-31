<?

# jalal7h@gmail.com
# 2016/10/28
# 1.0

function tallfooter_html( $rw_tf ){

	$c = $rw_tf['content'];

	if( $c != '' ){
		$grid = $rw_tf['grid'] ? " grid".$rw_tf['grid'] : "";
		$c = "<div class=\"this".$grid." ".$rw_tf['type']."\" >" . $c . "</div>";
	}
	
	return $c;

}

