<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

function component_version( $component ){

	if(! is_component($component) ){
		return 0;

	} else {
		return $GLOBALS['component_version'][ $component ];
	}

}





