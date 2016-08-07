<?

function linkify_define_globals(){
	if( ! sizeof( $GLOBALS['linkify_items'] ) ){
		return true;
	} else foreach($GLOBALS['linkify_items'] as $k => $r){
		if($r['inDashboard']==true){
			$GLOBALS['cmp']['linkify_mg&l='.$k] = $r['name'];
		}
	}
}

