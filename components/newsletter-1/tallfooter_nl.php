<?

# jalal7h@gmail.com
# 2017/01/09
# 1.1

$GLOBALS['tallfooter_element']['nl'] = 'عضویت در خبرنامه';

function tallfooter_nl( $rw_tf ){

	$c = template_engine( 'tallfooter_nl', [] );

	if( $c != '' ){
		$grid = $rw_tf['grid'] ? " grid".$rw_tf['grid'] : "";
		$c = "<div class=\"this".$grid." ".$rw_tf['type']."\" >" . $c . "</div>";
	}

	return $c;

}


