<?

# jalal7h@gmail.com
# 2016/10/30
# 1.0

function tallfooter_mg_form(){


	#
	# edit
	if( $id = $_REQUEST['id'] ){
		if(! $rw = table('tallfooter', $id) ){
			ed();
		} else if(! $type = trim($rw['type']) ) {
			ed();
		}

	# new
	} else if(! $type = trim($_REQUEST['type']) ) {
		ed();
	}


	# 
	# run the related func
	if(! $func = __FUNCTION__.'_'.$type ){
		ed();

	} else if(! function_exists($func) ){
		ed( $func );

	} else {
		return $func();
	}


}






