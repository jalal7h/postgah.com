<?

# jalal7h@gmail.com
# 2016/11/16
# 1.1

function cat_define_globals(){
	
	if( ! sizeof( $GLOBALS['cat_items'] ) ){
		return true;
	
	} else foreach( $GLOBALS['cat_items'] as $cat_name => $cat_info ){
		
		if( cat_detail($cat_name)['dashboard'] ){
			$GLOBALS['cmp']['cat_mg&l='.$cat_name] = cat_detail($cat_name)['name'];
		}

	}
	
}

