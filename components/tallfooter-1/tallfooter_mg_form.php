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
		
		} else if(! $rw['type'] ) {
			ed();

		} else if(! $func = __FUNCTION__.'_'.$rw['type'] ){
			ed();

		} else if(! function_exists($func) ){
			ed();

		} else {
			return $func($rw);
		}

	#
	# new
	} else {
		return tallfooter_mg_form_selectOneOfWidgets();
	}

}






