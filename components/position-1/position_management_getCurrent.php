<?

function position_management_getCurrent(){

	if(! $type = $_REQUEST['type'] ){
		return false;
	} else foreach ($GLOBALS['position-default'] as $k => $v) {
		
		if( $v['id']==$type ){
			
			$current['name'] = $v['name'];
			$current['numb'] = $k;

			return $current;
		}

	}

}