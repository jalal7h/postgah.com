<?

function position_management_getParent(){

	$current = position_management_getCurrent();

	// var_dump($current);

	if( $GLOBALS['position-default'][$current['numb']]['default']!=null ){
		// echo __LINE__;

	} else if( 
		// the next one is commented
		(!$GLOBALS['position-default'][$current['numb']+1])
		or 
		// the next is some thing defult
		($GLOBALS['position-default'][$current['numb']+1]['default']!=null)
	){
		// echo __LINE__;
		$parent['dont_display_in_list'] = true;
		$parent['default_value'] = $GLOBALS['position-default'][$current['numb']+1]['default'];
	
	} else {
		// echo __LINE__;
		$parent['type'] = $GLOBALS['position-default'][$current['numb']+1]['id'];
	}

	return $parent;
}